<?php 
session_start();

$_SESSION['loggedin'] = false;

if(isset($_POST['login']) ){
    
    $email    = $_POST['email'];
    $password = $_POST['password'];

    $_SESSION['role'] = false;

    $users = json_decode( file_get_contents( 'data/users.json' ), true );
    
        if (isset($users[$email]) && $users[$email]['password']==$password) {
            $_SESSION['loggedin'] = true;
            $_SESSION['role'] = $users[$email]['role'];
            if($users[$email]['role']=='admin'){
                header('location:admin.php');
            }
           
            else if($users[$email]['role']=='manager'){
                header('location:manager.php');
            }
            else{
                header('location:user.php'); 
            } 
        
        }
        else{
            $error="Email and Password didn't match!";
        }  

}

if ( isset( $_GET['logout'] ) ) {
	$_SESSION['loggedin'] = false;
    $_SESSION['role'] = false;
	session_destroy();
	header('location:login.php');
}



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
            <h2>User LogIn</h2>
        </div>
    </div>
    
    <div class="row" style="margin-top:100px;">
        <div class="column column-60 column-offset-20">
			<?php	
            if ( isset($error) ) {
				echo "<blockquote>$error</blockquote>";
			}	
			if ( false == $_SESSION['loggedin'] ):
			?>
                <form method="POST">
                    <label for=email>Email</label>
                    <input type="email" name='email' id="email">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                    <button type="submit" class="button-primary" name="login">Log In</button>
                </form>
                <p>New to Here? <a href="register.php">Create an account</a></p>
            <?php else: ?>
                <form action="login.php" method="POST">
                    <input type="hidden" name="logout" value="1">
                    <button type="submit" class="button-primary" name="submit">Log Out</button>
                </form>    
			<?php endif; ?>
        </div>
    </div>
</div>


