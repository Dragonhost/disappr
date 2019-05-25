<?php

if(isset($_GET['loginerror'])){
    if($_GET['loginerror'] == "emptyfields"){
      echo '<h6>Fill in all the fields</h6>';
    }
    elseif($_GET['loginerror'] == "wrongpwd"){
      echo '<h6>Invalid Password<h6>';
    }
    elseif($_GET['loginerror'] == "nouser"){
      echo '<h6>No Users Exists</h6>';
    }
  }