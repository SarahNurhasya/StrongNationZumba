<?php include ('server.php')?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>

    <style>
         ::placeholder {
            color: black;
            opacity: 1;
        }
        
      	h2, h5{
			text-align: center;
		}
		.logo {
            margin-top: 0px;
            padding-top: 0;
        }
        
        .logo img {
            width: 100px;
            border-radius: 50px;
        }
        
        html {
            background: #e3e3ff;
            color: black;
            font-family: Arial, Helvetica, sans-serif;
        }
        
        body {
            padding-top: 10vh;
        }
        
        .container {
            background: #8787c5;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: auto;
            height: 550px;
            width: 350px;
            box-shadow: -3px -2px 6px #6c6565, 7px 9px 25px #0b0b0b;
        }
        
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        input {
            height: 30px;
            border: 2px solid #e1dede69;
            border-radius: 5px;
            background: #white;
            color: black;
            text-align: center;
            outline: none;
            font-size: 15px;
        }
        
        .form-item-username {
            margin: 5px;
            display: flex;
            padding-bottom: 10px;
        }
        
        .form-item-username input {
            width: 150px;
            margin: 0 5px;
        }
        
        .form-item {
            margin: 0 auto;
            padding-bottom: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 90%;
        }
        
        .form-item input {
            margin: 5px;
            width: 100%;
        }
        
        .accept-box {
            display: flex;
            align-items: center;
            margin: auto;
            font-size: 15px;
        }
        
        a {
            color: white;
        }
        
        a:hover {
            color: grey
        }
        
        .form-btns {
            display: flex;
            flex-direction: column;
            padding: 10px 0;
        }
        
        .form-btns button {
            margin: auto;
            font-size: 20px;
            padding: 8px;
            width: 280px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: rgb(75, 61, 61);
            background: #fbba50;
        }
        
        .form-btns button:disabled {
            cursor: not-allowed;
            background: #8f8b85;
            color: rgb(131, 120, 120);
        }
        
        .form-btns button:hover {
            background: #d88a0c;
            color: antiquewhite;
        }
        
        .options {
            padding-top: 15px;
            margin: auto;
            font-size: 13px;
        }
        
        p {
            font-size: 12px;
        }
        
        .pwd-format {
            position: relative;
            color: rgb(65, 62, 62);
            background: rgb(243, 234, 243);
            font-size: 11px;
            width: 150px;
            padding: 5px;
            border-radius: 5px;
            top: 112px;
            right: -81px;
            z-index: 2;
            display: none;
        }
    </style>

</head>

<body>
<h2>WELCOME TO STRONG NATION ZUMBA</h2>
<h5>Please fill in this form to create an account!</h5>
    <div class="container">
        <br>
		<div class="logo">
                <img src="images/logo.jpg " alt="Company Logo" srcset="" size="10%">
        
		<form method="post" action="signup.php">

		<?php include('errors.php'); ?>    
			
			</div>
		<h2>Sign Up</h2>

        <form action="">
            <div class="form-item-username">
                <input type="text" name="member_username" id="member_username" placeholder="Username">
            </div>

            <div class="form-item">
                <input type="email" name="member_email" id="member_email" placeholder="Email">
            </div>

            <div class="form-item">

                <span class="pwd-format">
                    8-15 AlphaNumeric Characters
                </span>
                <input type="password" name="member_password_1" id="password" placeholder="Enter password">
                <input type="password" name="member_password_2" id="confirmPassword" placeholder="Confirm password">
            </div>

            <div class="accept-box">
                <input type="checkbox" name="accept" id="accept">
                <p>I accept the <a href="#">Terms & Privacy Policy</a></p>
            </div>

            <div class="form-btns">
                <button class="signup" type="submit" name="reg_user">Sign Up</button>
                <div class="options">
                    Already have an account? <a href="SignIn.php">Login here</a>
                </div>
            </div>

        </form>
        <p>2023 by Zumba. All rights reserved.</p>
    </div>

    <script>
        const signup = document.querySelector(".signup");
        const termCond = document.querySelector("#accept");
        const member_password_1 = document.querySelector("#member_password_1");
        const member_password_2 = document.querySelector("#member_password_2");
        const pwd_format = document.querySelector(".pwd-format");

        const passwordPattern = /^[a-zA-Z0-9]{8,15}$/

        password.addEventListener('focusin', () => {
            pwd_format.style.display = 'block';

            password.addEventListener('keyup', () => {
                if (passwordPattern.test(password.value)) {
                    password.style.borderColor = 'green' 
                    pwd_format.style.color = 'green'
                } else {
                    password.style.borderColor = 'red'
                    pwd_format.style.color = 'red'
                }
            })
        })

        password.addEventListener('focusout', () => {
            pwd_format.style.display = 'none';
        })

        confirmPassword.addEventListener('focusin', () => {
            pwd_format.style.display = 'block';
            confirmPassword.addEventListener('keyup', () => {
                if (passwordPattern.test(confirmPassword.value) && password.value === confirmPassword.value) {
                    confirmPassword.style.borderColor = 'green' 
                    pwd_format.style.color = 'green'
                } else {
                    confirmPassword.style.borderColor = 'red'
                    pwd_format.style.color = 'red'
                }
            })
        })

        confirmPassword.addEventListener('focusout', () => {
            pwd_format.style.display = 'none';
        })

        termCond.addEventListener('change', () => {
            if (termCond.checked === true) {
                signup.disabled = false;
            } else if (termCond.checked === false) {
                signup.disabled = true;
            }
        })
    </script>

</form>

</body>

</html>