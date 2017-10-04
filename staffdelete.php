<?php

include_once 'db.php';
$b=$_SESSION['id'];
if(isset($_POST['edit']))
{
//$b=$_POST['drop'];
$a=$_POST['add'];
$res=mysqli_query($con,"UPDATE `product` SET `address`='$a' WHERE email='$b'");
}
if(isset($_POST['edit1']))
{
//$b=$_POST['drop'];
$a=$_POST['class1'];
$res=mysqli_query($con,"UPDATE `product` SET `state`='$a' WHERE email='$b'");
}
if(isset($_POST['edit2']))
{
//$b=$_POST['drop'];
$a=$_POST['classno'];
$res=mysqli_query($con,"UPDATE `product` SET `mobno`='$a' WHERE email='$b'");
}?>
<html>
<head>





<body>

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
</div>
</div>


</body>
</html>