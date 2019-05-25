<?php
  require '../includes/dbh.inc.php';
  require '../includes/variables.inc.php';

 session_start();

 $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
 $url_parts = parse_url($url);
 $split = explode(".",$url_parts['query']);
 $id = $split[0];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="temp_url_style.css"/>
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
    <div class="box">
        <h1>The Message has been created</h1>

        <?php
        $url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

        $url_parts = parse_url($url);

        $split = explode("/",$url_parts['path']);

        $size = sizeof($split);
        
        $new_size = --$size;

        $split[$new_size] = "display.php";

        reset($split);

        $path =  join("/",$split);

        $new_url = $url_parts["scheme"] ."://". $url_parts["host"] .$path ."?". $url_parts["query"];


        $sql = "UPDATE data SET link = '$new_url' WHERE id = $id;";
        $query = mysqli_query($conn,$sql);

        ?>

        <div class="temp_url"><?php echo $new_url;?></div>

        <h3>You can copy and share this url or go to your profile to view all your recent MESSAGES</h3>
        <a href="../profile.php">Profile</a>
    </div>
</body>
</html>