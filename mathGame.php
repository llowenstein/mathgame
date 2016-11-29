<?php session_start() ?>

<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<meta name="viewport" content="width=device-width, initial-scale=1">

<div class="jumbotron">
    <form action="index.php" method="POST">
        <div class="container">
            <!--Header-->
            <span class="pull-right">
                <input type="submit" value="logout" class="btn btn-success">
            </span>
            <span><h1 class="text-center">Math Game</h1></span>
        </div>
    </form>

<?php
$firstNumber = rand(0,20);
$secondNumber = rand(0,20);
$operationRandom = rand(0,1);
$operation = " ";

//score keeps your score, outOF keeps how many questions you have done so far.
$score = 0;
$outOf = 0;

/*random number between 0 and 1. if 1, $operator will be addition. if 0, $operator will be subtraction.*/
if($operationRandom == 0){
    $operation = "+";
}
else if($operationRandom == 1){
    $operation = "-";
}


?>
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
                <input type="text" class="form-control" name="input" size="10" maxlength="10" placeholder="Enter answer here">
            </div>
        </div>

    <!--Submit button-->
        <div class="container">
            <div class="row text-center">
                <input type="submit" class="btn btn-primary">
            </div>
        </div>
    </form>

    <!--Horizontal rule-->
    <hr>
    
    <!--Score span-->
    <div class="container text-center">
        <span class="col-xs-4">Score: <?php echo $score?> / <?php echo $outOf ?></span>
    </div>
    
</div>