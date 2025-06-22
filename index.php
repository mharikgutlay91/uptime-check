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
  </div>
  <div class="container-fluid content-div">
    <div class="col-sm-12">
      <?php 
      for ($i = 0; $i < count($site_array); $i++) {
        echo '<a href="'.$site_array[$i].'" target="_blank">'.$site_array[$i].'</a>: 
        <button class="status-card live" onclick="checkWebsiteLive(\''.$site_array[$i].'\')">CHECK</button><br>
        ';
      }
      ?>
    </div>
  </div>

  <script src="script.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</body>

</html>