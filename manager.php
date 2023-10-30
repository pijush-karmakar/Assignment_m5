<?php 
session_start();
require_once "inc/function.php";
if($_SESSION['loggedin']==true ) { 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Assignment05</title>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="//cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
    <link rel="stylesheet" href="//cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
    <style>
        body {
            margin-top: 30px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="column column-60 column-offset-20">
            
            <?php if ( isManager() ):  ?>
                <h2>Welcome! Manager </h2>
            <?php endif; ?>
            
            <p>This page is accessible by manager</p>
            <?php include_once( 'inc/template/nav.php' ); ?>
        </div>
    </div>

  
    <div class="row">
        <div class="column column-60 column-offset-20">

        </div>
    </div>
   

       
</div>
<script type="text/javascript" src="assets/js/script.js"></script>
</body>
</html>

<?php } 
else{
    header('location:login.php'); 
}
?>