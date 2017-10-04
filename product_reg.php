<?php
include_once 'db.php';
session_start();
?>


<?php
if (isset($_POST['signup'])) {
    $productname = $_POST['productname'];
    $m="photo/".time()."".htmlspecialchars($_FILES['photo']['name']);
             move_uploaded_file($_FILES['photo']['tmp_name'], $m);
  $subcategoryid = $_POST['subcategory_select'];
  $description = $_POST['description'];

    //if ($password1 == $password) {
    //$sql = "INSERT INTO `staff`(`staff_name`,  `mob_number`, `email`, `password`,`address`, `status`) VALUES ('$staff_name','$mob_number','$email','$password1''$address',1)";


    $sql1 = "INSERT INTO `product`(`productname`, `productimage`,`subcategoryid`,`description`,`status`) VALUES ('$productname','$m','$subcategoryid','$description',1)";

    $res = mysqli_query($dbcon, $sql1)or die(mysqli_error($dbcon));


    $p = "select max(productid) as lgid from product";

    $q = mysqli_query($dbcon, $p) or die(mysqli_error($dbcon));
    $row = mysqli_fetch_array($q);
    $x = $row['lgid'];




    echo '<script> alert("Registration Successful ")</script>';    
    
} else {

       echo '<script language="javascript">';
       //echo 'alert("Your password does not match")';
        echo '</script>';
    }

?>

<head>
    <title>Product Registration</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="icon" href="images/rrr.png" type="icon">
    <script src="js/jquery-3.2.1.min.js"></script>
</head>

<script src="js/validation.js"></script>



<form name="form1" class="form-horizontal" enctype="multipart/form-data" method="post" action="" onsubmit="return ValidationEvent()">
    <fieldset>

        <!-- Form Name -->
        <div class="jumbotron">
            <h2>
                <center> Product Registration</center>
            </h2>
        </div>
        <br>
        <br>
        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="name">Product Name</label>  
            <div class="col-md-4">
                <input id="productname" name="productname" type="text" placeholder="Enter product name" class="form-control input-md" required="">

            </div>
        </div>



        <div class="form-group">
            <label class="col-md-4 control-label" for="street"> Category</label>  
            <div class="col-md-4">

                <select class="form-control" id="category_select" name="category_select">
                    <option value="-1">select</option>
                    <?php
                    $q = mysqli_query($dbcon, "SELECT categoryid,categoryname FROM category where status=1");
                    //var_dump($q);

                    while ($row = mysqli_fetch_array($q)) {
                        echo '<option value=' . $row['categoryid'] . '>' . $row['categoryname'] . '</option>';
                    }
                    ?></select>

            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="street">Subcategory</label>  
            <div class="col-md-4">
                <select class="form-control" id="subcategory_select" name="subcategory_select">
                    <option value="-1">select</option>
                </select>

            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="name"> Product Image</label>  
            <div class="col-md-4">
                <input  type="file"  name="photo" id="photo" class="form-control input-md" required="">

            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="name">Description</label>  
            <div class="col-md-4">
               <textarea class="form-group" id="description" name="description">

                              </textarea>

            
            </div>
        </div>



        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="signup"></label>
            <div class="col-md-4">

                <input type="submit" name="signup" value="Sign Up" id="signup" class="btn btn-success">
                <button class="btn btn-primary" id="btn_Product_reg" onclick="location.href = 'staff_home.php';" style="float: right;">Back</button>
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
