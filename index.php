<?php session_start() ?>

<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<meta name="viewport" content="width=device-width, initial-scale=1">


<div class="container">
    <h1>Please login to enjoy our math game</h1>
    <form method="POST" action="validate.php" class="form-horizontal">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" class="form-control" placeholder="Email" maxlength="10">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" class="form-control" placeholder="Password" maxlength="10">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-danger" value="Login">
        </div>
    </form>
</div>