<?php

switch($vars['action']){

   
    case "studentlist":{
        $students = $db->query('SELECT * FROM student WHERE Supervisor_Id IN (SELECT Supervisor_Id FROM supervisor WHERE School_Id=?);', $_COOKIE["school_id"])->fetchAll();
        include("view/header.php");
        include("view/sidebar.php");
        include("view/student/list.php");
        include("view/footer.php");
        exit;
    }break;
    

    case "deletestudent":{
        $id = $_GET['id'];
        $db->query("DELETE FROM student WHERE Student_Id=(?)",$id);
        header("location: index.php?action=studentlist");   
        exit;        
    }break;
    
    case "updatestudent":{
        $id = $_GET['id'];
        $Query="SELECT * FROM student where Student_Id= $id";
               $res = $db->fetchArray;
               $Query2="SELECT * FROM supervisor where Supervisor_Id=$row[1];";
               $res2= mysqli_query($db,$Query2);
               $row2=mysqli_fetch_row($res2);
               include("view/header.php");
               include("view/sidebar.php");
               include("view/student/edit.php");
               include("view/footer.php");

        exit;
    }break;

   


    


    
}
