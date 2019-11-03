<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "users_test";

$conn = mysqli_connect ($server, $username, $password, $dbname);

if (mysqli_connect_error()){
    die('<script>alert("Connection Failed: Please check your SQL connection!");</script>');
}
echo "<script>alert('Successfully connect!');</script>";
?>