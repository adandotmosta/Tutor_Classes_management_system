<?php
switch ($vars['action']) {
    case "absencelist":{
        $absences = $db->query("SELECT * FROM absence JOIN session_ ON absence.Session_Id = session_.Session_Id JOIN (SELECT Class_Id FROM class WHERE school_Id = (?)) c ON session_.Class_Id = c.Class_Id ORDER BY session_.Class_Id, session_.Session_Start ASC;", $_COOKIE["school_id"])->fetchAll();
        $absences2 = $db->query("SELECT CONCAT(Student_LastName,' ',Student_FirstName) AS Fullname FROM Student WHERE Student_Id=(?);", $absences[$i]['Student_Id'])->fetchAll();
        $absences3 = $db->query("SELECT Session_Start FROM session_ WHERE Session_Id= (?);", $absences[$i]['Session_Id'])->fetchAll();
        $absences4 = $db->query("SELECT class_name FROM class WHERE Class_Id = (?)", $absences[$i]['Class_Id'])->fetchAll();
            include("view/header.php");
            include("view/sidebar.php");
            include("view/absence/list.php");
            include("view/footer.php");
            exit;
        }
    case "addabsence":{
        
    }

}


