<?php
switch ($vars['action']) {
    case "absencelist":{ 
        if(isset($_POST["stat"]) && isset($_POST["id_s"]) && isset($_POST['id_c'])){
  
            $status = $_POST['stat'];
            $id_s = $_POST['id_s'];
            $id_c  = $_POST['id_c'];
            if($status=="true"){
                $db->query("UPDATE absence SET absent=TRUE WHERE Student_Id=(?) AND Session_Id=(?)", $id_s, $id_c);
            } else {
                $db->query("UPDATE absence SET absent=FALSE WHERE Student_Id=(?) AND Session_Id=(?)", $id_s, $id_c);
                
            }
        }
        $absences = $db->query("SELECT * FROM absence JOIN session_ ON absence.Session_Id = session_.Session_Id JOIN (SELECT Class_Id FROM class WHERE school_Id = (?)) c ON session_.Class_Id = c.Class_Id ORDER BY session_.Class_Id, session_.Session_Start ASC;", $_COOKIE["school_id"])->fetchAll();

            include("view/header.php");
            include("view/sidebar.php");
            include("view/absence/list.php");
            include("view/footer.php");
                exit;
        }break;

}


