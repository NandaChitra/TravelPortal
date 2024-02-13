<!DOCTYPE html>
<!--   -->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sign Up</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <style>
            .signup { 
                width:300px;
                margin:auto;
                border:1px #CCC solid;
                padding:0px 30px;
                background-color: #af7c3a;
                color:#FFF;
            }
            .field { 
                background: white;
                border:1px #03306b solid;
                padding:10px;
                margin:5px 25px;
                width:215px;
                color:black;
            }
            #logintext{ 
                text-align: center;
                font-family: optima, sans-serif  ;
            }
            .btn {
                background-color: #00CCFF;
                border:1px #03306b solid;
                padding:10px 30px;
                font-weight:bold;
                margin:25px 25px;
            }
            #loginlink {
                text-align: center;
                font-family: optima, sans-serif;
                color: yellow;
            }
        </style>
    </head>
    <body>
        </br></br>
        <Div class="signup">
            <form id="login-form" method="post" action="signup_save.php" >
                <h2 id="logintext">Sign Up</h2>
                <input class="field" type="text" placeholder="User Name please"    name="signup_name"     id="name" value=""></input>
                <input class="field" type="text" placeholder="Mobile No."   name="signup_mobile" id="id" value=""></input>
                <input class="field" type="text" placeholder="Email"   name="signup_email" id="id" value=""></input>
                <input class="field" type="password" placeholder="Password" name="signup_pass"   id="pass" value=""></input>
                <input class="btn" type="submit" value="Sign Up" />
                <h4 id="loginlink"> Already have an account? <a href="login.php">Log In</a> </h4>
            </form>
        </div>
    </body>
</html>
