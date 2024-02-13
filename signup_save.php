<?php
         //connect to mySQL DB
        //$connection = mysqli_connect('localhost', 'root', 'admin');
        //if (!$connection){
        //    die("Database Connection Failed" . mysqli_error($connection));
        //}

        //$select_db = mysqli_select_db($connection, 'PHPprojects');
        //if (!$select_db){
        //    die("Database Selection Failed" . mysqli_error($connection));
        //}
        $connection = new mysqli("localhost", "root", "admin", "PHPprojects");
            // Assigning POST values to variables.
            $useremail  = $_POST['signup_email'];
            $username   = $_POST['signup_name'];
            $usermobile = $_POST['signup_mobile'];
            $password   = $_POST['signup_pass'];
  
            if ($username == '')
                echo ("<script LANGUAGE='JavaScript'>
                    window.alert('User name is blank');
                    window.location.href='signup.php';
                    </script>");
            elseif ($usermobile == '') 
                echo ("<script LANGUAGE='JavaScript'>
                    window.alert('Mobile No.is blank');
                    window.location.href='signup.php';
                    </script>");
            elseif ($useremail == '') 
                echo ("<script LANGUAGE='JavaScript'>
                    window.alert('Email is blank');
                    window.location.href='signup.php';
                    </script>");
            elseif ($password == '') 
                echo ("<script LANGUAGE='JavaScript'>
                    window.alert('Password can't be blank');
                    window.location.href='signup.php';
                    </script>");

            // Insert THE RECORD to TABLE
            $query = "INSERT INTO Customer VALUES ('$useremail','$username', '$usermobile', '$password')";
            $result = mysqli_query($connection, $query) ;
            // or die(mysqli_error($connection));
            //$connection->commit();

            if ($result == TRUE){
                echo ("<script LANGUAGE='JavaScript'>
                       window.alert('Congratulations, Successful Sign Up');
                       window.location.href='login.php';
                       </script>");
            }
            else {
             echo ("<script LANGUAGE='JavaScript'>
                    window.alert('Oops...! User Sign Up Failed');
                    window.location.href='login.php';
                    </script>");
            }
            
 ?>