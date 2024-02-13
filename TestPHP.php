<!DOCTYPE html >
<html>
<head>
    <title>TRAVEL PORTAL LOG IN</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        #wrapper {
            background-image: url("images/wallpaper-2.jpg");
        }
    </style>
</head>

<body id="wrapper">
    <br/><br/></br></br>
    <div class="login">
        <form id="login-form" method="post" action="authen_login" >
            <h2 id="logintext">Log in</h2>
            <input class="field" id="inputtext" type="text" placeholder="User Name (E Mail)" name="user_id"></td>
            <input class="field" id="inputtext" type="password" placeholder="Password" name="user_pass"></input></td>
            <input class="btn" type="submit" value="Submit" />
        </form>
        <p id="paratext"> New users, Please Click <a href="signup.php"> here</a> to Sign Up</p>
    </div>
    <?php
        $name = 'S Nandagopalan';
        echo 'Hi, SN, VIT!'
    ?>

</body>
</html>
