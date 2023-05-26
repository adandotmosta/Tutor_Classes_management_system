<?php

switch($vars['action']){

    case "login":{
        include("view/user/log.php");
        exit;
    }break;

    case "do_login":{
        
       
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = user_process_login($email, $password);

    if ($result === "success") {
        $vars['action']='children';
        header("Location: modules/children.php?action=children");
        exit();
    } else {
        header("Location: index.php?error=$result");
        exit();
    }
} else {
    header("Location: index.php?error");
    exit();
}
         exit;        
    }break;


}
?>