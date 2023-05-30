<?php

switch($vars['action']){
    
    case "signup":{
        include("view/headerlog.php");
        include("view/user/signup.php");
        exit;
    }break;
    
    case "do_signup":{
         $ret=user_process_signup($vars);
         
         if ($ret['status']==1){
            header("location: index.php?action=login"); 
         }else{
            header("location: index.php?action=signup&error_message=".urlencode($ret['error']));
         }
         exit;
    }break;
    
    case "login":{
        include("view/headerlog.php");
        include("view/user/login.php");
        exit;
    }break;    

    case "do_login":{
        print_r($vars);
         $ret=user_process_login($vars);
        print_r($ret); 
         if ($ret['status']==1){
            header("location: index.php?action=main"); 
         }else{
            header("location: index.php?action=login&error_message=".urlencode($ret['error']));
         }
         exit;        
    }break; 

    case "forgotpswrd":{
      include("view/headerlog.php");
      include("view/user/forgotpswrd.php");
      exit;
  }break;

  case "do_forgotpswrd":{
      $ret = user_process_forgotpswrd($vars);

      if ($ret['status'] == 1) {
          header("location: index.php?action=login&success_message=".urlencode($ret['message']));
      } else {
          header("location: index.php?action=forgotpswrd&error_message=".urlencode($ret['error']));
      }
      exit;
  }break;   

  case "Reset":{
   include("view/headerlog.php");
   include("view/user/Reset.php");
   exit;
}break;

case "do_Reset":
    $ret = user_process_Reset($vars); 
   if ($ret['error'] == '') {
       // Password reset successful, redirect to login page
       header("Location: index.php?action=login&success_message=Password reset successful. Please log in with your new password.");
   } else {
       // Password reset failed, display error message on Reset page
       $vars['error_message'] = $ret['error'];
       include("view/headerlog.php");
       include("view/user/Reset.php");
       exit;
   }
   break;
    case "logout":{
      setcookie("school_id","",-1,"/");
      setcookie("schoolname","",-1,"/");
	  setcookie("app_email", "" , -1,"/");
	  setcookie("app_pass", "", -1,"/");
       $appuser=0;
       unset($vars);        
	    header("location: index.php"); 
	    exit;
    }break;    
    
}
?>