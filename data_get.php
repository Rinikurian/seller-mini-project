<?php

require_once '../../../config/config.php';
include_once '../../../core/Database.php';
include_once '../../../core/hash.php';
include_once '../../../core/Session.php';
Session::init();
$db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);

$data = $db->select("select state_name from state where country_id=" . 1 . " and status=1");
if (isset($_POST['context'])) {

    switch ($_POST['context']) {
        case "contry": get_contry($db);
            break;
        case "state":get_state();
            break;
        case "login":login($db);
            break;
    }
} else {
    echo 'unauthorized access';
    die();
}

function get_contry($db) {

    $index = $_POST['index'];
    $data = $db->select("select state_id,state_name from state where country_id=" . $index . " and status=1");
    $str = "";
    foreach ($data as $value) {
        $str .= $value['state_id'] . ":" . $value['state_name'] . ',';
    }
    echo rtrim($str, ',');
    die();
}

function login($db) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password1 = Hash::create('sha256', $password, SHK); 
    $sql="select admin_id,username from admin where username='" .$username . "' and '"  . $password1 . "' and status=1 limit 1";
    $data = $db->select($sql);
  if($data[0]['username']==$username)
  {
      echo '1';
      session::set("admin_id",$data[0]['admin_id'] );
      die();
  }
  else
  {
      echo '0';
      die();
  }
    //var_dump($data);
  
}
