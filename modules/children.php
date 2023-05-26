<?php


switch($vars['action']) {
        case "children": {
            include('view/header.php');
            include("view/sidebar.php");
            include("view/children/choiceChildren.php?action=choiceChildren");
            include("view/footer.php");
            exit;
        } break;
        case "choiceChildren": {
            session_start();

            $supervisorId = $_SESSION['Supervisor_Id'];
            $sql = "SELECT  s.Student_Id, s.Student_LastName, s.Student_FirstName, s.Student_Mail, s.Student_Birthday, s.Student_Phone_number, s.Student_address 
                    FROM student s 
                    JOIN supervisor st ON s.Supervisor_Id = st.Supervisor_Id 
                    WHERE s.Supervisor_Id = '$supervisorId' ";
            $result=mysqli_query($db,$sql);

            exit;
        } break;
}


?>