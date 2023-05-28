<?php

function user_get_logged_user(){
    global $db,$appuser;
    
    $appuser=0;
    if (isset($_COOKIE['app_email']) and isset($_COOKIE['supervisor_id'])  and strlen($_COOKIE['app_email'])>0){		
		$items = $db->query("SELECT * FROM supervisor WHERE (Supervisor_Mail) = ? and Password_User= ?",$_COOKIE['app_email'], $_COOKIE['app_pass'])->fetchAll();
		if (count($items)>0){
			$appuser=$items[0];	
		}
	}
    return $appuser;
    
}
    
function user_process_login($vars){
    global $db;

	$ret['status']=0;
	$ret['error']='';
	
	$vars['email']=trim(($vars['email']));
	
    if (strlen($ret['error'])==0 and strlen($vars['email'])==0) {
        $ret['error']="You need to provide an email.";
        return $ret;
    }

    if (strlen($ret['error'])==0 and strlen($vars['pass'])==0) {
        $ret['error']="The password should be filled.";
        return $ret;
    }

    if (strlen($ret['error'])>0)return  $ret;
    
    //search for it in the database ?
	$items = $db->query("SELECT * FROM supervisor WHERE (Supervisor_Mail) = ? and Password_User= ?",$vars['email'], md5($vars['pass']))->fetchAll();
	if (count($items)==0){
	        $ret['error']=LANG_INCORRECT_EMAIL_PASSWORD;
	        return $ret;
	}
	//For the sake of simplicity, log the user directly by setting their cookies..
	setcookie("app_email", $vars['email'], time()+(3600*24),"/");
	setcookie("supervisor_id",$items[0]['Supervisor_Id'],time()+(3600*24),"/");
	//setcookie("schoolname",$items[0]['School_Name'],time()+(3600*24),"/");
	setcookie("app_pass", md5($vars['pass']), time()+(3600*24),"/");
	
	$ret['status']=1;
	$ret['error']='';
	return $ret;
}

include_once("../../SMTP/SMTP/class.phpmailer.php");
include_once("../../SMTP/SMTP/class.smtp.php");
function user_process_forgotpswrd($vars) {
    global $db;
    $ret['status'] = 0;
    $ret['error'] = '';
    $ret['message'] = '';

    // check if email is registered
    $vars['email'] = trim(strtolower($vars['email']));
	$items = $db->query("SELECT * FROM supervisor WHERE LOWER(Supervisor_Mail) = ?", $vars['email'])->fetchAll();
    if (count($items) == 0) {
        $ret['error'] = "This email is not registered.";
        return $ret;
    }
    
    // Generate a unique token for the user
    $token = bin2hex(random_bytes(32));
    
    // Insert the token into the database with an expiration time
    $db->query("INSERT INTO password_reset_tokens (email, token, expiration_time) VALUES (?, ?, ?)", $vars['email'], $token, time() + 3600);
    
    // Send the password reset email with a link to the password reset page
    $to = $vars['email'];
    $subject = "Password Reset";
	$resetLink = "http://localhost/Tutor_Classes_management_system-studentMVC-2023-05-26-MVC/Tutor_Classes_management_system-master/MVC_student/Tutor_Classes_management_system-MVC/index.php?action=Reset&secret=" . base64_encode($to) . "&token=" . $token."";
    $message = '<div style="background-color: #f2f2f2; padding: 20px;">
    <p style="font-size: 18px; font-weight: bold; margin-bottom: 10px;">Hello!</p>
    <p style="font-size: 16px; margin-bottom: 20px;">You are receiving this email because we received a password reset request for your account.</p>
    <button style="background-color: #4CAF50; border: none; color: white; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin-bottom: 20px; cursor: pointer;"><a style="color: white; text-decoration: none;" href="' . $resetLink . '">Reset Password</a></button>
    <p style="font-size: 16px;">If you did not request a password reset, no further action is required.</p>
  </div>';
    // Set up SMTP settings

	$mail = new PHPMailer;
	$mail->IsSMTP();
	$mail->SMTPAuth = true;                 
	$mail->SMTPSecure = "tls";      
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587; 
	$mail->Username = "dztutor9@gmail.com";   //Enter your username/emailid
	$mail->Password = "lbmtmpgxgtbdortn";   //Enter your password
	$mail->FromName = "DZ TUTOR";
	$mail->AddAddress($to);
	$mail->Subject = "Reset Password";
	$mail->isHTML( TRUE );
	$mail->Body =$message;
	$mail->SMTPDebug = SMTP::DEBUG_SERVER;
    // Set email content
    $mail->setFrom("dztutor9@gmail.com", "DZ TUTOR");
    // Send email
    if ($mail->send()) {
        $ret['status'] = 1;
        $ret['message'] = "An email has been sent to your email address with instructions to reset your password.";
    } else {
        $ret['error'] = "The email could not be sent.";
    }

    return $ret;
}

function user_process_Reset($vars) {
    global $db;
    $ret['status'] = 0;
    $ret['error'] = '';

    try {
        // Get the email and token from the URL
        if (isset($_GET['secret']) && isset($_GET['token'])) {
            $email = base64_decode($_GET['secret']);
            $token = $_GET['token'];
            // Rest of your code
        } else {
            $msg = "Missing or invalid parameters";
            throw new Exception($msg);
        }

        // Check if the email and token are valid
        $stmt = $db->query("SELECT * FROM password_reset_tokens WHERE email = ? AND token = ? AND expiration_time > ?", $email, $token, time());
        $item = $stmt->fetchAll();
        if (!$item) {
            // Invalid email or token
            $msg = "Invalid email or token or you exceeds the time!";
            throw new Exception($msg);
        }
        if (strlen($_POST['password']) < 8) {
            // Password is too short
            $msg = "Passwords should be at least 8 characters";
            throw new Exception($msg);
        }

        // Check if the passwords match
        if ($_POST['password'] != $_POST['confirm_password']) {
            // Passwords do not match
            $msg = "Passwords do not match.";
            throw new Exception($msg);
        }

        // Update the user's password
		$stmt = $db->query("UPDATE supervisor SET Password_User = MD5(?) WHERE LOWER(Supervisor_Mail) = ?", $_POST['password'], strtolower($email));


     /*   if ($stmt->affectedRows() != 1)
        {
            throw new Exception("Failed to update user's password.");
        }*/

        // Delete the password resettoken from the database
        $stmt = $db->query("DELETE FROM password_reset_tokens WHERE email = ?", $email);

    } catch (Exception $e) {
        // Handle exceptions
        $ret['error'] = $e->getMessage();
        include("view/headerlog.php");
        include("view/user/Reset.php");
        exit();
    }
}


?>
