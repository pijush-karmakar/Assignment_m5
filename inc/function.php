<?php 
function isAdmin() {
	return ($_SESSION['role']=='admin' );
}


function isManager() {
	return ($_SESSION['role']=='manager');
	
}

function isUser() {
	return ($_SESSION['role']=='user' );
}













?>