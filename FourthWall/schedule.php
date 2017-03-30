<!DOCTYPE html>

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


    <section id="MainSection" class="schedule">

      <div class="FirstSection schedule">

        <?php

        $page_title ="Fourth Wall";
        $fb_page_id = "496758580502671";
        $access_token = "623052661168696|3G1-HW5q0H4OCzdmU6qZoM4pnLg";

        // get events for the next x years
        $year_range = 1;

        // automatically adjust date range
        // human readable years
        $since_date = date('Y-m-d');
        $until_date = date('Y-12-31', strtotime('+' . $year_range . ' years'));

        // unix timestamp years
        $since_unix_timestamp = strtotime($since_date);
        $until_unix_timestamp = strtotime($until_date);

        $fields="id,name,description,place,timezone,start_time,cover";
        $json_link = "https://graph.facebook.com/{$fb_page_id}/events/?fields={$fields}&access_token={$access_token}&since={$since_unix_timestamp}&until={$until_unix_timestamp}";
        $json = file_get_contents($json_link);

        $obj = json_decode($json, true, 512, JSON_BIGINT_AS_STRING);


        // count the number of events
        $event_count = count($obj['data']);

        for($x=$event_count - 1; $x>=0; $x--){
          date_default_timezone_set($obj['data'][$x]['timezone']);

          $id = $obj['data'][$x]['id'];
          $name = $obj['data'][$x]['name'];
          $pic = isset($obj['data'][$x]['cover']['source']) ? $obj['data'][$x]['cover']['source'] : "https://graph.facebook.com/{$fb_page_id}/picture?type=large";
          $start_date = date( 'l, F d, Y', strtotime($obj['data'][$x]['start_time']));
          $start_time = date('g:i a', strtotime($obj['data'][$x]['start_time']));
          //$end_time = date('g:i a', strtotime($obj['data'][$x]['end_time']));
          $location = isset($obj['data'][$x]['place']['name']) ? $obj['data'][$x]['place']['name'] : "";
          $eventlink = "https://www.facebook.com/events/{$id}";

          echo "<div class='event'>";
            echo "<div class='row'>";
              echo "<div class='cover col-md-7'>";
                echo "<div class='coverWindow'>";
                  echo "<div class='coverImg' style='background: url({$pic})'></div>";
                echo "</div>";
              echo "</div>";
              echo "<div class='description col-md-5'>";
                echo "<h2 class='eventText'>{$name}</h2>";
                echo "<p class='eventDate lightFont'>{$start_date} at {$start_time}</p>";
                echo "<p class='lightFont'>{$location}</p>";
                //echo "<div class='EventLinks'>";
                  //echo "<a href='{$eventlink}'>Details</a>";
                  //echo "<button type='button' class='btn btn-secondary'>Details</button>";
                //echo "</div>";
              echo "</div>";
            echo "</div>";
          echo "</div>";
              //echo "<h2>{$name}</h2>";
        }

        ?>

        <!-- <div class="event">
          <div class="row">
            <div class="cover col-md-7">
              <div class="coverWindow">
                <div class="coverImg" style="background: url(https://scontent.xx.fbcdn.net/hphotos-xat1/v/t1.0-9/s720x720/13043446_1121904341184972_1912140414354314754_n.jpg?oh=a9896c8a8c8fbac095e71d891820503f&oe=57ADEAEF)"></div>
              </div>
            </div>
            <div class="description col-md-5">
              <h2 class="name">RAN SALMAN</h2>
              <p>
                Friday April, 29th 2016
              </p>
              <p>
                10:00 PM - 3:00 AM
              </p>
              <p>
                Alley Cat Music Club
              </p>
              <div class="row EventLinks">
                <button type="button" class="btn btn-secondary">Details</button>
              </div>
            </div>
          </div>
        </div> -->

      </div>

    </section>


  </body>



  </html>
