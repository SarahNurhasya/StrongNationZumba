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
	$admin_name = mysqli_real_escape_string($db, $_POST['admin_name']);
	$admin_email = mysqli_real_escape_string($db, $_POST['admin_email']);
	$admin_password_1 = mysqli_real_escape_string($db, $_POST['admin_password_1']);
	$admin_password_2 = mysqli_real_escape_string($db, $_POST['admin_password_2']);

	// Ensuring that the user has not left any input field blank
	// error messages will be displayed for every blank input
	if (empty($admin_name)) { array_push($errors, "Username is required"); }
	if (empty($admin_email)) { array_push($errors, "Email is required"); }
	if (empty($admin_password_1)) { array_push($errors, "Password is required"); }

	if ($admin_password_1 != $admin_password_2) {
		array_push($errors, "The two passwords do not match");
		// Checking if the passwords match
	}

	// If the form is error free, then register the user
	if (count($errors) == 0) {
		
		// Password encryption to increase data security
		$admin_password = md5($admin_password_1);
		
		// Inserting data into table
		$query = "INSERT INTO admin (admin_name, admin_email, admin_password)
				VALUES('$admin_name', '$admin_email', '$admin_password')";
		
		mysqli_query($db, $query);

		// Storing username of the logged in user,
		// in the session variable
		$_SESSION['admin_name'] = $admin_name;
		
		// Page on which the user will be
		// redirected after logging in
		header('location: homepage.php');
	}
}

// User login
if (isset($_POST['login_user'])) {
	
	// Data sanitization to prevent SQL injection
	$admin_email = mysqli_real_escape_string($db, $_POST['admin_email']);
	$admin_password = mysqli_real_escape_string($db, $_POST['admin_password']);

	// Error message if the input field is left blank
	if (empty($admin_email)) {
		array_push($errors, "Email is required");
	}
	if (empty($admin_password)) {
		array_push($errors, "Password is required");
	}

	// Checking for the errors
	if (count($errors) == 0) {
		
		// Password matching
		$admin_password = md5($admin_password);
		
		$query = "SELECT * FROM admin WHERE admin_email='$admin_email' AND admin_password='$admin_password'";
		$result = mysqli_query($db, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);

		// $results = 1 means that one user with the
		// entered member name exists
		if ($rows == 1) {
			
			// Storing member name in session variable
			$_SESSION['admin_email'] = $admin_email;
			
			// Page on which the user is sent
			// to after logging in
			header('location: homepage.php');
		}
		else {
			
			// If the member name and password doesn't match
			array_push($errors, "Email or password incorrect");
		}
	}
}

?>
