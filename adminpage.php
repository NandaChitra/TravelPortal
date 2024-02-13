<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>ADMIN PAGE</title>
        <style type="text/css">
            body {
                margin: 0px 0px 0px 50px;
            }
            .topnav{
                overflow: hidden;
                /* background-color: lightgray;*/
            }
            .topnav a {
                float: left;
                color: darkgray;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
                font-size: 18px;
                font-family: Noto Sans,sans-serif;
            }
            .topnav a:hover {
                background-color: red;
                color: black;
            }
            table {
                border-collapse: collapse;
                font-family: Noto Sans,sans-serif;
                font-size: 16px;
            }
            tr:nth-child(even) {background-color: lightgreen;}
            h3 {
                color: red;
                font-family: Noto Sans,sans-serif;
            }
            div {
                margin-left: "100px";
            }
        </style>
    </head>

    <body>
        <img width="200" height="80" src="images/flight.jpg" alt=""/>
        <div class="topnav">
            <hr>
            <a class="active" href="home.php">Home</a>
            <a href="#">International Packages</a>
            <a href="#">Domestic Packages</a>
            <a href="#">Customers</a>
            <a href="#Booking">Bookings</a>
        </div>
        <hr>    
        <div>
        <h3>List of Bookings</h3>
        <?php
            $connection = new mysqli('localhost', 'root', 'admin', 'PHPprojects');
            $query = "SELECT B.cid,B.Tid,C.cname as cn, B.BookingDate, B.DepDate FROM Booking B, Customer C Where B.cid = C.email";
            $resultSet = $connection->query($query);
            $count = $resultSet->num_rows;
        ?>

        <table border="2">
            <thead style="background-color:black;color:white;">
                <tr>
                    <th>Customer ID</th>
                    <th>Customer Name</th>
                    <th>Tour ID</th>
                    <th>Booking Date</th>
                    <th>Date of Departure</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($rows = $resultSet->fetch_assoc()) {
                        $cust_id   = $rows['cid'];
                        $cust_name = $rows['cn'];
                        $tour_id   = $rows['Tid'];
                        $book_date = $rows['BookingDate'];
                        $dep_date  = $rows['DepDate'];
                        echo "<tr>  <td>$cust_id</td>
                                    <td>$cust_name</td>
                                    <td>$tour_id</td>
                                    <td>$book_date</td>
                                    <td>$dep_date</td>
                              </tr>";
                    }
                ?>
            </tbody>
        </table>

        <h3>Current Month Bookings</h3>
        <?php
            $connection = new mysqli('localhost', 'root', 'admin', 'PHPprojects');
            $query = "SELECT B.cid as custid,B.Tid,C.cname as cn,B.BookingDate,B.DepDate FROM Booking B, Customer C Where B.cid = C.email and month(curdate()) = month(BookingDate)";
            $resultSet = $connection->query($query);
            $count = $resultSet->num_rows;
        ?>

        <table border="2">
            <thead style="background-color:black;color:white;">
                <tr>
                    <th>Customer ID</th>
                    <th>Customer Name</th>
                    <th>Tour ID</th>
                    <th>Booking Date</th>
                    <th>Date of Departure</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($rows = $resultSet->fetch_assoc()) {
                        $cust_id   = $rows['custid'];
                        $cust_name = $rows['cn'];
                        $tour_id   = $rows['Tid'];
                        $book_date = $rows['BookingDate'];
                        $dep_date  = $rows['DepDate'];
                        echo "<tr>  <td>$cust_id</td>
                                    <td>$cust_name</td>
                                    <td>$tour_id</td>
                                    <td>$book_date</td>
                                    <td>$dep_date</td>
                              </tr>";
                    }
                ?>
            </tbody>
        </table>

        <h3> All Customers </h3>
        <?php
            $connection= new mysqli('localhost', 'root', 'admin', 'PHPprojects');
            $query = "SELECT email, cname, phone FROM Customer";
            $resultSet = $connection->query($query);
            $count = $resultSet->num_rows;
        ?>

        <table border="2">
            <thead style="background-color:Black;color:white;">
                <tr>
                    <th>Customer ID</th>
                    <th>Customer Name</th>
                    <th>Phone</th>

                </tr>
            </thead>
            <tbody>
                <?php
                    while ($rows = $resultSet->fetch_assoc()) {
                        $cust_id    = $rows['email'];
                        $cust_name  = $rows['cname'];
                        $cust_phone = $rows['phone'];
                       
                        echo "<tr>  <td>$cust_id</td>
                                    <td>$cust_name</td>
                                    <td>$cust_phone</td>

                              </tr>";
                    }
                ?>
            </tbody>
        </table>

        <h3> All Tours </h3>
        <?php
            $connection = new mysqli('localhost', 'root', 'admin', 'PHPprojects');
            $query = "SELECT Tid, TName FROM Tour";
            $resultSet = $connection->query($query);
            #$count = $resultSet->num_rows;
        ?>
        <table border="2">
            <thead style="background-color:black;color:white;">
                <tr>
                    <th>Tour Id</th>
                    <th>Tour Name</th>

                </tr>
            </thead>
            <tbody>
                <?php
                    while ($rows = $resultSet->fetch_assoc()) {
                        $tour_id   = $rows['Tid'];
                        $tour_name = $rows['TName'];
                /*        $tour_start= $rows['cityfrom'];
                        $tour_end  = $rows['cityto'];
                        $tour_days = $rows['NoOfdays'];
                        $tour_price = $rows['price']; */
                        echo "<tr>  <td>$tour_id</td>
                                    <td>$tour_name</td>

                              </tr>";
                    }
                ?>
            </tbody>
        </table>

        <h3> Customers not made any Booking </h3>
        <?php
            $connection = new mysqli('localhost', 'root', 'admin', 'PHPprojects');
            $query = "SELECT cname,email,phone FROM customer where email not in (select cid from booking)";
            $resultSet = $connection->query($query);
            $count = $resultSet->num_rows;
        ?>
        <table border="2">
            <thead style="background-color:black;color:white;">
                <tr>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($rows = $resultSet->fetch_assoc()) {
                        $cname  = $rows['cname'];
                        $cemail = $rows['email'];
                        $cphone = $rows['phone'];
                        echo "<tr>  <td>$cname</td>
                                    <td>$cemail</td>
                                    <td>$cphone</td>
                              </tr>";
                    }
                ?>
            </tbody>
        </table>
       </div>
       <p> ---------------------------End of report------------------------------------------------</p>
    </body>
</html>
