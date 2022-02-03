<?php
session_start();

if (!isset($_SESSION['member_email'])) {
	$_SESSION['msg'] = "You have to log in first";
	header('location: SignIn.php');
}

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


img {
  display: block;
  margin-left: auto;
  margin-right: auto;
}

table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}

.btn {
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
            <li>
				<a href="profile_member.php" >Profile</a>
			</li>
			<li>
				<a href="about_member.php">About</a>
			</li>
			<li class="selected">
				<a href="member_clubmember.php">Club Membership</a>
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
		if (confirm("Subscribe")) {
		txt = "You pressed Subscribe!";
		} else {
			txt = "You pressed Cancel!";
			}
		document.getElementById("demo").innerHTML = txt;
		}
	</script>

<?php

include "dbConn.php"; // Using database connection file here

$records = mysqli_query($conn,"select * from member"); // fetch data from database

while($rows = mysqli_fetch_array($records))
{
?>
	
	<div id="body" >
		<img src="images/profile.jpg" alt="" style="width:10%;">
		<h2><?php echo $rows['member_name']; ?></h2>

		<table  align="center" width="70%">
		  <tr>
			<th>GUEST</th>
			<th>STANDARD</th> 
			<th>PREMIUM</th>
		  </tr>
		  <tr>
			<td rowspan="5">10% off  for  NEW MEMBER</td>
			<td>RM50/month</td>
			<td>RM100/month</td>
		  </tr>
		  <tr>
			<td>2 class/week</td>
			<td>4 class/week</td>
		  </tr>
		  <tr>
			<td>1 hour/class</td>
			<td>2 hour/class</td>
		  </tr>
		  <tr>
			<td>Randon instructor</td>
			<td>Choose instructor</td>
		  </tr>  
		  <tr>
			<td>FREE SN SHIRT</td>
			<td>FREE SN SHIRT<br>FREE DRINK AND FOOD</td>
		  </tr>
		</table>
		<a href="homepage_member.php"><button>Cancel</button>
				  </a>
			  <a><button onclick="myFunction()">Subscribe</button>
				  </a>
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
<?php
}
?>
</body>
</html>