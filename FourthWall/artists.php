<!DOCTYPE html>

<?php

$access_token = "623052661168696|3G1-HW5q0H4OCzdmU6qZoM4pnLg";
$qq_id = "115392758555616";
$qq_json_link = "https://graph.facebook.com/{$qq_id}/photos?fields=picture&access_token={$access_token}";

$cardio_id = "10150255278445005";
$cardio_json_link = "https://graph.facebook.com/{$cardio_id}/photos?fields=picture&access_token={$access_token}";

$wiggle_id = "242880519121184";
$wiggle_json_link = "https://graph.facebook.com/{$wiggle_id}/photos?fields=picture&access_token={$access_token}";

$expand_id = "861181330590609";
$expand_json_link = "https://graph.facebook.com/{$expand_id}/photos?fields=picture&access_token={$access_token}";

?>

<html lang-"en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="FourthWallLogo-Icon.jpeg" rel="icon" type="image/x-icon" />

    <title>Fourth Wall</title>

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="main.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  </head>

  <body>
    <header id="HeaderWrapper">
      <nav>
        <ul id="NavWrapper">
          <li><a href="index.html">Home</a></li>
          <li><a href="streams.html">Streams</a></li>
          <li><a href="schedule.php">Schedule</a></li>
          <li><a href="artists.php">Artists</a></li>
          <li><a href="contact.html">Contact</a></li>
        </ul>
      </nav>
    </header>


    <section id="MainSection" class="artists container">

      <div class="FirstSection artists">

        <div class="row logoSection">
          <div class="col-md-4 logo">
            <a href="https://www.facebook.com/QoverQ/">
              <?php

              $json = file_get_contents($qq_json_link);
              $obj = json_decode($json, true, 512, JSON_BIGINT_AS_STRING);
              $pic = $obj['data'][0]['picture'];
              echo "<img src='{$pic}' class='logoPic'/>";

              ?>
            </a>
          </div>
          <div class="col-md-4 logo">
            <a href="https://www.facebook.com/cardioATL/">
              <?php

              $json = file_get_contents($cardio_json_link);
              $obj = json_decode($json, true, 512, JSON_BIGINT_AS_STRING);
              $pic = $obj['data'][0]['picture'];
              echo "<img src='{$pic}' class='logoPic'/>";

              ?>
            </a>
          </div>
          <div class="col-md-4 logo">
            <a href="https://www.facebook.com/projectb.atl">
              <img src="projectb.png" class="logoPic"/>
            </a>
          </div>
        </div>

        <div class="row">

          <div class="col-md-6 logo">
            <div class="logoPosition">
              <a href="https://www.facebook.com/WiggleFactor/">
                <?php

                $json = file_get_contents($wiggle_json_link);
                $obj = json_decode($json, true, 512, JSON_BIGINT_AS_STRING);
                $pic = $obj['data'][1]['picture'];
                echo "<img src='{$pic}' class='logoPic'/>";

                ?>
              </a>
            </div>
          </div>
          <div class="col-md-6 logo">
            <a href="https://www.facebook.com/xposedATL">
              <?php

              $json = file_get_contents($expand_json_link);
              $obj = json_decode($json, true, 512, JSON_BIGINT_AS_STRING);
              $pic = $obj['data'][0]['picture'];

              echo "<img src='{$pic}' class='logoPic'/>";

              ?>
            </a>
          </div>
        </div>

      </div>

    </section>


  </body>

  </html>
