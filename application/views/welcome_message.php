<!--
   Material Design Lite
   Copyright 2015 Google Inc. All rights reserved.
   
   Licensed under the Apache License, Version 2.0 (the "License");
   you may not use this file except in compliance with the License.
   You may obtain a copy of the License at
   
       https://www.apache.org/licenses/LICENSE-2.0
   
   Unless required by applicable law or agreed to in writing, software
   distributed under the License is distributed on an "AS IS" BASIS,
   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
   See the License for the specific language governing permissions and
   limitations under the License
   -->
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
      <title>Material Design Lite</title>
      <!-- Add to homescreen for Chrome on Android -->
      <meta name="mobile-web-app-capable" content="yes">
      <link rel="icon" sizes="192x192" href="images/android-desktop.png">
      <!-- Add to homescreen for Safari on iOS -->
      <meta name="apple-mobile-web-app-capable" content="yes">
      <meta name="apple-mobile-web-app-status-bar-style" content="black">
      <meta name="apple-mobile-web-app-title" content="Material Design Lite">
      <link rel="apple-touch-icon-precomposed" href="images/ios-desktop.png">
      <!-- Tile icon for Win8 (144x144 + tile color) -->
      <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
      <meta name="msapplication-TileColor" content="#3372DF">
      <link rel="shortcut icon" href="images/favicon.png">
      <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
      <!--
         <link rel="canonical" href="http://www.example.com/">
         -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.red-teal.min.css" />
      <link rel="stylesheet" href="styles.css">
   </head>
   <body class="mdl-demo mdl-color--grey-100 mdl-color-text--grey-700 mdl-base">
      <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
         <header class="mdl-layout__header mdl-layout__header--scroll mdl-color--primary">
            <div class="mdl-layout--large-screen-only mdl-layout__header-row">
            </div>
            <div class="mdl-layout--large-screen-only mdl-layout__header-row">
               <h3>Actual YouTube shuffle</h3>
            </div>
            <div class="mdl-layout__tab-bar mdl-js-ripple-effect mdl-color--primary-dark">
               <a href="#overview" class="mdl-layout__tab is-active">shuffle</a>
               <a href="#features" class="mdl-layout__tab">get thumbnail</a>
               <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored mdl-shadow--4dp mdl-color--accent" id="add">
               <i class="material-icons" role="presentation">add</i>
               <span class="visuallyhidden">Add</span>
               </button>
                 <div class="mdl-tooltip" for="add">Change playlist</div>
            
            </div>
          
         </header>
         <main class="mdl-layout__content">
            <div class="mdl-layout__tab-panel is-active" id="overview">
               <section >
                  <div>
                     <?php
                        $this->load->helper('form');
                        $data = array(
                          'class' => 'mdl-textfield__input',
                          'name' => 'input'
                        );
                        $atributes = array(
                          'id' => 'form',
                          'onsubmit' => 'document.getElementById(\'form2\').style.display = \'none\';'
                        );
                        echo form_open([], $atributes);
                        echo "<div class=\"mdl-textfield mdl-js-textfield\">";
                        echo form_input($data);
                        echo "<label class=\"mdl-textfield__label\" for=\"sample1\">Enter playlist link to shuffle</label>";
                        echo "</div>";
                        echo form_close();
                        
                        if (isset($this->input->post() ['input']) or $_COOKIE['url'] !== null) {
                          echo "<div><button type=\"button\" class=\"prev mdl-button mdl-js-button mdl-js-ripple-effect\">prev</button>\r\n<button type=\"button\" class=\"next mdl-button mdl-js-button mdl-js-ripple-effect\" style=\"float:right;\">next</button>\r\n<div id=\"player\"></div></div>";
                        }
                        
                        echo "<script>var url = \"$thumbnail\";</script>"
                        ?>
                  </div>
               </section>
            </div>
            <div class="mdl-layout__tab-panel" id="features">
               <section >
                  <?php
                     $this->load->helper('form');
                     $data = array(
                       'class' => 'mdl-textfield__input',
                       'name' => 'input2',
                       'id' => 'input2'
                     );
                     $atributes = array(
                       'id' => 'form2',
                       'onsubmit' => "window.open(url)"
                     );
                     echo form_open([], $atributes);
                     echo "<div class=\"mdl-textfield mdl-js-textfield\">";
                     echo form_input($data);
                     echo "<label class=\"mdl-textfield__label\" for=\"sample1\">Enter video link to get thumbnail</label>";
                     echo "</div>";
                     echo form_close();
                     ?>
               </section>
            </div>
         </main>
         <footer class="mdl-mini-footer">
            <div class="mdl-mini-footer__left-section">
               <div class="mdl-logo">About</div>
               <ul class="mdl-mini-footer__link-list">
                  <li><a href="#">Github</a></li>
                  <li><a href="#">Theme</a></li>
               </ul>
            </div>
         </footer>
      </div>
      <?php
         $array = json_encode($yt);
         echo "<script type=\"text/javascript\">";
         echo "var array = " . $array;
         ?>;
      </script>
      <script
         src="https://code.jquery.com/jquery-3.2.1.min.js"
         integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
         crossorigin="anonymous"></script>
      <script  src="script.js"></script>
      <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
   </body>
</html>
