<?php

$dbServerName = 'localhost';
$dbUserName = 'root';
$dbPassword = 'Vfr_25_Bgt';
$dbName = 'myphpresume';

$conn = mysqli_connect(
    $dbServerName,
    $dbUserName,
    $dbPassword,
    $dbName
);


if(!$conn) {
    die('Connection failed: '.mysqli_connect_error());
}else{
    echo 'Connected..';
}