<?php

$DB_HOST = "localhost";
$DB_USERNAME = "root";
$DB_PASSWORD = "";
$DB_NAME = array('2101_final_project','dfppi');

$conn = mysqli_connect("{$DB_HOST}","{$DB_USERNAME}","{$DB_PASSWORD}","{$DB_NAME[0]}");
$link = mysqli_connect("{$DB_HOST}","{$DB_USERNAME}","{$DB_PASSWORD}","{$DB_NAME[1]}");

if(!$conn || !$link){
    echo "Error Connecting to Database";
    exit();
}
?>