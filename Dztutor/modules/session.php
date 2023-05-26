<?php

switch($vars['action']){

    
    case "listsession":{
        $class_id =$_GET['id'];
        $sessions =  $db->query('SELECT * FROM session_ Where Class_Id=? ',$_GET['id'])->fetchAll();
        

        include("view/header.php");
        include("view/sidebar.php");
        include("view/session/list.php");  
        include("view/footer.php"); 
        exit;
    }break;

    case "addsession":{
        $class_id = $_GET['id'];
        include("view/header.php");
        include("view/sidebar.php");
        include("view/session/add.php");  
        include("view/footer.php"); 
        exit;
    }break;

    case "doaddsession":{
        $class_id=$_GET['id'];
        if(isset($_POST['sub'])) {
            $dt2 = date("Y-m-d H:i:s");
            $s_date = date('Y-m-d H:i:s', strtotime($_POST['session_start']));
            $e_date = date('Y-m-d H:i:s', strtotime($_POST['session_end']));
            //$s_date = $_POST['session_start'];
            //$e_date = $_POST['session_end'];
            $db->query("INSERT INTO session_ VALUES(NULL, (?), (?), (?));", $s_date, $e_date, $class_id);
            $session_id = $db->lastInsertID();
            $db->query("UPDATE class SET Number_Of_Sections = Number_Of_Sections + 1 WHERE Class_Id = (?);", $class_id);
            // $db->query("INSERT INTO absence VALUES(?, ?, 0);", $class_id, $s_id);
            $students_in_class = $db->query("SELECT Student_Id FROM study WHERE Class_Id = (?);", $class_id)->fetchAll();
            $class_price = $db->query("SELECT Class_Price FROM class WHERE Class_Id = (?);", $class_id)->fetchArray();
            $cls_price = $class_price['Class_Price'];
            foreach ($students_in_class as $fetcher) {
                $s_id = $fetcher['Student_Id'];
                $db->query("INSERT INTO absence VALUES (?, ?, 0);", $s_id, $session_id);
                $db->query("UPDATE fees SET Fees_Amount = Fees_Amount + (?) WHERE Student_Id = (?);", $cls_price, $s_id);
            }
            header("location:index.php?action=listsession&id=$class_id"); 
        }
        

    }break;
    case "dodeletesession":{
        $id = $_GET['s_id'];
        $id_c = $_GET['id_c'];

        
    
        $db->query("DELETE FROM session_ WHERE Session_Id=(?)",$id);
$db->query("UPDATE class SET Number_Of_Sections = Number_Of_Sections - 1 WHERE Class_Id = (?);", $id_c);
$decrease_fees = $db->query("SELECT Student_Id FROM study WHERE Class_Id=?",$id_c)->fetchAll();
$class_infos = $db->query("SELECT * FROM class WHERE Class_Id = ?", $id_c);
$class_infos = $class_infos->fetchArray();
$fees_amount_per_session = $class_infos['Class_Price'];
for($i=0;$i<count($decrease_fees);$i++){
    $std_id = $decrease_fees[$i]['Student_Id'];
    $db->query("UPDATE fees SET Fees_Amount=Fees_Amount-$fees_amount_per_session WHERE Class_Id=$id_c AND Student_Id=$std_id");
}




        header("location:index.php?action=listsession&id=$id_c"); 
        exit;
    }break;
    case "updatesession":{
        $class_id = $_GET["id_c"];
        $session_id = $_GET["id"];
        $sessions = $db->query('SELECT * FROM session_ WHERE Session_Id=?', $session_id)->fetchArray();
        include("view/header.php");
        include("view/sidebar.php");
        include("view/session/edit.php");  
        include("view/footer.php"); 

        exit;
    }break;

    case "doupdatesession":{
        $session_id = $_GET['id'];
        $class_id  =$_GET["id_c"];
        $s_date = date('Y-m-d H:i:s',strtotime($_POST['session_start']));
        $e_date = date('Y-m-d H:i:s',strtotime($_POST['session_end']));
        //$s_date = $_POST['session_start'];
        //$e_date = $_POST['session_end'];

        $db->query('UPDATE session_ SET Session_Start = ?, Session_End = ? WHERE Session_Id = ?',$s_date,$e_date,$session_id);
        header("location: index.php?action=listsession&id=$class_id");   

        exit;
    }break;
    
}
