<?php
    session_start();
    //connect to mySQL DB
    $connection = new mysqli('localhost', 'root', 'admin', 'PHPprojects');
    if (!$connection){
      die("ERROR: Could not connect. " . mysqli_connect_error());
    }

        //if (isset($_POST['submit'])) {
        // Assigning POST values to variables.
        $tourname   = $_POST['Tours'];
        $traveldate = $_POST['dep_date'];
        $nopersons  = $_POST['persons'];
        $startcity  = $_POST['dep_city'];
        $userid     = $_SESSION["user"];
        if ($userid == ''){
             echo ("<script LANGUAGE='JavaScript'>
            window.alert('You have not logged in! Unable to book tickets!');
            window.location.href='login.php';
            </script>");
        }
        if ($tourname != '' && $traveldate != '' && $nopersons != '' && $startcity != ''){
            $gettid_query = "SELECT Tid FROM Tour WHERE '$tourname' = Tname";
            $result = $connection->query($gettid_query);
            $count = $result->num_rows;

            $tourid = $result->fetch_assoc();
            $tourid = $tourid['Tid'];

            $today   = date('Y-m-d');
            $bref    = hexdec(uniqid()); // generates unique id of decimal numbers
            $newDate = new DateTime($traveldate);
            $newDate = $newDate->format('Y-m-d'); // user dd-mm-yyyy is formatted as yyyy-mm-dd

            $query = "INSERT INTO Booking(Cid,Tid,Bookingdate,Depdate,no_persons) VALUES('$userid','$tourid','$today','$newDate', '$nopersons')";
            #$query = "INSERT INTO Booking VALUES(199,'sng','T10','2021-12-23','2021-12-25', '4')";
            $result2 = $connection->query($query);

            if ($result2 == TRUE){
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Successfully Booked');
                window.location.href='home.php';
                </script>");
            }
            else {
                 echo ("<script LANGUAGE='JavaScript'>
                window.alert('Unable to Book due to Technical issues/Bad Input');
                //window.location.href='home.php';
                </script>");
            }
    }
    else {
         echo ("<script LANGUAGE='JavaScript'>
            window.alert('One or more fields are blank - Tour/Date/No. of persons');
            window.location.href='holidays.php';
            </script>");

    }

?>
