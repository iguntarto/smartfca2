<?php
session_start();
	$_SESSION['USERNAME'] 		= '';
	$_SESSION['NAMA_DEPAN'] 	= '';
	$_SESSION['NAMA_BELAKANG'] 	= '';
	$_SESSION['DEPARTEMEN'] 	= '';
	$_SESSION['LEVEL'] 			= '';	
session_destroy();
echo 1;
?>