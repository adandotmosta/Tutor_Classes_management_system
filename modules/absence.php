<?php

switch($vars['action']){

    case "displayAbsence":{
        session_start();
        $s_id = $_SESSION['Student_Id'];
        $stmt = $db->prepare("SELECT DATE_FORMAT(Session_Start, '%Y-%m-%d') AS formatted_date, absence.absent, Class_Id, Session_End FROM absence JOIN session_ ON absence.Session_Id=session_.Session_Id WHERE Student_Id=? AND Session_End<NOW()");
        $stmt->bind_param("i", $s_id);
        $stmt->execute();
        $result = $stmt->get_result();
        include("view/header.php");
        include("view/sidebar.php");
        include("view/absence/absenceCalender.php");
        include("view/footer.php");
        exit;
    }break;

}
?>