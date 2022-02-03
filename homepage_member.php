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
	<title>Homepage</title>
	<link rel="stylesheet" type="text/css"
					href="style.css">
</head>
<body>
	<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Strong Nation Zumba Club</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
 
<style>

h1, h4, p {
	padding-top: 10px;
  	padding-right: 80px;
  	padding-bottom: 10px;
  	padding-left: 80px;
}
h1 {
	color: black;
	font-family: verdana;
	font-size: 200%;
	text-align: center;
	background-color:#9932CC;
	border: 1px solid black;
	margin-top: 10px;
  	margin-bottom: 30px;
  	margin-right: 320px;
  	margin-left: 320px;
}
h4 {
	color: black;
	font-family: verdana;
	font-size: 150%;
	text-align: center;
}
h2 {
	color: black;
	font-family: verdana;
	font-size: 100%;
	text-align: center;
	padding-top: 10px;
  	padding-right: 400px;
  	padding-bottom: 10px;
  	padding-left: 400px;
}
h3 {
	color: black;
	font-family: verdana;
	font-size: 100%;
	text-align: center;
    border: 2px solid #9932CC;
    padding: 25px 50px 75px;
}
.type="image" {
	margin-top: 50px;
  	margin-bottom: 50px;
  	margin-right: 320px;
  	margin-left: 320px;
	}

* {
  box-sizing: border-box;
}

.column {
  float: left;
  width: 50%;
  padding: 10px;
  height: 300px; 
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

img {
  display: block;
  margin-left: auto;
  margin-right: auto;
}

p.groove {border-style: groove;}

</style>
</head>

<header>
<?php if (isset($_SESSION['success'])) : ?>
<?php endif ?>
<?php if (isset($_SESSION['member_email'])) : ?>

<div id="header">
		<a href="homepage_member.php" class="logo">
			<img src="images/logo.jpg" alt="">
		</a>
		<ul id="navigation">
			<li class="selected">
				<a href="homepage_member.php" >Home</a>
			</li>
            <li>
				<a href="profile_member.php" >Profile</a>
			</li>
			<li>
				<a href="about_member.php" >About</a>
			</li>
			<li>
				<a href="member_clubmember.php">Club membership</a>
			</li>
			<li>
				<a href="homepage_member.php?logout='1'">Logout</a>
			</li>
		</ul>
  </div>
</header>

<body>
	<div id="body">
		<h1><span>READY, SWEAT, GO!</span></h1>
		<div>
			<div class="article">
			
			
				<h4>With in-person, virtual and socially-distanced outdoor class options, there's a perfecr fit for all</h4>
				<h4>THE WORD IS OUT. AND IT'S GOOD.</h4>

				<div class="row">
				  <div class="column">
					<h3> "We did basically every more that you're ever done in a HIT class, ... we actually had a blast."</h3>
				  </div>
				  
				  <div class="column">
					<h3> "With this workout ... you'll feel like you've flexed every muscle in your body"</h3>
				  </div>
				</div>
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
		<?php endif ?>
	</div>

</body>
</html>
