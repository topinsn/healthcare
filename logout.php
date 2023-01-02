<?php 
	// create an object of the logout function
	
	include_once('shared/user.php');

	$obj = new User();

	//reference logout

	$obj->Logout();

?>