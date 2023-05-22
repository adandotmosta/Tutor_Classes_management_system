<?php

switch($vars['action']){

    case "displayEvent":{
        session_start();
        $s_id = $_SESSION['Student_Id'];
        $fetch = mysqli_query($db,"SELECT DATE_FORMAT(Fees_Date, '%Y-%m-%d') AS formatted_date,Class_Id,Fees_Amount,Fees_Id FROM fees WHERE Student_Id=$s_id;");

        include("view/header.php");
        include("view/sidebar.php");
        include("view/event/event.php");
        include("view/footer.php");
        exit;
    }break;

}
?>