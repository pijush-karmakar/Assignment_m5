<?php

session_start();
$users = json_decode( file_get_contents( 'data/users.json' ), true );




if ( isset( $_POST['update_role'] ) ) {
    $u_email = $_GET['email'];
    $new_role   = $_POST['role'];

    if ( isset( $users[$u_email])  )  {
        $users[$u_email]['role'] = $new_role;
        file_put_contents( 'data/users.json', json_encode( $users, JSON_PRETTY_PRINT ) );

        header('location:admin.php');
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
        .back{
            background-color: #9b4dca;
            border: 0.1rem solid #9b4dca;
            border-radius: 0.4rem;
            color: #fff;
            cursor: pointer;
            display: inline-block;
            font-size: 1.1rem;
            font-weight: 700;
            height: 3.8rem;
            letter-spacing: .1rem;
            line-height: 3.8rem;
            padding: 0 3rem;
            text-align: center;
            text-decoration: none;
            text-transform: uppercase;
            white-space: nowrap;
           
        }
        
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="column column-60 column-offset-20">
            <h2>Project - CRUD</h2>
            <p>A sample project to perform CRUD operations using plain files and PHP</p>
            <?php include_once( 'inc/template/nav.php' ); ?>
        </div>
    </div>

  
    <div class="row">
        <div class="column column-60 column-offset-20">
                <form method="POST">
                            <input class="form-control" type="text" name="role" placeholder="Role"
                                value="<?php echo $users[$_GET['email']]['role'] ?>">
                            <input class="btn btn-primary" type="submit" name="update_role" value="Update">
                            <a href="admin.php" class="back"> Back </a>
                </form>
        </div>
    </div>
   

       
</div>
<script type="text/javascript" src="assets/js/script.js"></script>
</body>
</html>