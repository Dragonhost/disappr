<?php
  require "./includes/variables.inc.php";
  session_start();

  $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  $url_parts = parse_url($url);
  if(isset($url_parts['query'])){
    $split = explode("=",$url_parts['query']);
  }


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
    />

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Raleway:400,600,700"
      rel="stylesheet"
    />

    <!-- Stylesheet -->
    <link rel="stylesheet" href="login_signUp_style.css" />

    <!-- External Javascript -->
    <script src="login_signUp.js"></script>


    <title>Disappr</title>
  </head>
  <body>
    <div class="big_box">
    <div class="box1">
    <a href="./index.php"> <i class="fas fa-angle-double-left arrow"></i></a>
    
    <?php
    if(isset($split)){
      if($split[0] == 'signUperror'){
        echo '<h3 class="error">SignUp <span>NOT SUCCESSFUL</span></h3>';
      }elseif($split[0] == 'signUp'){
        echo '<h3 class="error">SignUp <span>SUCCESSFUL</span></h3>';
      }
    }

    
    ?>
    </div>
    <div class="box2">
      <div class="box">
        <div class="front">
          <div class="f_left">
            <h1>Hello, New User</h1>
            <p>Create an acount to stay connected with us</p>
            <a href="#" class="f_signUp_btn f_signUp">SIGN UP</a>
          </div>
          <div class="f_right">
            <h1>LOGIN</h1>
            <?php
                require "./includes/loginErrors.inc.php"
              ?>
            

            <form action="./includes/login.inc.php" method="POST" class="f_form">
          
              <input type="text" name="<?= $emailOrUsername?>" placeholder="Email" />
              <input type="password" name="<?= $loginPassword?>" placeholder="Password" />
              <button type="submit" name="<?= $loginButton?>" class="f_login_btn front_login" id="test">Login</button>
            </form>
          </div>
        </div>
        <div class="back">
          <div class="b_left">
            <h1>SIGN UP</h1>

          <?php
                require "./includes/signUpErrors.inc.php"
          ?>

          <form action="./includes/signUp.inc.php" method="POST">
            <input type="text" name="<?= $username?>" placeholder="Name" />
            <input type="text" name="<?= $email?>" placeholder="Email" />
            <input type="password" name="<?= $password?>" placeholder="Password" />
            <input type="password" name="<?= $passwordRepeat?>" placeholder="Confirm Password">
            <button type="submit" name="<?= $signUpButton?>" class="b_signUp_btn b_signUp">Sign Up</button>
          </form>
        </div>
        <div class="b_right">
          <h1>Welcome Back</h1>
          <p>Login to open your personalised account</p>
          <a href="#" class="b_login_btn b_login">Login</a>
        </div>
      </div>
  </div>

    </div>

  
    
  </body>
</html>
