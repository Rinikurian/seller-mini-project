

<?php
include_once 'db.php';
session_start();
?>

<?php
if (isset($_POST['login'])) {
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    $dbcon = mysqli_connect("localhost", "root", "", "seller") or die("error in connection");
    $res = mysqli_query($dbcon, "select staffid,staffname,email,Password from staff where email='$uname' and password='$pass' ");
    $row = mysqli_fetch_array($res);

    if ($row) {

        $_SESSION["lgid"] = $row['staffid'];
        $_SESSION["name"] = $row['staffname'];

        header("location:staff_home.php");
    } else {
        ?>
        <script>
            alert("invalid user");
        </script>
        <?php
    }
}
?>



<head>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="icon" href="images/rrr.png" >
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Sign in to continue to Bootsnipp</h1>
            <div class="account-wall">
                <img class="profile-img" src="images/photo.jpg.png" 
                     alt="">
                <form class="form-signin" method="post" action="">
                    <input type="text" name="uname" id="uname" class="form-control" placeholder="Email" required autofocus>
                    <input type="password" name="pass" id="pass" class="form-control" placeholder="Password" required>
                    <input type="submit" class="btn btn-lg btn-primary btn-block" name="login" id="login" value="Log In">
                    <label class="checkbox pull-left">
                        <input type="checkbox" value="remember-me">
                        Remember me
                    </label>
                    <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
                </form>
            </div>
            <a href="bill_staff_registration.php" class="text-center new-account">Create an account </a>
        </div>
    </div>
</div>

