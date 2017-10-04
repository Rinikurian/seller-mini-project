<?php
include_once 'db.php';
session_start();
?>


<?php
if (isset($_POST['signup'])) {
    $staff_name = $_POST['staff_name'];
  
    $mob_number = $_POST['mob_number'];
    
  
    $email = $_POST['email'];
    $password1 = $_POST['password1'];
    $password = $_POST['password'];
    $address = $_POST['address'];

    if ($password1 == $password) {
        $sql = "INSERT INTO `staff`(`staff_name`,  `mob_number`, `email`, `password`,`address`, `status`) VALUES ('$staff_name','$mob_number','$email','$password1''$address',1)";

        
        $sql1="INSERT INTO `staff`(`staffname`, `mobile`, `email`, `Password`, `address`, `status`) VALUES ('$staff_name','$mob_number','$email','$password1','$address',1)";
        
        $res = mysqli_query($dbcon, $sql1)or die(mysqli_error($dbcon));


        $p = "select max(staffid) as lgid from staff";

        $q = mysqli_query($dbcon, $p) or die(mysqli_error($dbcon));
        $row = mysqli_fetch_array($q);
        $x = $row['lgid'];




        echo '<script> alert("Registration Successful Please Login")</script>';
    } else {

        echo '<script language="javascript">';
        echo 'alert("Your password does not match")';
        echo '</script>';
    }
}
?>





<head>
    <title>Staff Registration</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="icon" href="images/rrr.png" type="icon">
</head>

<script src="js/validation.js"></script>



<form name="form1" class="form-horizontal" method="post" action="" onsubmit="return ValidationEvent()">
    <fieldset>

        <!-- Form Name -->
       <div class="jumbotron">
        <h2>
            <center> Staff Registration</center>
        </h2>
    </div>
        <br>
        <br>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="name">Staff Name</label>  
            <div class="col-md-4">
                <input id="staff_name" name="staff_name" type="text" placeholder="Enter your name" class="form-control input-md" required="">

            </div>
        </div>

     

      


        <div class="form-group">
            <label class="col-md-4 control-label" for="name"> Mobile Number</label>  
            <div class="col-md-4">
                <input id="mob_number" name="mob_number" onblur="mob_num()" type="varchar" placeholder="Enter mobile number" class="form-control input-md" required="">

            </div>
        </div>
       

<div class="form-group">
            <label class="col-md-4 control-label" for="street"> Address</label>  
            <div class="col-md-4">
                <input id="local_address" name="address" type="text" placeholder="Enter your local address" class="form-control input-md" required="">

            </div>
        </div>
        


        <div class="form-group">
            <label class="col-md-4 control-label" for="street">Email</label>  
            <div class="col-md-4">
                <input id="driver_state" name="email" type="email" placeholder="Enter your email" class="form-control input-md" required="">

            </div>
        </div>


         



        <!-- Password input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="password">Password</label>
            <div class="col-md-4">
                <input id="password" name="password" type="password" placeholder="Enter a password" class="form-control input-md" required="">

            </div>
        </div>


        <div class="form-group">
            <label class="col-md-4 control-label" for="password">ConfirmPassword</label>
            <div class="col-md-4">
                <input id="password1" name="password1" type="password" placeholder="Confirm password" class="form-control input-md" required="">

            </div>
        </div>
        


        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="signup"></label>
            <div class="col-md-4">

                <input type="submit" name="signup" value="Sign Up" id="signup" class="btn btn-success">
                <button class="btn btn-primary" onclick="location.href = 'login.php';" style="float: right;">LOGIN</button><br><br>
                  <button class="btn btn-primary" id="btn_Product_reg" onclick="location.href = 'start.php';" style="float: right;">Back</button>
            </div>
        </div>

    </fieldset>
</form>
