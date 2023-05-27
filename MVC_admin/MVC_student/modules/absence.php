<?php
switch ($vars['action']) {
    case "absence":{ 
        $id = $_COOKIE['student_id'];
        $stmt = $db->query("SELECT DATE_FORMAT(Session_Start, '%Y-%m-%d') AS formatted_date, absence.absent, Class_Id, Session_End FROM absence JOIN session_ ON absence.Session_Id=session_.Session_Id WHERE Student_Id=? AND Session_End<NOW()",$id);
        $result = $stmt->fetchAll();
        
            include("view/header.php");
            include("view/sidebar.php");
            include("view/js_absence.php");
            include("view/absence/list.php");
            include("view/footer.php");
                exit;
        }break;

}


