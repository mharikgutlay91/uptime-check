<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uptime Check System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container-fluid header-div">
        <h1>Uptime System</h1>
    </div>
    <div class="container-fluid content-div">
        <?php

        function url_test($url) {
            $timeout = 10;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
            $http_respond = curl_exec($ch);
            $http_respond = trim(strip_tags($http_respond));
            $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            echo $http_code . "<br>";
            if (($http_code == "200") || ($http_code == "302")) {
                return true;
            } else {
                return false;
            }

            curl_close($ch);
        }

        $website = "https://www.bitcasino.com/";
        if (!url_test($website)) {
            echo $website . " is down!";
        } else {
            echo $website . " functions correctly.";
        }
        ?>
        <div class="col-sm-12">
            <?php 
            // for ($i = 0; $i < count($site_array); $i++) {
            //     echo "<a href=".$site_array[$i]." target='_blank'>".$site_array[$i]."</a>: ";                
            //     if ($site_status[$i]) {
            //         echo "<span class='status-card live'>Live</span><br>";
            //     } else {
            //         echo "<span class='status-card down'>Down</span><br>";
            //     }
            // }
            ?>
        </div>
    </div>

    <script src="script.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</body>

</html>