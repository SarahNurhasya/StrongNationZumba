<?php

// Starting the session, to use and
// store data in session variable
session_start();

// If the session variable is empty, this
// means the user is yet to login
// User will be sent to 'login.php' page
// to allow the user to login
if (!isset($_SESSION['admin_email'])) {
	$_SESSION['msg'] = "You have to log in first";
	header('location: SignIn_admin.php');
}

// Logout button will destroy the session, and
// will unset the session variables
// User will be headed to 'login.php'
// after logging out
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['admin_email']);
	header("location: SignIn_admin.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Strong Nation Zumba Club</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
<style>

p {
	color: black;
	font-family: verdana;
	font-size: 100%;
	text-align: center;
	padding-top: 10px;
  	padding-right: 400px;
  	padding-bottom: 10px;
  	padding-left: 400px;
}




</style>
</head>

<header>

	<div id="header">
		<a href="homepage.php" class="logo">
			<img src="images/logo.jpg" alt="">
		</a>
		<ul id="navigation">
			<li>
				<a class="active" href="homepage.php">home</a>
			</li>
			<li>
				<a href="profile.php">profile</a>
			</li>
			<li>
				<a href="adm_about.php">about</a>
			</li>
			<li class="selected">
				<a href="newmember.php">new member</a>
			</li>
			<li>
				<a href="All_Members.php">all member</a>
			</li>
			<li>
				<a href="homepage_member.php?logout='1'">Logout</a>
			</li>
		</ul>
	</div>

</header>
<body>
	<script>
		function myFunction() {
		var txt;
		if (confirm("APPROVE AS MEMBERSHIP !!")) {
		txt = "You pressed CONFIRM!";
		} else {
			txt = "You pressed Cancel!";
			}
		document.getElementById("demo").innerHTML = txt;
		}
	</script>

	<?php
		$servername = "localhost";
		$dbusername = "root";
		$dbpassword = "";
		$dbname = "zumba";
		// Create connection
		$conn = mysqli_connect($servername, $dbusername, $dbpassword, 
		$dbname);
		// Check connection
		if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
		}
		$sql = "SELECT member_ID, membership_ID, member_name, member_phoneNo, member_email, member_address FROM member";
		$result = mysqli_query($conn, $sql);
	?>

		<p>
		<table border=3 width=70% align=center>
		<tr>
		<th>MEMBER ID</th>
		<th>MEMBERSHIP ID</th>
		<th>MEMBER NAME</th>
		<th>MEMBER NO PHONE</th>
		<th>MEMBER EMAIL</th>
		<th>MEMBER ADDRESS</th>
		</tr>
		
		<?php
			if (mysqli_num_rows($result) > 0) {
			 // output data of each row
			 while($row = mysqli_fetch_assoc($result)) {
		?>
		<tr>
			<td><?php echo $row['member_ID'];?></td>
			<td><?php echo $row['membership_ID'];?></td>
			<td><?php echo $row['member_name'];?></td>
			<td><?php echo $row['member_phoneNo'];?></td>
			<td><?php echo $row['member_email'];?></td>
			<td><?php echo $row['member_address'];?></td>
		</tr>
		<?php
			 }
			} else {
			 echo "<tr><td colspan='8'>0 results</td></tr>";
			}
			mysqli_close($conn);
		?>
		</p>
</body>
</html>