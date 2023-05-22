<?php 

include "connexion.php";

function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST["email"]) && isset($_POST["password"])) {
    $Supervisor_Mail = validate($_POST["email"]);
    $Password_User = validate($_POST["password"]);

    if (empty($Supervisor_Mail)) {
        header("Location: index.php?error=email is required");
        exit();
    } else if (empty($Password_User)) {
        header("Location: index.php?error=password is required");
        exit();
    } else {
        $hashed_password = md5($Password_User); 
        $sql = "SELECT * FROM supervisor WHERE Supervisor_Mail='$Supervisor_Mail' AND Password_User='$hashed_password' ;"; // removed password check
        $result = mysqli_query($db, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_row($result);
            $email = $row[4];
            session_start();
            $_SESSION['Supervisor_Id'] = $row[0];
            header("Location: StudentPages/children.php");
            
        } else {
            $sql = "SELECT * FROM supervisor WHERE Supervisor_Mail='$Supervisor_Mail' ;"; // removed password check
            $result = mysqli_query($db, $sql);
            if(mysqli_num_rows($result)===1){
                header("Location: index.php?error=Incorrect Email or Password");
            } else{
                
                header("Location: index.php?error=Incorrect Email or Password");

            }
            exit();
        }
    }
} else {
    header("Location: index.php?error");
    exit();
}