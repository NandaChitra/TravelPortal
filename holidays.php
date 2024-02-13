<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Holiday Bookings</title>
        <style type="text/css">
            * {
                margin: 0;
                padding: 0;
            }

            #wrapper {
                width: 980px;
                margin: 0 auto;
            }

            #header {
                background: darkgreen;
                color: white;
                height: 80px;
                font-size: 32pt;
                font-family: verdana;
                padding-top: 20px;
                text-align: center;
            }

            #column-left {
                width: 240px;
                float: left;
                font-family: Helvetica;
                font-size: 14pt;
                color:maroon;
            }

            #column-center {
                width: 470px;
                float: left;
                padding-right: 10px;
            }

            #column-right {
                width: 260px;
                float: left;
            }

            #column-booking {
                width: 980px;
                float: left;
                height: 100px;
                background-image: url("images/ocean3.jpg");
            }

            #blankdiv{
                width: 980px;
                margin: 0 auto;
                height: 100px;
            }

            #footer {
                background: darkgray;
                clear:both;
                height: 200px;
                text-align: center;
                font-family: Garamond;
                font-size: 10pt;
                padding-top: 50px;
            }
            hr{
                height: 10px;
                color: red;
                background-color: white;
                border: none;
            }
            .field {
                background: white;
                border:1px #03306b solid;
                padding:10px;
                margin:5px 25px;
                width:150px;
                color:black;
            }
            .fieldsmall {
                background: white;
                border:1px #03306b solid;
                padding:10px;
                margin:5px 25px;
                width:100px;
                color:black;
            }
            .btn {
                background-color: #00CCFF;
                border:1px #03306b solid;
                padding:10px 30px;
                font-weight:bold;
                margin:25px 25px;
            }
        </style>
    </head>

    <body>
        <?php
            $connection = new mysqli('localhost', 'root', 'admin', 'PHPprojects');
            if (!$connection){
              die("ERROR: Could not connect. " . mysqli_connect_error());
            }
            $query = "SELECT tname FROM Tour";
            $resultSet = $connection->query($query);
            $count = $resultSet->num_rows;
        ?>
        <div id="wrapper">
            <div id="header">
                Holiday Packages to every one!
            </div>
            <p> </p>
            <div style="background-color:#8bd4d6">
              <h2> <a href="Home.php">HOME</a> </h2>
            </div>
            <hr/>
            <form method="post" action="booking.php" >
                <div id="column-booking">
                    <select class="field"  name="Tours">
                        <option value="SelectTour"> Select Tour </option>
                        <?php
                            while ($rows = $resultSet->fetch_assoc()) {
                                $tour_name = $rows['tname'];
                                echo "<option value='$tour_name'> $tour_name </option>";
                            }
                        ?>
                    </select>

                    <input class="field" name="dep_date" type="text" placeholder="Dep. Date (dd-mm-yyyy)" >
                    <select class="field" name="dep_city">
                        <option  value="SelectCity"> Select Start City </option>
                        <option value="BLR"> Bangalore </option>
                        <option value="DEL"> New Delhi </option>
                        <option value="MUM"> Mumbai </option>
                        <option value="CHN"> Chennai </option>
                        <option value="KOL"> Kolkata </option>
                        <option value="PUN"> Pune </option>
                    </select>
                    <input class="fieldsmall" name="persons" type="text" placeholder="No. of Persons" >
                    <input class="btn" name="submit"  type="submit" value="Book" />
                </div>
            </form>
            <div id="column-left">
            </br>
                Top International and Domestic Holiday Destinations </br></br>
                Book Early!
            </div>
            <div id="column-center">
                <img width="470" height="200" src="images/sanfran.jpg" alt=""/>
                <hr></hr>
                <img width="470" height="200" src="images/varanasi.jpeg" alt=""/>
            </div>
            <div id="column-right">
                <img width="260" height="200" src="images/london2.jpg" alt=""/>
                <hr></hr>
                <img width="260" height="200" src="images/discount_1.jpg" alt=""/>
            </div>
            <div id="footer"> © Dr. S. Nandagopalan, Ph. D, Vemana Institute of Technology, 2019</div>
        </div>
    </body>
</html>
