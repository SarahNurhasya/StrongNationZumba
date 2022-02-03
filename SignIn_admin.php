<?php include('server_admin.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <title>Login Page</title>
    <style>
        html {
            background: #e3e3ff;
        }
        
        .body-content {
            padding-top: 10vh;
        }
        
        .container {
            width: 350px;
            height: 452px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: auto;
            border: 2px solid White;
            border-radius: 15px;
            background: #9932CC;
        }
        
        .logo {
            margin-top: 0px;
            padding-top: 0;
        }
        
        .logo img {
            width: 100px;
            border-radius: 50px;
        }
        
        h2 {
            color: white;
            font-family: Arial, Helvetica, sans-serif;
        }
        
        form {
            display: flex;
            flex-direction: column;
        }
        
        .form-item {
            margin: 5px;
            padding-bottom: 10px;
            display: flex;
        }
        
        .form-item label {
            display: block;
            padding: 2px;
            font-size: 20px;
            width: 100px;
        }
        
        .form-item input {
            width: 320px;
            height: 35px;
            border: 2px solid #e1dede69;
            border-radius: 20px;
            background: white;
            color: black;
            text-align: center;
        }
        
        .remember-box {
            margin: auto;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 15px;
            color: white;
        }
      
        
        .remember-box a {
            text-decoration: none;
            color: white;
            margin-left:30px;

        }
        .remember-box a:hover {
            color:grey;
        }
        
        .form-btns {
            display: flex;
            flex-direction: column;
            margin: auto;
            padding: 10px 0;
        }
        
        .form-btns button {
            margin: auto;
            font-size: 20px;
            padding: 5px 15px;
            border: 0;
            border-radius: 15px;
            color: rgb(75, 61, 61);
            background: #fbba50;
            width: 280px;
            cursor: pointer;
        }
        .form-btns button:hover {
            background: #d88a0c;
            color: antiquewhite;
        }
        
        .options {
            padding-top: 15px;
            margin: auto;
        }
        
        .options a {
            text-decoration: none;
            color: white;
            margin: 0 40px;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 15px;
        }
        .options a:hover {
            color:grey;
        }
        
        p {
            text-align: center;
            font-size: 12px;
            font-family: Arial, Helvetica, sans-serif;
            color: white;
        }
    </style>
</head>

<body>
    <div class="body-content">

        <div class="container">
            <div class="logo">
                <img src="images/logo.jpg " alt="Company Logo" srcset="" size="10%">
			<form method="post" action="SignIn_admin.php">

			<?php include('errors.php'); ?>
            </div>
            <h2>Login</h2>
		
			<select name="Member">
			<option value="1">Member</option>
			<option value="2">Admin</option>
			</select><br>
	
            <div class="login-form">
                <form action="">
                    <div class="form-item">
                        <!-- <label for="userName">Username:</label> -->
                        <input type="text" name="admin_email" id="userName" placeholder="Email">
                    </div>
                    <div class="form-item">
                        <!-- <label for="passWord">Password:</label> -->
                        <input type="password" name="admin_password" id="passWord" placeholder="Password">
                    </div>
                    <div class="remember-box">
                        <input type="checkbox" name="remember" id="remember">Remember Me
                        <a href="#">Forget Password?</a>

                    </div>
                    <div class="form-btns">

                        <button type="submit" class="btn" name="login_user">Login</button>
                        <div class="options">
                            <a href="signup_admin.php">Sign Up</a>
                        </div>


                    </div>
                </form>
            </div>
        </div>
    </div>

</form>

</body>

</html>