<?php 

$u_email = $_GET['email'];
$users = json_decode( file_get_contents( 'data/users.json' ), true );
$users[$u_email]['role']="";

$users = json_encode( $users, JSON_PRETTY_PRINT );
file_put_contents( 'data/users.json', $users );
header('location:admin.php');









?>