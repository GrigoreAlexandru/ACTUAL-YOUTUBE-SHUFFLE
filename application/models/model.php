
<?php
error_reporting(0);

if (!defined('BASEPATH')) exit('No direct script access allowed');



class Model extends CI_Model

{
	function playlistList()
	{
		if (!empty($this->input->post() ['input']) or $_COOKIE['url'] !== null) {
			$array = [];
			if ($_COOKIE['url'] !== null) {
				$input = $_COOKIE['url'];
			} else {
			$input = $this->input->post() ['input'];
			setcookie("url", $input, time()+3600);
			}
			$pageToken = "";
			parse_str(parse_url($input) ['query'], $id);
			if (isset($id['list'])) {
				$id = $id['list'];
				do {
					$response = $this->model->curl($id, $pageToken);
					for ($i = 0; $i < count($response['items']); $i++) {
						$array[count($array) ][0] = $response['items'][$i]['snippet']['resourceId']['videoId'];
						$array[count($array) - 1][1] = $response['items'][$i]['snippet']['title'];
					}

					$pageToken = "&pageToken=" . $response['nextPageToken'];
				}

				while ($response['nextPageToken']);
				shuffle($array);
				

				return $array;
			}
			else {
				echo "<script>alert(\"Invalid link , please try again \");</script>";
			}
		}
	}

	function curl($arr, $pageToken)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet+&maxResults=50$pageToken&playlistId=" . $arr . "&key=AIzaSyAYsJqJ7-D8bd1LxHTj2VOIcJ4jDbw9Fz8");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($ch);
		curl_close($ch);
		return json_decode($result, true);
	}

	public

	function getThumbnail()
	{
		$input = $this->input->post('input2');
		parse_str(parse_url($input, PHP_URL_QUERY) , $my_array_of_vars);

		


		return json_decode(file_get_contents("https://www.googleapis.com/youtube/v3/videos?part=snippet&id=" . $my_array_of_vars['v'] . "&key=AIzaSyAYsJqJ7-D8bd1LxHTj2VOIcJ4jDbw9Fz8") , true) ['items'][0]['snippet']['thumbnails']['maxres']['url'];
	}
}

