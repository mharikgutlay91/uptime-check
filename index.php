<?php include_once 'functions.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Uptime Check System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
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
      <?php 
      for ($i = 0; $i < count($site_array); $i++) {
        echo '<span>'.$site_array[$i].'</span>: ';
        if($socket =@ fsockopen($site_array[$i], 80, $errno, $errstr, 30)) {
        echo '<span class="status-card live">LIVE</span>';
        fclose($socket);
        } else {
        echo '<span class="status-card down">DOWN</span>';
        }
        echo '<br>';
      }
      ?>
    </div>
  </div>

  <script src="script.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</body>

</html>