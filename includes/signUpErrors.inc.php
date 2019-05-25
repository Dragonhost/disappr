<?php

if(isset($_GET['signUperror'])){
    if($_GET['signUperror'] == "emptyfields"){
      echo '<h6>Fill in all the fields</h6>';
    }
    elseif($_GET['signUperror'] == "invaliduidmail"){
      echo '<h6>Invalid Username and Email</h6>';
    }
    elseif($_GET['signUperror'] == "invalidmail"){
      echo '<h6>Invalid Email</h6>';
    }
    elseif($_GET['signUperror'] == "invalidusername"){
      echo '<h6>Invalid Username(No Spaces Allowed)</h6>';
    }
    elseif($_GET['signUperror'] == "passwordcheck"){
      echo '<h6>Passwords donot Match</h6>';
    }
    elseif($_GET['signUperror'] == "usernametaken"){
      echo '<h6>Username already taken</h6>';
    }
  }
elseif(isset($_GET['signUp'])){
    if($_GET['signUp'] == "success"){
        echo '<h6>SignUp Successful</h6>';
    }
}
