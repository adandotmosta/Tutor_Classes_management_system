<?php

include("init.php");
/*if (!(isset($_COOKIE['school_id']))) {
    header("location:index.php?action=login");
}*/
$public_actions=array('do_login','signup','do_signup','forgotpswrd','do_forgotpswrd','Reset','do_Reset');

//non-logged user are forced to the login page...
if ($appuser==0  and !in_array($vars['action'],$public_actions)){
	$vars['action']='login';
}elseif(is_array($appuser) and !isset($vars['action'])){
    $vars['action']='main';
}

include("modules/user.php");
//Modules to be accessed only by logged users...
if (is_array($appuser)){
	include("modules/main.php");
	include("modules/absence.php");
	include("modules/resources.php");
	include("modules/fees.php");





}
?>
