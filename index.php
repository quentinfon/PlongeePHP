<?php
include "header.php";
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Plongée</title>
        <link rel="stylesheet" href="/frontend/css/style.css">
        <script src="script.js"></script>
        <script>
            $(document).ready(function(){
                $('.slider').slider();
            });
        </script>
    </head>

    <body>
        <p>Bienvenue sur le site du projet plongée</p>
        <div class="slider">
            <ul class="slides">
                <li>
                    <img src="/images/divers-681516_960_720.jpg"> 
                    <div class="caption center-align">
                        <h3>Test</h3>
                        <h5>Test</h5>
                    </div>
                </li>
                <li>
                    <img src="/images/divers-681516_960_720.jpg"> 
                    <div class="caption left-align">
                        <h3>Left Aligned Caption</h3>
                        <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                    </div>
                </li>
                <li>
                    <img src="/images/divers-681516_960_720.jpg"> 
                    <div class="caption right-align">
                        <h3>Right Aligned Caption</h3>
                        <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                    </div>
                </li>
                <li>
                    <img src="/images/divers-681516_960_720.jpg"> 
                    <div class="caption center-align">
                        <h3>This is our big Tagline!</h3>
                      <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                    </div>
                </li>
            </ul>
        </div>
    </body>
</html>
