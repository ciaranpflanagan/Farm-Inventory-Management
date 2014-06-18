<?php
$page_title = "Login | farmrecorder.com | Making Farm Management Easier";
include 'core/init.php';
logged_in_redirect();

if (empty($_POST) === false){
	$username = $_POST['username'];
	$password = $_POST['password'];

	if (empty($username) === true || empty($password) === true) {
		$errors[] = 'You forgot to enter a username and password';
	}
	else if (user_exists($username) === false) {
		$errors[] = 'This username isn\'t registered in our database. Have you registered?';
	}
	else if (user_active($username) === false) {
		$errors[] = 'You haven\'t activated your account!!!';
	}
	else {
		$login = login($username, $password);
		if ($login === false) {
			$errors[] = 'That username or password is inncorect!!!';
		}
		else {
			$_SESSION['user_id'] = $login;
			$_SESSION['username'] = $_POST['username'];
			header('Location: index.php');
			exit();
		}
	}
} else {
	$errors[] = 'Not Data';
}

include 'includes/overall/header.php';

if (empty($errors) === false) {
?>
	<h2>We tried to log you in but we encounterd the following problems,</h2>
<?php
echo output_errors($errors);
}

include 'includes/overall/footer.php';
?>