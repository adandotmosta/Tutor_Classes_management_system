<?php

switch($vars['action']){

    case "classlist":{
        $classes = $db->query('SELECT * FROM class AS class JOIN teacher ON class.Teacher_Id = teacher.Teacher_Id JOIN module ON class.Module_Id = module.Module_Id' )->fetchAll();
        
        include("view/header.php");
        include("view/sidebar.php");
        include("view/class/list.php");
        include("view/footer.php");
        exit;
    }break;


    case "deleteclass":{
        $db->query('DELETE FROM `class` WHERE Class_Id=?',$_GET['id']);
        header("location: index.php?action=classlist");   
        
        
        exit;
    }break;

   


    
}
