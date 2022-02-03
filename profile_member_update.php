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
* {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 50%;
  padding: 20px;
  grid-gap: 10px;
  font-size: 30px;
  text-align: center;
  height: 600px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

</style>
</head>

<body>
<script>
		function myFunction2() {
		var txt;
		if (confirm("YOUR PROFILE WAS SUCCESSFULLY UPDATED !!")) {
		txt = "You pressed Update!";
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

<body>

<h1><center>MY PROFILE</center></h1>

<div class="row">
  <div class="column" style="background-color:#BB8FCE;">
    <img src="images/profil.jpg" alt="Ali" style="width:20%">
		  
		  <h3><?php echo $rows['member_name']; ?> </h3>
		  <a href="#"><i class="fa fa-dribbble"><?php echo $rows['member_email']; ?></i></a>
		  <h4><?php echo $rows['member_phoneNo']; ?> </h4>
		  <h4><?php echo $rows['member_address']; ?> </h4>
  </div>
  
  <div class="column" style="background-color:#D2B4DE;">
    <h4>PERSONAL</h4>
		<form name="form1" method="post" action="profile_member_update.php">
		<h6>NAME	: 
		<label for="textfield"></label>
		<input type="text" name="member_name" id="textfield" value="<?php echo $rows['member_name']; ?>" required />
	  </h6>
	  
	   <h6>EMAIL	: 
		<label for="textfield"></label>
		<input type="text" name="member_email" id="textfield" value="<?php echo $rows['member_email']; ?>" required />
		<span class="error"></span>
	  </h6>
	  
	  <h6>NO PHONE: 
		<label for="textfield"></label>
		<input type="text" name="member_phoneNo" id="textfield" value="<?php echo $rows['member_phoneNo']; ?>" required />
	  </h6>
	  
	  <h6>ADDRESS	:
		<label for="textfield"></label>
		<input type="text" name="member_address" id="textfield" value="<?php echo $rows['member_address']; ?>" required />
	  </h6>
		<div id="body">
		  </form>
			  <a href="homepage_member.php"><button>Cancel</button>
				  </a>
			  <a><button type="submit" name="update" onclick="myFunction2()">Update</button>
          </a>
  </div>
</div>
		  
<?php
}

if (isset($_POST['update'])){
$member_name = $_POST['member_name'];
$member_email = $_POST['member_email'];
$member_phoneNo = $_POST['member_phoneNo'];
$member_address = $_POST['member_address'];

$conn= mysqli_connect("127.0.0.1","root","","zumba") or die (mysql_error());

// SQL query
$sql= "UPDATE member SET member_name ='$_POST[member_name]',member_phoneNo='$_POST[member_phoneNo]',member_address='$_POST[member_address]' WHERE member_email='$_POST[member_email]'";

// Execute the query (the recordset $rs contains the result)
if (mysqli_query($conn, $sql)) {
echo "";
} else {
echo "Error: " . $sql . "<br>" . 
mysqli_error($conn);
}
mysqli_close($conn);
}
?>
		  
  </form>
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


