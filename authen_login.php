<?php
    session_start();
    //connect to mySQL DB
    $connection = new mysqli('localhost', 'root', 'admin', 'PHPProjects');
    if (!$connection){
      die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    #echo "Database connectivity Successful\n";

    if (isset($_POST['user_id']) and isset($_POST['user_pass'])){
        // Assigning POST values to variables.
        $username = $_POST['user_id'];  // email
        $password = $_POST['user_pass'];

        // CHECK FOR THE RECORD in Customer TABLE
        $query = "SELECT * FROM `Customer` WHERE email ='$username' and Password ='$password'";
        $result = $connection->query($query);
        $count  = $result->num_rows;

        if ($count == 1){
            if ($username == 'admin'){
                echo ("<script LANGUAGE='JavaScript'>
                       window.location.href='adminpage.php';
                       </script>");
                $_SESSION["user"] = $username;  // save user name in session variable
            }
            else {
                echo ("<script LANGUAGE='JavaScript'>
                       window.location.href='home.php';
                       </script>");
                $_SESSION["user"] = $username;  // save user name in session variable
            }
        }
        else {
         echo ("<script LANGUAGE='JavaScript'>
                window.alert('Invalid Login Credentials');
                window.location.href='login.php';
                </script>");
        }
   }
?>
