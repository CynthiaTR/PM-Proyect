<?php

$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "db_ejemplo";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("connetion failed:" . mysqli_connect_error());
}
