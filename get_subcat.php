<?php

include_once 'db.php';
if (isset($_POST['index'])) {
    $index = $_POST['index'];
    $q = mysqli_query($dbcon, "SELECT subcategoryid,subcategoryname FROM subcategory where categoryid='" . $index . "' and status=1");
    //var_dump($q);
    $str = "";
    while ($row = mysqli_fetch_array($q)) {
        $str .=$row['subcategoryid'] .":".$row['subcategoryname'] . ",";
    }
    echo rtrim($str,",");
}
?>