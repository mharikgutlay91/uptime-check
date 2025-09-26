<?php
require_once '../vendor/autoload.php'; 
?>

<?php 
$site = "https://qwertylabs.io";

$client = new Google_Client();
$client->setAuthConfig('../grounded-pivot-468907-s2-812bf21036e9.json');
$client->setApplicationName("Search Console Request");
$client->addScope('https://www.googleapis.com/auth/webmasters.readonly'); // Or other necessary scopes
$service = new Google_Service_Webmasters($client);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Uptime Check System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="../style.css">
</head>

<body>

  <div class="container-fluid header-div">
    <h1>Uptime System</h1>
    <div class="menu-nav">
      <ul>
        <li><a href="/">Uptime Check</a></li>
        <li><a href="/page-indexing/index.php">Page Indexing Check</a></li>
      </ul>
    </div>
  </div>
  
  <div class="container-fluid content-div">
    <div class="col-sm-12">
      <textarea></textarea>
      <?php
        // $urlToCheck = 'https://example.com/your-page-to-check';
        // $searchQuery = 'site:' . $urlToCheck;
        // $googleSearchUrl = 'https://www.google.com/search?q=' . urlencode($searchQuery);

        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $googleSearchUrl);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        // curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'); // Mimic a browser
        // $response = curl_exec($ch);
        // curl_close($ch);

        // if (strpos($response, 'No results found for') === false) {
        //     echo "URL likely indexed (or at least some results found for the site).";
        // } else {
        //     echo "URL likely not indexed.";
        // }

        $query = new Google_Service_Webmasters_SearchAnalyticsQueryRequest();
        $query->setStartDate('2024-01-01');
        $query->setEndDate('2024-01-31');
        $query->setDimensions(['query', 'page']); // Example dimensions

        $results = $service->searchanalytics->query($site, $query);

        foreach ($results->getRows() as $row) {
            // Process data
        }

        // --------------------------------------------------------------------------------

        // $searchConsole = new SearchConsole([$client, $site]);

        // $queryRequest = new SearchAnalyticsQueryRequest();
        // $queryRequest->setStartDate("2022-04-01");
        // $queryRequest->setEndDate("2022-04-04");
        // $queryRequest->setDimensions(["QUERY","PAGE"]);

        // $response = $searchConsole->searchanalytics->query($site, $queryRequest);

        // echo $response;
        ?>
    </div>
  </div>

  <script src="../script.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</body>

</html>