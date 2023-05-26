<?php



function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function user_get_logged_user(){
	global $db, $appuser;

	session_start();
	
	$appuser = 0;
	if (isset($_SESSION['app_email']) && isset($_SESSION['Supervisor_FirstName']) && isset($_SESSION['Supervisor_Id']) && strlen($_SESSION['app_email']) > 0) {
		$items = $db->query("SELECT * FROM supervisor WHERE LOWER(Supervisor_Mail) = ? AND Password_User = ?", strtolower($_SESSION['app_email']), md5($_SESSION['app_pass']))->fetchAll();
		if (count($items) > 0) {
			$appuser = $items[0];
		}
	}
	
	return $appuser;



}
    


function user_process_login($email, $password) {
	// Input validation

$db = mysqli_connect('localhost', 'root', '', 'db_tutoring_classes');

	$Supervisor_Mail = validate($email);
	$Password_User = validate($password);

	if (empty($Supervisor_Mail)) {
		return "email is required";
	} else if (empty($Password_User)) {
		return "password is required";
	} else {
		$hashed_password = md5($Password_User);
		$sql = "SELECT * FROM supervisor WHERE Supervisor_Mail='$Supervisor_Mail' AND Password_User='$hashed_password';";
		$result = mysqli_query($db, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_row($result);
			$email = $row[4];
			session_start();
			$_SESSION['Supervisor_Id'] = $row[0];
			
			return "success";
		} else {
			$sql = "SELECT * FROM supervisor WHERE Supervisor_Mail='$Supervisor_Mail';";
			$result = mysqli_query($db, $sql);
			if (mysqli_num_rows($result) === 1) {
				return "Incorrect Email or Password";
			} else {
				return "Incorrect Email or Password";
			}
		}
	}
}


?>
 