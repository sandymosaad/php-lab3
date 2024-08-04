<?php
session_start(); 


$username = $_SESSION['username'];
?>

<h1>Welcome, <?php echo $username; ?>!</h1>
<p>You have successfully logged in.</p>