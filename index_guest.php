<!doctype html>

<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Strong Nation Zumba Club</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">

	
</head>
<style>
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
<header>
	<div id="header">
		<a href="index_guest" class="logo">
			<img src="images/logo.jpg" alt="">
		</a>
		<ul id="navigation">
			<li class="selected">
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
	</div> 
		</ul>
	</div>
</header>
<body>
	
	<div id="body">
	
		<div id="featured">
			<img src="images/zumba2.jpg" height="550" alt="">
			<div>
				<h2>Join Our Club</h2>
				<span>Everybody and every body! </span>
				<span>Each Zumba® class is designed to bring people together to sweat it on.</span>
				<a href="form.html" class="more">Join Now</a>
			</div>
		</div>
		<ul>
			
		</ul>
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
