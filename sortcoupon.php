
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="shortcut icon" href="../images/icon.png" type="image/jpeg" />
    <title>Dashboard</title>

    <style>
        nav{
            overflow-x:hidden !important;
        }

        table{
            overflow-x: visible !important;
        }
    </style>
</head>
<body>
 <!-- Navbar -->
 <nav class="navbar navbar-default" style="background:#008B8B;">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
                    aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#" style=" color:#000 !important">Dashboard</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="sponser.php" style=" color:#000 !important">Add Sponser</a>
                    </li>
                    <li>
                        <a href="register.php" style=" color:#000 !important">View Participant</a>
                    </li>
                    <li>
                        <a href="index.php" style=" color:#000 !important">Logout</a>
                    </li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <!-- End Of Navbar -->

<div class="container">
<?php
// //Server DB
// $con=mysqli_connect("localhost","cipherathon","info@fame") or die("unable to connect");
// mysqli_select_db($con,'Cipherathon');

//Local DB
$con=mysqli_connect("localhost","root","123456") or die("unable to connect");
mysqli_select_db($con,'hackathon');


if(isset($_GET['sortcoupon'])){
    $sortcoupon=$_GET['sortcoupon'];
    $sql="SELECT * FROM rsvp WHERE coupon_name='$sortcoupon'";
    $res=mysqli_query($con,$sql);
    if(mysqli_num_rows($res)>0){
        $num=mysqli_num_rows($res);
       echo " NUMBER OF PARTICIPENT REGISTERED WITH THIS COUPON_CODE=$num<br><br>";
       $_SESSION['num']=$num;
       echo "<div style='overflow-x:auto;'>";
       echo "<table class='table table-striped table-hover table-responsive table-bordered'>
                            <tr class='success'>
                                <th>Team Name</th>
                                <th>Describes</th>
                                <th>Member 1 - Name</th>
                                <th>Member 1 - Email</th>
                                <th>Member 1 - Contact</th>
                                <th>Member 2 - Name</th>
                                <th>Member 2 - Email</th>
                                <th>Member 2 - Contact</th>
                                <th>Member 3 - Name</th>
                                <th>Member 3 - Email</th>
                                <th>Member 3 - Contact</th>
                                <th>Member 4 - Name</th>
                                <th>Member 4 - Email</th>
                                <th>Member 4 - Contact</th>
                                <th>Coupon Code</th>
                            </tr>";
                            while($row=mysqli_fetch_assoc($res)){
                                echo " <tr >";

                            echo " <tr class='info'>";
                            echo  "<td>".$row['team_name']."</td>";
                            echo  "<td>".$row['describes']."</td>";
                            echo  "<td>".$row['m1_name']."</td>";
                            echo  "<td>".$row['m1_email']."</td>";
                            echo  "<td>".$row['m1_contact']."</td>";
                            echo  "<td>".$row['m2_name']."</td>";
                            echo  "<td>".$row['m2_email']."</td>";
                            echo  "<td>".$row['m2_contact']."</td>";
                            echo  "<td>".$row['m3_name']."</td>";
                            echo  "<td>".$row['m3_email']."</td>";
                            echo  "<td>".$row['m3_contact']."</td>";
                            echo  "<td>".$row['m4_name']."</td>";
                            echo  "<td>".$row['m4_email']."</td>";
                            echo  "<td>".$row['m4_contact']."</td>";
                            echo  "<td>".$row['coupon_name']."</td>";
                            echo "</tr>";
                            }
                            echo "</table>";
                            echo "</div>";

    }
    else{
        echo '<h4>No participant Registered with this Coupon Code</h4>';
    }
    }
    ?>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>
