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
            function checkStatus($url) {
                $req = curl_init($url);
                curl_setopt($req, CURLOPT_CONNECTTIMEOUT, 10);
                curl_setopt($req, CURLOPT_HEADER, true);
                curl_setopt($req, CURLOPT_NOBODY, true);
                curl_setopt($req, CURLOPT_RETURNTRANSFER, true);
                $res = curl_exec($req);
                curl_close($req);
                // return $res;

                $code = curl_getinfo($req, CURLINFO_HTTP_CODE);

                if ($res && ($code >= 200 && $code < 300)) {
                    return true;
                } else {
                    return false;
                }
            }

            // // $online = checkStatus('https://muaasdasd3.jp/');
            // $online = checkStatus('https://www.bitcasino.com');

            // // echo $online;
            // // echo $online[7].$online[8].$online[9];

            // $array = explode(' ', $online);
            // echo $array[1];

            $site_array = array(
                // "https://www.bitcasino.com",
                // "https://bitcasino.jp",
                // "https://bitcasino.in",
                // "https://sportsbet.jp",
                // "https://bitcasino.de",
                // "https://luckyslots.com",
                // "https://bitcasi.kr",
                // "https://bitcasinofun.com",
                // "https://luckyslots.io",
                // "https://sports-bitcoin.com",
                // "https://1xbitcoin.net",
                // "https://thebookmaker.info",
                // "https://stake.jpn.com",
                // "https://stakecasino.kr",
                // "https://stakeoriginals.de",
                // "https://mua3.jp/",
                "https://stakeoriginals.tr",
                "https://stakecasi.kr",
                "https://xolotto.com/blog",
                "https://xolotto.com/ja/blog",
                "https://roobet.jp",
                "https://roobetcasino.com",
                "https://playloto6.jp",
                "https://winz-casino.de",
                "https://bhaggo.app",
                "https://kasinohus.com",
                "https://k-casinoreview.com",
                "https://apps-casino.de",
                "https://curatedlabs.io",
                "https://qwertylabs.io",
                "https://www.sportsadda.com"
            );

            $site_status = array();
            foreach($site_array as $site) {
                $online = checkStatus($site);
                array_push($site_status, $online);
            }

            // print_r($site_status);
            // foreach($site_status as $status) {
            //     $array1 = explode(' ', $status);          
            //     // echo $array1[1]."<br>";
            // }
        ?>
        <div class="col-sm-12">
            <?php 
            for ($i = 0; $i < count($site_array); $i++) {
                echo "<a href=".$site_array[$i]." target='_blank'>".$site_array[$i]."</a>: ";                
                if ($site_status[$i]) {
                    echo "<span class='status-card live'>Live</span><br>";
                } else {
                    echo "<span class='status-card down'>Down</span><br>";
                }
            }
            ?>
        </div>
    </div>

    <script src="script.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</body>

</html>