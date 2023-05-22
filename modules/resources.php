<?php

switch($vars['action']){

    case "displayResources":{
        
        session_start();
    $user_id = $_SESSION['Student_Id'];
   
        $sql1 = "SELECT s.Class_Id  
         FROM study s
         WHERE s.Student_Id = '$user_id'";

        $sql2 = "SELECT r.Resource_Text, r.Class_Id, r.Resource_Link, r.Resource_DueTime
         FROM resources r 
         JOIN ($sql1) AS s ON r.Class_Id = s.Class_Id";



        $sql3 = "SELECT m.Module_Name, c.Class_Id
         FROM class c 
         JOIN module AS m ON c.Module_Id = m.Module_Id";

        $sql4 = "SELECT c.Module_Name, r.Resource_Text, r.Class_Id, r.Resource_Link, r.Resource_DueTime 
         FROM ($sql2) AS r
         JOIN ($sql3) AS c ON r.Class_Id = c.Class_Id
         ";

        $resources = mysqli_query($db, $sql4);
        include("view/header.php");
        include("view/sidebar.php");
        include("view/resources/displayResources.php");
        include("view/footer.php");
        exit;
    }break;

}
?>