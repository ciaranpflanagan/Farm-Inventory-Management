<?php 	include 'core/init.php';
logged_in_redirect();
 		include 'includes/overall/header.php';

 		if (empty($_POST) === false) {
 			$required_fields = array('username', 'first_name', 'email', 'password', 'password_again');
 			foreach ($_POST as $key=>$value) {
 				 if (empty($value) && in_array($key, $required_fields) === true) {
 				 	$errors[] = 'Starred fields are required';
 				 	break 1;
 				 }
 			}

 			if (empty($errors) === true) {
 				if (user_exists($_POST['username']) === true) {
 					$errors[] = 'Sorry, that username \'<b>' . htmlentities($_POST['username']) . '</b>\' is already registered';
 				}
 				if (preg_match("/\\s/", $_POST['username']) === true) {
 					$errors[] = 'Your username can\'t contain any spaces';
 				}
 				if (strlen($_POST['password']) <= 6) {
 					$errors[] = 'Your password must be at least 6 characters long';
 				}
 				if ($_POST['password'] !== $_POST['password_again']) {
 					$errors[] = 'Your passwords do not match';
 				}
 				if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
 					$errors[] = 'A valid email address is needed to register';
 				}
 				if (email_exists($_POST['email']) === true) {
 					$errors[] = 'Sorry, that email \'<b>' . htmlentities($_POST['email']) . '</b>\' is already registered';
 				}
 			}
 		}
 		?>
		<h1>Register</h1>
<?php
if (isset($_GET['success']) && empty($_GET['success'])) {
	echo 'You\'ve been registered successfully!!!';
}
else {
if (empty($_POST) === false && empty($errors) === true) {
	$register_data = array('username' => $_POST['username'], 'password' => $_POST['password'], 'first_name' => $_POST['first_name'], 'last_name' => $_POST['last_name'], 'email' => $_POST['email']);
	register_user($register_data);

	header('Location: register.php?success');
	exit();
}
else if (empty($errors) === false) {
	echo output_errors($errors); 
}
?>
	<form action="" method="post">
		<ul>
			<li>Username*:<br/> <input type="text" name="username"></li>
			<li>First Name*:<br/> <input type="text" name="first_name"></li>
			<li>Last Name:<br/> <input type="text" name="last_name"></li>
			<li>Email*:<br/> <input type="text" name="email"></li>
			<li>Password*:<br/> <input type="password" name="password"></li>
			<li>Repeat Password*:<br/> <input type="password" name="password_again"></li>
			<li><input type="submit" value="Register"></li>
		</ul>
	</form>
<?php } include 'includes/overall/footer.php';?>