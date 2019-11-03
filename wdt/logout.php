<?php
session_start();

echo "<script>alert('You successfully logged out! Thank You ".$_SESSION['user']."!')</script>";

session_destroy();

echo "<script>window.location.href='login.html'</script>";
?>