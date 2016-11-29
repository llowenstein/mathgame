<?php session_start() ?>

<?php
    
extract($_POST);
$_SESSION = $_POST;

//hard coded username and password
$username = "a@a.a";
$password = "aaa";
$msg = " ";

//validating password so its not empty
if(empty($password) || empty($password)){
    $msg = $msg . "Not a valid username or password. Try again. <br>";
}

//printing out error message if applicable
if(!empty($msg)){
    header("Location:index.php?"); die();
}

?>