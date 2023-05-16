<?php

switch($vars['action']){

    case "listteacher":{
        $teachers = $db->query('SELECT * FROM teacher WHERE School_Id =?',$_COOKIE['school_id'])->fetchAll();
        include("view/header.php");
        include("view/sidebar.php");
        include("view/teacher/list.php");
        include("view/footer.php");
        exit;
    }break;

    case "updateteacher":{

        $teachertoedit = $db->query('SELECT * FROM teacher WHERE Teacher_Id = $_GET["id"]')->fetchAll();
        include("view/header.php");
        include("view/sidebar.php");
        include("view/teacher/list.php");
        include("view/footer.php");
        exit;
    }break;

    case "deleteteacher":{
        $db->query('DELETE FROM `teacher` WHERE Teacher_Id=?',$_GET['id']);
        header("location: index.php?action=listteacher");   
        
        exit;
    }break;


    
}
