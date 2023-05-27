<?php

switch($vars['action']){

    case "subjectlist":{
        $subjects = $db->query('SELECT * FROM module WHERE School_Id=?', $_COOKIE["school_id"])->fetchAll();
        include("view/header.php");
        include("view/sidebar.php");
        include("view/subject/list.php");
        include("view/footer.php");
        exit;
    }break;
    case "deletesubject":{
        $db->query('DELETE FROM `module` WHERE Module_Id=?',$_GET['id']);
        header("location: index.php?action=subjectlist");   
        
        
        exit;
    }break;
    case "addsubject":{
        if(isset($_POST['submit'])){
            $subname=$_POST['subname'];
            $db->query("INSERT INTO module(Module_Name, School_Id)  VALUES ((?),(?));" ,   $subname ,$_COOKIE["school_id"]);
            header("location: index.php?action=subjectlist"); 
        
        }
        include("view/header.php");
        include("view/sidebar.php");
        include("view/subject/add.php");
        include("view/footer.php");
        exit;
    }
    case "updatesubject":{
            $id=$_GET['id'];
            $subjecttoupdate = $db->query("select * from module where Module_Id=(?);",$id)->fetchArray();
        if(isset($_POST['Submit'])){
            $subname=$_POST['subname'];
            $db->query("UPDATE module SET Module_Name = (?) where Module_Id = (?);" , $subname, $_GET['id']);
            header("location: index.php?action=subjectlist"); 
            
        }
        include("view/header.php");
        include("view/sidebar.php");
        include("view/subject/edit.php");
        include("view/footer.php");
        exit;
        
    }

   


    
}
