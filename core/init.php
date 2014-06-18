<?php
session_start();
ob_start();
//error_reporting(0);

$_SESSION['h'] = "I love Jimmy";
echo $_SESSION['h'];

require 'database/connect.php';
require 'functions/general.php';
require 'functions/users.php';


if (logged_in() === true) {
	$session_user_id = $_SESSION['user_id'];
	$user_data = user_data($session_user_id, 'user_id', 'username', 'password', 'first_name', 'last_name', 'email');
	if (user_active($user_data['username']) === false) {
		session_destroy();
		header('Location: index.php');
		exit();
	}
}

$errors = array();
?>