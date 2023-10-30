<?php
session_start();

$usersFile = 'data/users.json';

$users = file_exists( $usersFile ) ? json_decode( file_get_contents( $usersFile ), true ) : [];

function saveUsers( $users, $file )
{   
    file_put_contents( $file, json_encode( $users, JSON_PRETTY_PRINT ) );
}

// Registration Form Handling
if ( isset( $_POST['register'] ) ) {
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $password = $_POST['password'];

//Validation
    if ( empty( $username ) || empty( $email ) || empty( $password ) ) {
        $errorMsg = "Please fill  all the fields.";
    } else { 
       
            $users[$email]= [ 
                'username' => $username,
                'email'    => $email,
                'password' => $password,
                'role'     => 'user',
            ];
            
        
            saveUsers( $users, $usersFile );
            $_SESSION['email'] = $email;
            header( 'Location: index.php' );
        

    }

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
            <h2> User Registration</h2>
        </div>
    </div>
    <div class="row">
        <div class="column column-60 column-offset-20">
           New here,first register | Already have an account <a href="login.php">Log In </a> 
        </div>
    </div>


        <div class="row">
            <div class="column column-60 column-offset-20">
            <?php if ( isset( $errorMsg ) ) {
                echo "<blockquote>$errorMsg </blockquote>";
            }
            ?>
            </div>
        </div>
    

    <div class="row" style="margin-top:100px;">
        <div class="column column-60 column-offset-20">
			
                <form action="register.php" method="POST">
                    <label for='username'>Username</label>
                    <input type="text" name='username' id="username">

                    <label for='email'>Email</label>
                    <input type="text" name='email' id="email">

                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">

                    <button type="submit" class="button-primary" name="register">Register</button>
                </form>
             
        </div>
    </div>
</div>