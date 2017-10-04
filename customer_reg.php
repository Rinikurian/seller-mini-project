<?php
include_once 'db.php';
session_start();
?>


<?php
if (isset($_POST['signup'])) {
     $customername = $_POST['customername'];
  
    $mob_number = $_POST['mob_number'];
    
  
    $email = $_POST['email'];
    
    $address = $_POST['address'];

    // if ($password1 == $password) {
    //$sql = "INSERT INTO `staff`(`staff_name`,  `mob_number`, `email`, `password`,`address`, `status`) VALUES ('$staff_name','$mob_number','$email','$password1''$address',1)";


     $sql1="INSERT INTO `costumer`(`customername`, `mobile`, `email`,`address`, `status`) VALUES ('$customername','$mob_number','$email','$address',1)";

    $res = mysqli_query($dbcon, $sql1)or die(mysqli_error($dbcon));


    //$p = "select max(productid) as lgid from product";

    //$q = mysqli_query($dbcon, $p) or die(mysqli_error($dbcon));
    //$row = mysqli_fetch_array($q);
    //$x = $row['lgid'];




    echo '<script> alert("Registration Successful  ")</script>';
//    } else {
//
//        echo '<script language="javascript">';
//        echo 'alert("Your password does not match")';
//        echo '</script>';
//    }
}
?>

<head>
    <title>Customer Registration</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="icon" href="images/rrr.png" type="icon">
</head>

<script src="js/validation.js"></script>



<form name="form1" class="form-horizontal" method="post" action="" onsubmit="return ValidationEvent()">
    <fieldset>

        <!-- Form Name -->
       <div class="jumbotron">
        <h2>
            <center> Customer Registration</center>
        </h2>
    </div>
        <br>
        <br>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="name">Customer Name</label>  
            <div class="col-md-4">
                <input id="staff_name" name="customername" type="text" placeholder="Enter  name" class="form-control input-md" required="">

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

                
        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="signup"></label>
            <div class="col-md-4">

                <input type="submit" name="signup" value="Sign Up" id="signup" class="btn btn-success">
                <button class="btn btn-primary" id="" onclick="location.href = 'staff_home.php';" style="float: right;">Back</button>
               
            </div>
        </div>

    </fieldset>
</form>
<script>
    $('body').on('click', '#btn_Product_reg', function () {
        $.ajax({
            type: 'post',
            url: 'data_save.php',
            data: {context: 'save_product'},
            success: function (response)
            {
                alert(response);
            }});
    });
    $('body').on('change', '#category_select', function () {
        $index = $('#category_select').val();
        

        $.ajax({
            type: 'post',
            url: 'get_subcat.php',
            data: {index: $index},
            success: function (response)
            {



                console.log(response);
                res = response.trim()
                 $str = "";
                if (res != "")
                {
                    $ar = response.split(",");
                   

                    for (var i = 0; i < $ar.length; i++)
                    {
                        $ss = $ar[i].split(':');
                        $str += '<option value=' + $ss[0] + '>' + $ss[1] + "</option>";
                    }
                   
                }
                 $('#subcategory_select').html($str);
            }
        });
    });

 $('body').on('change', '#subcategory_select', function () {
        $index = $('#subcategory_select').val();
         $index_id = $('#subcategory_select option selected').val();
        $('#subcategory_select option:selected').val();

        $.ajax({
            type: 'post',
//            url: 'get_subcat.php',
            data: {index: $index},
            success: function (response)
            {



                console.log(response);
                res = response.trim()
                 $str = "";
                if (res != "")
                {
                    $ar = response.split(",");
                   

                    for (var i = 0; i < $ar.length; i++)
                    {
                        $ss = $ar[i].split(':');
                        $str += '<option value=' + $ss[0] + '>' + $ss[1] + "</option>";
                    }
                   
                }
//                 $('#subcategory_select').html($str);
            }
        });
    });


//        $(document).ready(function(){  
//        $("form#register").submit(function() {
//        // we want to store the values from the form input box, then send via ajax below  
//        var productname = $('#productname').val();  
//        var description = $('#description').val();
//        //var user_pass= $('#user_pass').val();
//        //$user_name = $('#user_name').val();
//        //$user_email = $('#user_email').val();
//        //$password = $('#password').val();
//        alert(productname);
//            $.ajax({  
//                type: "POST",  
//                url: "ajax.php",  
//                data: "produtname="+ productname +"&description="+ description ,  
//                success: function(){  
//                    $('form#register').hide(function(){$('div.success').fadeIn();});  
//                }  
//            });
//            //alert("ji");
//        return false;  
//        });  
//});


</script>
