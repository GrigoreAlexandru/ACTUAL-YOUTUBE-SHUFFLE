
<?php
error_reporting(0);

if (!defined('BASEPATH')) exit('No direct script access allowed');



class Model extends CI_Model

{
	function playlistList()
	{
		if (!empty($this->input->post() ['input'])) {
			$array = [];
			$input = $this->input->post() ['input'];
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
		curl_setopt($ch, CURLOPT_URL, "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet+&maxResults=50$pageToken&playlistId=" . $arr . "&key=");
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

		// return "<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/".$a."\" frameborder=\"0\" allowfullscreen></iframe>" ;

		return json_decode(file_get_contents("https://www.googleapis.com/youtube/v3/videos?part=snippet&id=" . $my_array_of_vars['v'] . "&key=") , true) ['items'][0]['snippet']['thumbnails']['maxres']['url'];
	}
}

