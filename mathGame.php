<?php session_start() ?>

<?php include 'header.php'?>

<?php

extract($_POST);
$_SESSION = $_POST;
    
$firstNumber = rand(0,20);
$secondNumber = rand(0,20);

$_SESSION['correctAnswer'] = 0;

$operationRandom = rand(0,1);
$operation = " ";

//score keeps your score, outOF keeps how many questions you have done so far.
$score = 0;
$outOf = 0;

//error message
$message = "";

if($operationRandom == 0){
    $operation = "+";
}
else if($operationRandom == 1){
    $operation = "-";
}

if(isset($submit)){
    $prevFirstNum = $_POST['firstNum'];
    $prevSecondNum = $_POST['secNum'];
    $prevOperator = $_POST['operator'];
    $prevScore = $_POST['preScore'];
    $prevOutOf = $_POST['preOutOf'];
    $_SESSION['givenAnswer'] = $_POST['answer'];
    
/*random number between 0 and 1. if 1, $operator will be addition. if 0, $operator will be subtraction.*/
if($prevOperator == 0){
    $_SESSION['correctAnswer'] = $prevFirstNum + $prevSecondNum;
}
else if($prevOperator == 1){
    $_SESSION['correctAnswer'] = $prevFirstNum - $prevSecondNum;
}
    
//validate if answer is equal to given answer
if($_SESSION['givenAnswer'] ==  $_SESSION['correctAnswer']){
    $score = $_POST['preScore'] + 1;
    $outOf = $_POST['preOutOf'] + 1;
    $message = "Well done! ";
}
    
//validates if answer does not equal given answer
if($_SESSION['givenAnswer'] <>  $_SESSION['correctAnswer']){
    $score = $_POST['preScore'];
    $outOf = $_POST['preOutOf'] + 1;
    $message = "wrong answer! " . $prevFirstNum . $operation . $prevSecondNum . " equals " . $_SESSION['correctAnswer'];
}
}

?>

<div class="jumbotron">
    <form action="index.php" method="POST">
        <div class="container">
            <!--Header-->
            <span class="pull-right">
                <input type="submit" value="logout" name="logout" id="logout" class="btn btn-success">
            </span>
            <span><h1 class="text-center">Math Game</h1></span>
        </div>
    </form>

    <!--body-->
    <!--print out both numbers and operator(+ or -)-->
    <div class="container">
        <div class="row text-center col-xs-12">
            <span class="col-xs-4"><?php echo $firstNumber ?></span>
            <span class="col-xs-4"><?php echo $operation ?></span>
            <span class="col-xs-4"><?php echo $secondNumber ?></span>
        </div>
    </div>

    <!--Input text field. Enter answer here-->
    <form method="POST" action="mathGame.php">
        <div class="container">
            <div class="col-xs-4 col-xs-offset-4">
                <input type="text" class="form-control" name="answer" id="answer" size="10" maxlength="10" placeholder="Enter answer here">
                <input type="hidden" name="firstNum" value="<?php echo $firstNumber; ?>">
                <input type="hidden" name="secNum" value="<?php echo $secondNumber; ?>">
                <input type="hidden" name="operator" value="<?php echo $operationRandom; ?>">
                <input type="hidden" name="preScore" value="<?php echo $score; ?>">
                <input type="hidden" name="preOutOf" value="<?php echo $outOf; ?>">
            </div>
        </div>

    <!--Submit button-->
        <div class="container">
            <div class="row text-center">
                <input type="submit" name="submit" class="btn btn-primary">
            </div>
        </div>
    </form>

    <!--Horizontal rule-->
    <hr>
    
    <!--Score span-->
    <div class="container text-center">
        <span class="col-xs-4">Score: <?php echo $score ?> / <?php echo $outOf ?></span>
    </div>
    <span><?php echo $message ?></span>
</div>

<?php
if(isset($logout)){
    // remove all session variables
    session_unset(); 

    // destroy the session 
    session_destroy(); 
  }  
?>