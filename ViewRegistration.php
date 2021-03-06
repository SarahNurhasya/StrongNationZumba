<!DOCTYPE html> 
<html 
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Strong Nation Zumba Club</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: white;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 50%;
  padding: 5px;
  margin: 2px ;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>

<header>
	<div id="header">
			<a href="homepage.html" class="logo">
				<img src="images/logo.jpg" alt="">
			</a>
			<ul id="navigation">
				<li>
					<a class="active" href="homepage.html">home</a>
				</li>
				<li class="selected">
					<a href="profile.html">profile</a>
				</li>
				<li>
					<a href="adm_about.html">about</a>
				</li>
				<li class="selected">
					<a href="newmember.html">new member</a>
				</li>
				<li>
					<a href="All_Members.html">all member</a>
				</li>
			</ul>
	</div>
</header>
<body>

<script>
		function myFunction() {
		var txt;
		if (confirm("REGISTRATION WAS SUCCESSFUL !!")) {
		txt = "You pressed CONFIRM!";
		} else {
			txt = "You pressed Reset!";
			}
		document.getElementById("demo").innerHTML = txt;
		}
	</script>

		<fieldset>
		  <form id="form1" name="form1" action="ViewRegistration.html" method="post" align="center">

		  <h2>Club Membership Registration Form</h2>
			<h3>New registration</h3>
			
		  <p>Name: 
			<label for="textfield"></label>
		  <input type="text" name="name" id="textfield" value="FARAH WAHIDAH" readonly />
		  </p>
		  <p>Email	: 
			<label for="textfield5"></label>
			<input type="text" name="email" id="textfield" value="farahwahida23@gmail.com" readonly"/>
		  </p>
		  <p>Phone Number	: 
			<label for="textfield2"></label>
			<input type="text" name="phone number" id="textfield" value="+60110321434" readonly />
		  </p>
		  <p>Address	: 
			<label for="textfield3"></label>
			<input type="text" name="address" id="textfield" value="JALAN 21 TAMAN ORKID, 01000 KANGAR, PERLIS " readonly />
		  </p>
		  
		<div id="body">
			<input type="button" onclick="myFunction()" value="Confirm">
			<input type="button" onclick="newmember.html" value="Back">
		</div>
		</form>
		</fieldset>
		
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

<?php

if (isset($_POST['AddMember'])){
$membership_ID = $_POST['membership_ID'];
$admin_ID = $_POST['admin_ID'];
$club_ID = $_POST['club_ID'];
$guest_ID = $_POST['guest_ID'];
$membership_type = $_POST['membership_type'];
$membership_period = $_POST['membership_period'];
$membership_payment = $_POST['membership_payment'];

$conn= mysqli_connect("127.0.0.1","root","","view_registration") or die (mysql_error());

//SQL query
$sql = "INSERT INTO membership (`membership_ID`, `admin_ID`, `club_ID`, `guest_ID`, `membership_type`, `membership_period`, `membership_payment`) 
VALUES
(`$membership_ID`, `$admin_ID`, `$club_ID`, `$guest_ID`, `$membership_type`, `$membership_period`, `$membership_payment`)";


// Execute the query (the recordset $rs contains the result)
if (mysqli_query($conn, $sql)) {
echo "Registration was successful";
} else {
echo "Error: " . $sql . "<br>" . 
mysqli_error($conn);
}
mysqli_close($conn);
}


?>
