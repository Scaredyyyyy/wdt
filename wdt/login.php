<?php
session_start();
include "conn.php";
$username = mysqli_real_escape_string($conn,$_POST['user']);
$password = mysqli_real_escape_string($conn,$_POST['pass']);

$sql = "Select * from users_test where user_name = '".$username."' and user_password = '".md5($password)."'";
$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result)<=0)
{
    echo "<script>alert('Wrong username / password !Please Try Again!');";
    die("window.history.go(-1);</script>");
}
if ($row=mysqli_fetch_array($result))
{
    $_SESSION['user'] = $row['user_name'];
    $_SESSION['password'] = $row['user_password'];
    $_SESSION['role'] = $row ['user_role'];
}
if($_SESSION['role']==="student")
{
    echo "<script>alert('Welcome back! ".$_SESSION['user']."');";
    echo "window.location.href='home.php';</script>";
}
else if ($_SESSION['role']==="tutor")
{
    echo "<script>alert('Welcome back! ".$_SESSION['user']."');";
    echo "window.location.href='home.php';</script>";
}

?>