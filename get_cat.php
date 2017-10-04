<?php

include_once 'db.php';
if (isset($_POST['index'])) {
    $index = $_POST['index'];
    $q = mysqli_query($con, "SELECT categoryid,categoryname FROM category where categoryid='" . $index . "' and status=1");
    //var_dump($q);
    $str = "";
    while ($row = mysqli_fetch_array($q)) {
        $str .=$row['categoryid'] .":". $row['categoryname'] . ",";
    }
    echo rtrim($str,",");
  
}
