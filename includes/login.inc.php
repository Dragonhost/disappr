<?php
require 'variables.inc.php';

if(isset($_POST[$loginButton])){

  require 'dbh.inc.php';
  
  $mailuid = $_POST[$emailOrUsername];
  $password = $_POST[$loginPassword];

  if(empty($mailuid) || empty($password) ){
    header("Location: ../login_signUp.php?loginerror=emptyfields");
    exit(); 
  }
  else{
    $sql = "SELECT * FROM $tableName WHERE $usernameColumn=? OR $emailColumn =?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../login_signUp.php?loginerror=sqlerror");
      exit(); 
    }
    else{
      mysqli_stmt_bind_param($stmt, 'ss', $mailuid, $mailuid);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if($row = mysqli_fetch_assoc($result)){
        $pwdcheck = password_verify($password, $row[$passwordColumn]);
        if($pwdcheck == false){
          header("Location: ../login_signUp.php?loginerror=wrongpwd");
          exit(); 
        }
        elseif($pwdcheck == true){
           session_start();
           $_SESSION['userId'] = $row[$idColumn];
           $_SESSION['userUId'] = $row[$usernameColumn];
           header("Location: ../index.php");
           exit(); 
        }
        else{
          header("Location: ../login_signUp.php?loginerror=wrong");
          exit(); 
        }
        
      }
      else{
        header("Location: ../login_signUp.php?loginerror=nouser");
        exit(); 
      }
    }
  }

}   
else{
  header("Location: ../login_signUp.php?");
  exit(); 
}