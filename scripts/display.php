<?php
  require '../includes/dbh.inc.php';

  session_start();
  
  $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  $url_parts = parse_url($url);
  $split = explode(".",$url_parts['query']);
  $id = $split[0];
  $random = $split[1];




  $o_time = "SELECT added_time FROM data WHERE id = $id ";
  $result_time = mysqli_query($conn,$o_time);
  $rows_time = mysqli_fetch_assoc($result_time);
  $n_time = time();
  $time = $n_time - $rows_time['added_time'];
  $time_diff = floor($time/(60*60));
  $time_remain = 24 - $time_diff;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="display_style.css"/>
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Raleway:400,600,700"
      rel="stylesheet"
    />


    <title>Disappr</title>
</head>
<body>
  <div class="page">
  <div class="box">
    <?php  if($time_diff > 24){
    echo '<h1 class="text">This Link has <span class="expired">EXPIRED</span></h1>';
  }else{
    $sql = "SELECT * FROM data WHERE id = $id ";
    $result = mysqli_query($conn,$sql);
    $rows = mysqli_fetch_assoc($result);
    $result_check = mysqli_num_rows($result);
    if(($id == $rows['id']) && ($random == $rows['random_text'])){
      if($result_check > 0){
          $decode = html_entity_decode($rows["content"]);
          echo '<div class="title">'.$rows["title"].'</div>';
          echo '<div class="content">'.$decode.'</div>';

       }
       echo '<h3 class="time_diff">Time remaining - '.$time_remain.' hrs</h3>';
    }
     else{
       echo '<h1 class="incorrect_link">Incorrect Link</h1>';
     }

  }?></div>

  </div>
</body>
</html>