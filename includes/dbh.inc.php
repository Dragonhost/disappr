<?php

require 'variables.inc.php';

$servername =$serverName;
$dBUsername =$databaseUsername ;
$dBPassword =$databasePassword;
$dBName =$databaseName;

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if(!$conn)
{
    die("Connection Failed: ".mysqli_connect_error());
}