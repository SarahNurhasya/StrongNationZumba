<!doctype html>

<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration Form</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/mobile.css" media="screen and (max-width : 568px)">
	<script>
	
	window.addEventListener( "load", function () {
	function sendData() {
    const XHR = new XMLHttpRequest();

		// Bind the FormData object and the form element
		const FD = new FormData( form );

		// Define what happens on successful data submission
		XHR.addEventListener( "load", function(event) {
		  alert( event.target.responseText );
		} );

		// Define what happens in case of error
		XHR.addEventListener( "error", function( event ) {
		  alert( 'Oops! Something went wrong.' );
		} );

		// Set up our request
		XHR.open( "POST", "" );

		// The data sent is what the user provided in the form
		XHR.send( FD );
		}

	  // Access the form element...
	  const form = document.getElementById( "clubform" );

	  // ...and take over its submit event.
	  form.addEventListener( "submit", function ( event ) {
		event.preventDefault();

		sendData();
	  } );
	} );

	
	function reset() {
	   
	  document.getElementById("clubform").reset();
	}

</script>
</head>
<style>

.header {
	text-align: center;
}

.input-group {
	margin: 10px 10px 10px 10px;
}

.input-group input {
	height: 32px;
	width: 95%;
	padding: 5px 10px;
	font-size: 15px;
	border-radius: 10px;
	border: 1px solid gray;
	margin: 10px 10px 10px 10px;
}

.btn {
	cursor: pointer;
	padding: 12px;
	font-size: 16px;
	color: black;
	background: #fffff;
	border: none;
	border-radius: 10px;
	margin: 10px 10px 10px 10px
}

.dropbtn {
  background-color: #A6ACAF;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>
<body>
	<div id="header">
		<a href="index.php" class="logo">
			<img src="images/logo.jpg" alt="">
		</a>
		<ul id="navigation">
			<li>
				<a href="index_guest.php">Home</a>
			</li>
			<li>
				<a href="about_guest.php">About</a>
			</li>
			<li>
				<a href="form.php">Join Us</a>
			</li>
			<div class="dropdown">
				<button class="dropbtn">LOGIN</button>
					<div class="dropdown-content">
						<a href="SignIn.php">Login Member</a>
						<a href="SignIn_admin.php">Login Admin</a>
					</div>
		</ul>
	</div>
	<div class="header">
		<h2>REGISTER</h2>
	</div>
	<form method="post" action="form.php">
	<div class="input-group">
		
			<input type="text" name="member_name" placeholder="Name"  required><br><br>
			<input type="email" name="member_email" placeholder="Email"  required><br><br>
			<input type="tel" id="phone" name="member_phoneNo" placeholder="0123456789"><br><br>
			<input type="text" name="member_address" placeholder="Address" required></input><br><br>
			
			<input type="submit" class="btn" name="Add" value="submit"><br><br>
			<input type="button" class="btn" onclick="reset()" value="Reset"><br>
		</form>
		
		<?php
	if (isset($_POST['Add'])){
	$member_name = $_POST['member_name'];
	$member_email = $_POST['member_email'];
	$member_phoneNo = $_POST['member_phoneNo'];
	$member_address = $_POST['member_address'];
	
	$conn= mysqli_connect("127.0.0.1","root","","zumba") or die (mysql_error());
	
	// SQL query
	$sql = "INSERT INTO 
	member (member_name, member_email, member_phoneNo, member_address)
	VALUES
	('$member_name', '$member_email','$member_phoneNo', '$member_address')";

	// Execute the query (the recordset $rs contains the result)
	if (mysqli_query($conn, $sql)) {
	echo "New record created successfully";
	} else {
	echo "Error: " . $sql . "<br>" . 
	mysqli_error($conn);
	}
	mysqli_close($conn);
	}
	?>
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
