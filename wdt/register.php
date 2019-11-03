<?php
include "conn.php";
date_default_timezone_set('asia/kuala_lumpur');
$username = mysqli_real_escape_string($conn,$_POST['user_name']);
$password = mysqli_real_escape_string($conn,$_POST['user_password']);
$confirmpassword = mysqli_real_escape_string($conn,$_POST['confirmpassword']);
$email = mysqli_real_escape_string($conn,$_POST['user_email']);

if($password !== $confirmpassword)
{
    echo "<script>alert('Password and confirmed password does not match!');";
    die ("window.history.go(-1);</script>");
}
$sql= "Insert into users_test (user_name, user_password, user_email) VALUES ('$username',".md5($password)."','$email','".date("Y-m-d_H:i:s")."';";
if (!mysqli_query($conn,$sql))
{
    echo("Error description: " . mysqli_error($conn));
}
mysqli_close($conn);
if(mysqli_affected_rows($conn)<=0)
{
    echo "<script>alert('Unable to register ! \\nPlease Try Again!');";
    die ("window.history.go(-1);</script>");
}

    echo "<script>alert('Register Successfully!Please login now!');";
    echo "window.location.href='login.html';</script>";

?>