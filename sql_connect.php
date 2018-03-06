<?php
$conn = mysqli_connect("localhost", "root", "", "2101_final_project");
$link = mysqli_connect("localhost","root","","dfppi");
if(!$conn || !$link){
    echo "Error Connecting to Database";
    exit();
}
?>