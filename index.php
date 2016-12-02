<?php session_start() ?>

<?php include 'header.php'?>

<?php
    extract($_POST);
    $_SESSION = $_POST;

    //hard coded username and password
    $username = "a@a.a";
    $correctPassword = "aaa";
    $msg = "";

    //validating password so its not empty
    if(isset($submitButton) && empty($email)){
        $msg = "Not a valid username or password. Try again";
    }
    if(isset($submitButton) && $email === $username && $password === $correctPassword){
        header("Location:mathGame.php");
    }
    if(isset($submitButton)){
        if($email != $username || $password != $correctPassword){
            $msg = "Not a valid username or password. Try again";
        }   
    }
?>

<div class="container">
    <h1>Please login to enjoy our math game</h1>
    <form method="POST" action="index.php" class="form-horizontal">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" class="form-control" placeholder="Email" maxlength="10">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" maxlength="10">
        </div>
        <div class="form-group">
            <input type="submit" name="submitButton" class="btn btn-danger" value="Login">
            <p><?php echo $msg ?></p>
        </div>
    </form>
</div>
