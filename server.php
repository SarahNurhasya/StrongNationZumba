<?php

// Starting the session, necessary
// for using session variables
session_start();

// Declaring and hoisting the variables
$username = "";
$email = "";
$errors = array();
$_SESSION['success'] = "";

// DBMS connection code -> hostname,
// username, password, database name
$db = mysqli_connect('localhost', 'root', '', 'zumba');

// Registration code
if (isset($_POST['reg_user'])) {

	// Receiving the values entered and storing
	// in the variables
	// Data sanitization is done to prevent
	// SQL injections
	$member_username = mysqli_real_escape_string($db, $_POST['member_username']);
	$member_email = mysqli_real_escape_string($db, $_POST['member_email']);
	$member_password_1 = mysqli_real_escape_string($db, $_POST['member_password_1']);
	$member_password_2 = mysqli_real_escape_string($db, $_POST['member_password_2']);

	// Ensuring that the user has not left any input field blank
	// error messages will be displayed for every blank input
	if (empty($member_username)) { array_push($errors, "Username is required"); }
	if (empty($member_email)) { array_push($errors, "Email is required"); }
	if (empty($member_password_1)) { array_push($errors, "Password is required"); }

	if ($member_password_1 != $member_password_2) {
		array_push($errors, "The two passwords do not match");
		// Checking if the passwords match
	}

	// If the form is error free, then register the user
	if (count($errors) == 0) {
		
		// Password encryption to increase data security
		$member_password = md5($member_password_1);
		
		// Inserting data into table
		$query = "INSERT INTO member (member_username, member_email, member_password)
				VALUES('$member_username', '$member_email', '$member_password')";
		
		mysqli_query($db, $query);

		// Storing username of the logged in user,
		// in the session variable
		$_SESSION['member_username'] = $member_username;
		
		// Page on which the user will be
		// redirected after logging in
		header('location: homepage_member.php');
	}
}

// User login
if (isset($_POST['login_user'])) {
	
	// Data sanitization to prevent SQL injection
	$member_email = mysqli_real_escape_string($db, $_POST['member_email']);
	$member_password = mysqli_real_escape_string($db, $_POST['member_password']);

	// Error message if the input field is left blank
	if (empty($member_email)) {
		array_push($errors, "Email is required");
	}
	if (empty($member_password)) {
		array_push($errors, "Password is required");
	}

	// Checking for the errors
	if (count($errors) == 0) {
		
		// Password matching
		$member_password = md5($member_password);
		
		$query = "SELECT * FROM member WHERE member_email=
				'$member_email' AND member_password='$member_password'";
		$results = mysqli_query($db, $query);

		// $results = 1 means that one user with the
		// entered member name exists
		if (mysqli_num_rows($results) == 1) {
			
			// Storing member name in session variable
			$_SESSION['member_email'] = $member_email;
			
			// Page on which the user is sent
			// to after logging in
			header('location: homepage_member.php');
		}
		else {
			
			// If the member name and password doesn't match
			array_push($errors, "Email or password incorrect");
		}
	}
}

?>
