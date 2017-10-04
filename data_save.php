<?php
require_once '../../../config/config.php';
include_once '../../../core/Database.php';
include_once '../../../core/HASH.php';
include_once '../../../core/Session.php';
session::init();
echo 'we';
$db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
if (isset($_POST['context'])) {
     switch ($_POST['context']) {
        case "contry": save_district();            break;       
        case "log_reg":save_reg($db);            break;
        case "logout":logout();            break;
    }
}
echo 'saved';
function save_reg($db)
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    $password1=Hash::create('sha256', $password,SHK);
    $sql="insert into admin  values (NULL,'".$username ."','". $password1. "',1)";
    echo $sql;
    $db->exec($sql);
}
function logout()
{
    session::delete('admin_id');
}
