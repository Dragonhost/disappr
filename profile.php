<?php
  require 'includes/dbh.inc.php';

  
  session_start();

  if(isset( $_SESSION['userId'])){
    $id = $_SESSION['userId'];
    $sql = "SELECT * FROM data WHERE ref = $id";
    $result = mysqli_query($conn,$sql);
    if($result){
      $result_check = mysqli_num_rows($result);
    }
  
  
    $time = time();
    $flag = 0;
  }

  


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="profile_style.css"/>
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
    <div class="header">
        <a href="index.php" class="logo"><img src="logo/disappr.png" alt="logo" class="logo_icon"></a>
        <div class="nav">
          <a href="index.php" class="home">Home</a>
          <a href="./includes/logout.inc.php" class="logout_btn logout_button">Logout</a>
        </div>
    </div>
    <div class="boxes">
        <?php
        if(isset( $_SESSION['userId'])){
          if($result_check > 0){
            while($rows = mysqli_fetch_assoc($result)){
                $n_time = floor(($time-$rows['added_time'])/(60*60));
                $time_diff = 24-$n_time;
                if(!($n_time >  24)){
                    echo '<form action ="scripts/redirect.php" method="POST"><div class="box"><div class="title">'.$rows['title'].'</div><div class="bottom"><div class="open"><a href='.$rows['link'].'>open</a></div><div class="time">Time Remaining = '.$time_diff.' hrs</div></div></div></form>';
                    $flag++;
                }
                
            }
          }
          if($flag == 0){
            echo '<h1 class="no_active">There are no Active Messages</h1>';
          }
        }
  
        ?>
    </div>
</body>
</html>