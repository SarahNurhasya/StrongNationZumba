<?php

// Starting the session, to use and
// store data in session variable
session_start();

// If the session variable is empty, this
// means the user is yet to login
// User will be sent to 'login.php' page
// to allow the user to login
if (!isset($_SESSION['member_email'])) {
	$_SESSION['msg'] = "You have to log in first";
	header('location: SignIn.php');
}

// Logout button will destroy the session, and
// will unset the session variables
// User will be headed to 'login.php'
// after logging out
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['member_email']);
	header("location: SignIn.php");
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
.grid-container {
  display: grid;
  grid-gap: 10px;
  background-color: white;
  padding: 10px;
}

.grid-item {
  background-color: #DFA0FA;
  text-align: center;
  padding: 20px;
  font-size: 30px;
}

.button {
  border: none;
  color: black;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

.item2 {
  grid-column: 0;
  grid-row: 1 / span 2;
}

</style>
</head>
<header>
				
<div id="header">
		<a href="homepage_member.php" class="logo">
			<img src="images/logo.jpg" alt="">
		</a>
		<ul id="navigation">
			<li>
				<a href="homepage_member.php" >Home</a>
			</li>
			<li class="selected">
				<a href="profile_member.php" >Profile</a>
			</li>
			<li>
				<a href="about_member.php" >About</a>
			</li>
			<li>
				<a href="member_clubmember.php">Club Membership</a>
			</li>
			<li>
				<a href="profile_member.php?logout='1'">Logout</a>
			</li>
		</ul>
	</div>
</header>

<body>

<?php

include "dbConn.php"; // Using database connection file here

$records = mysqli_query($conn,"select * from member"); // fetch data from database

while($rows = mysqli_fetch_array($records))
{
?>

<div id="body">
	<div class="grid-container">
		
		  <div class="grid-item item2">
		  <h3>MY PROFILE</h3>
		  <img src="images/profil.jpg" alt="Ali" style="width:10%">
		  
		  <h6>NAME: <?php echo $rows['member_name']; ?></h6>
		  <h6>EMAIL: <i class="fa fa-dribbble"><?php echo $rows['member_email']; ?></i></h6>
		  <h6>PHONE NO: <?php echo $rows['member_phoneNo']; ?></h6>
		  <h6>ADDRESS: <?php echo $rows['member_address']; ?>
		  <br><br>
			<a href="profile_member_update.php"> <button class="button button">Update</button> </a>
	 </div>
</div>
	<div id="footer">
		<div>
			<p>&copy; 2023 by Strong Nation. All rights reserved.</p>
			<ul>
				<li>
					<a href="https://www.twitter.com/" id="twitter">twitter</a>
				</li>
				<li>
					<a href="https://www.facebook.com/" id="facebook">facebook</a>
				</li>
			</ul>
		</div>
	<div>
<?php
}
?>
</body>
</html>
