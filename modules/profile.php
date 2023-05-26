<?php

switch($vars['action']){

    case "showProfile":{
        
        session_start();

        $StdID=$_SESSION['Student_Id'];
        $StdID=3;

        $sql="SELECT image,Student_Id,Student_LastName,Student_Mail,Student_FirstName,Student_Birthday,Student_Phone_number,Student_address FROM student WHERE Student_Id = $StdID";
        $result = mysqli_query($db,$sql);
        $info=$result->fetch_assoc();
        $fullname=  $info["Student_FirstName"]." ".$info["Student_LastName"];

        include("view/header.php");
        include("view/sidebar.php");
        include("view/profile/showProfile.php");
        include("view/footer.php");
        exit;
    }break;

}

?>