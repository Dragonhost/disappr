<?php
  require 'includes/dbh.inc.php';
  require 'includes/variables.inc.php';
  session_start();  
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!-- Robots -->
    <meta name="robots" content="noindex" />

    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Raleway:400,600,700"
      rel="stylesheet"
    />



    <link rel="apple-touch-icon" sizes="57x57" href="logo/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="logo/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="logo/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="logo/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="logo/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="logo/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="logo/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="logo/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="logo/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="logo/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="logo/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="logo/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="logo/favicon-16x16.png">
    <link rel="manifest" href="logo/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="logo/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">


    <link rel="stylesheet" href="style.css" />
    <script src="tinymce/tinymce.min.js"></script>
    <script src="tinymce/init_tinymce.js"></script>

    <title>Disappr</title>
  </head>
  <body>
    <div class="container">
      <div class="nav">
      <!-- <h1>DISAPPR</h1> -->
      <div class="logo">
        <img src="logo/disappr.png" alt="logo" class="d">
        <h1 class="isappr">isappr</h1>
      </div>

      <div class="empty"></div>
      <?php
      if(isset($_SESSION['userId'])){
        echo '<a href="profile.php" class="profile">Profile</a>';
      }
      else{
        echo '<a href="login_signUp.php" class="login-btn register_btn">Login/SignUp</a>';
        $login  = '<h1 id="note">"REGISTER BEFORE CREATING YOUR SECRET MESSAGE"</h1>' ;
      }
     ?>

    </div>
      <div class="header">
        <div class="box">
          <h1>Create Time-Bound Messages <span class="anonymously">ANONYMOUSLY</span></h1>
          <div class="links">
          <?php
                  if(isset($_SESSION['userId'])){
                    echo '<a href="#title" class="start">Start Writing</a>';
                  }else{
                    echo '<a href="#note" class="start">Start Writing</a>';
                  }
          ?>
          <a href="https://www.youtube.com/watch?v=4NZMqOgQ-24" target="_blank" class="learn">Learn More</a>
          </div>
          
        </div>
      </div>
    </div>

    <div class="half">

    <?php
      if(isset($_GET['process'])){
        if($_GET['process'] == "emptytextarea"){
          echo '<h6 class="error-message" id="error" style="color: #e74c3c ;font-size: 1rem;justify-self: center; margin: 0.5rem;">Please type some Text</h6>';
        }elseif($_GET['process'] == "emptytitle"){
          echo '<h6 class="error-message" id="error" style="color: #e74c3c ;font-size: 1rem;justify-self: center; margin: 0.5rem;">Please give a Title</h6>';
        }elseif($_GET['process'] == "timelimit"){
          $timelimit = '<h6 class="error-message" id="error" style="color: #e74c3c ;font-size: 1rem;justify-self: center; margin: 0.5rem;">Please give a Time Limit</h6>';
        }
      }
      if(isset($_SESSION['userId'])){
        echo '<form action="scripts/insert.php" method="POST" class="editor_form" id="editor">
        <input type="text" placeholder="Title" class="title" name="title" id="title" value="'.(isset($_POST['title']) ? $_POST['title'] : '').'">
        <textarea name="editor" class="tinymce"></textarea>
        <div class="timelimit">
          <label type="text">Enter the Time Limit</label>
          <div class="time">
            <input type="text" placeholder="Days" name="days" class="time">
            <input type="text" placeholder="Hours" name="hours" class="time">
            <input type="text" placeholder="Minutes" name="minutes" class="time">
            <input type="text" placeholder="Seconds" name="seconds" class="time">
          </div>
        </div>
        '.(!empty($timelimit) ? $timelimit : '').'
        <button name="save" class="save">Save</button>

      </form>';
      }
      else{
        echo $login;
      }

      // $a = 30;
      // $b = 15;
      // $t = "$a:$b";

      // echo date('H:i:s',strtotime($t));

    
    ?>


</div>

  </body>
</html>
