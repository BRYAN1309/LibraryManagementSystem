<?php   
session_start(); //to ensure you are using same session
session_destroy(); //destroy the session
echo "<script>alert('User Logout Successfully!'); window.location.href='login.php';</script>";
exit();
?>