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
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>About - Strong Nation</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<header>

	<div id="header">
			<a href="homepage.php" class="logo">
				<img src="images/logo.jpg" alt="">
			</a>
			<ul id="navigation">
				<li>
					<a class="active" href="homepage.php">Home</a>
				</li>
				<li>
					<a href="profile.php">Profile</a>
				</li>
				<li class="selected">
					<a href="adm_about.php">About</a>
				</li>
				<li>
					<a href="newmember.php">New member</a>
				</li>
				<li>
					<a href="All_Members.php">All member</a>
				</li>
				<li>
				<a href="homepage_member.php?logout='1'">Logout</a>
				</li>
			</ul>
	</div>
</header>
<body>
	<div id="body">
		<h1><span>READY,SWEAT,GO!</span></h1>
		<div>
			<img src="images/zumba3.jpg" alt="">
			<div class="article">
				<h3>The Story of STRONG Nation</h3>
				<p>
					Music is the ultimate motivator. It pushes you through your workout, through one last rep
					and then one more. Knowing how powerful the effect of music is on a workout, we wondered what would happen 
					if we synced the moves in a high-intensity workout to a beat? So we reverse-engineered the music for STRONG Nation™ to match every single move.
					Moving in sync with music made students consistently push themselves past their limits and meet their goals faster. Now, you can do it too.
				</p>
				<h3>Perfect For</h3>
				<p>
					Everybody and every body! Each Zumba® class is designed to bring people together to sweat it on.
				</p>
				<h3>How It Works</h3>
				<p>
					We take the "work" out of workout, by mixing low-intensity and high-intensity moves for an interval-style,
					calorie-burning dance fitness party. Once the Latin and World rhythms take over, you'll see why Zumba® Fitness 
					classes are often called exercise in disguise. Super effective? Check. Super fun? Check and check.
				</p>
				<h3>Benefits</h3>
				<p>
					A total workout, combining all elements of fitness – cardio, muscle conditioning, balance and flexibility, boosted energy and a serious dose of awesome each time you leave class
				</p>
			</div>
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
	</div>
</body>
</html>
