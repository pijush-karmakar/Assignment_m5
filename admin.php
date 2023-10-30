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
        .add{
            background-color: #28a745;
            border: 0.1rem solid #28a745;
            border-radius: 0.4rem;
            color: #fff;
            cursor: pointer;
            display: inline-block;
            font-size: 1.1rem;
            font-weight: 700;
            height: 2.3rem;
            letter-spacing: .1rem;
            line-height: 2.3rem;
            padding: 0 1rem;
            text-align: center;
            text-decoration: none;
            text-transform: uppercase;
            white-space: nowrap;
        }
        .edit{
            background-color: #138496;
            border: 0.1rem solid #138496;
            border-radius: 0.4rem;
            color: #fff;
            cursor: pointer;
            display: inline-block;
            font-size: 1.1rem;
            font-weight: 700;
            height: 2.3rem;
            letter-spacing: .1rem;
            line-height: 2.3rem;
            padding: 0 1rem;
            text-align: center;
            text-decoration: none;
            text-transform: uppercase;
            white-space: nowrap;
        }
        .delete{
            background-color: #c82333;
            border: 0.1rem solid #c82333;
            border-radius: 0.4rem;
            color: #fff;
            cursor: pointer;
            display: inline-block;
            font-size: 1.1rem;
            font-weight: 700;
            height: 2.3rem;
            letter-spacing: .1rem;
            line-height: 2.3rem;
            padding: 0 1rem;
            text-align: center;
            text-decoration: none;
            text-transform: uppercase;
            white-space: nowrap;
        }
        tr>td>a:hover{
            color:#fff;
        }
        
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="column column-60 column-offset-20">
            <h2>Role Management</h2>
            <p style="font-weight:600;">Perform CRUD operations on the role (admin/manager/user) management page</p>
            <?php include_once( 'inc/template/nav.php' ); ?>
        </div>
    </div>

  
    <div class="row">
        <div class="column column-60 column-offset-20">
        <?php if ( isAdmin() ): ?>
       
        <table>
            <tr>
                <th>Name</th>
                <th style="text-align:center;">User Role</th>
                <?php if ( isAdmin() ): ?>
                <th style="text-align:center;">Action</th>  
                <?php endif; ?> 
            </tr> 
        <?php 
             $users = json_decode( file_get_contents( 'data/users.json' ), true );
             foreach($users as $user){
            
        ?>
               <tr>
                    <td><?php echo $user['username']; ?></td>
                    <td style="text-align:center;"><?php echo $user['role']; ?></td>
                    <?php if ( isAdmin() ): ?>
                    <td style="text-align:center;">
                        <a class="add" href="add.php?email=<?php echo $user['email']; ?>">Add</a>
                        <a class="edit" href="update.php?email=<?php echo $user['email']; ?>">Edit</a>
                        <a class= "delete" href="delete.php?email=<?php echo $user['email']; ?>">Delete</a>
                    </td>
                        
                   
                    <?php endif; ?>
               </tr>

        <?php } ?>

        </table>
    <?php endif; ?>

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