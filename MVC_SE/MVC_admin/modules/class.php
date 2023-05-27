<?php

switch($vars['action']){

    case "classlist":{
        $classes = $db->query('SELECT * FROM class AS class JOIN teacher ON class.Teacher_Id = teacher.Teacher_Id JOIN module ON class.Module_Id = module.Module_Id  WHERE class.School_Id=?', $_COOKIE["school_id"] )->fetchAll();
        
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
    case "addclass":{
        $modules =  $db->query('SELECT * FROM module WHERE School_Id=?', $_COOKIE["school_id"])->fetchAll();
        $teachers = $db->query('SELECT * FROM teacher WHERE School_Id =?',$_COOKIE['school_id'])->fetchAll();
        include("view/header.php");
        include("view/sidebar.php");
        include("view/class/add.php");  
        include("view/footer.php");        
        exit;
    }break;

    case "updateclass":{
        $classtoedit = $db->query('SELECT * FROM class WHERE Class_Id=?', $_GET["id"])->fetchArray();
        include("view/header.php");
        include("view/sidebar.php");
        include("view/class/edit.php");  
        include("view/footer.php"); 

        exit;
    }break;

    case "doupdateclass":{
        $className = $_POST["className"];
        $idclass = $_POST['id'];
        $price = $_POST["Price"];
        $start = $_POST["startDate"];
        $end =  $_POST["endDate"];
        $numsessions = $_POST["numSessions"];
        $capacity =  $_POST["Capacity"];
        $rq = $db->query('UPDATE class SET class_name = ?, Class_Price = ? ,Starting_Date = ?, Finishing_Date = ?, Class_Capacity = ?, Number_Of_Sections = ? WHERE Class_Id = ?',$className,$price,$start,$end ,$capacity,$numsessions ,$idclass);
        header("location: index.php?action=classlist");   

        exit;
    }break;

    case "doaddclass":{
        
        $className = $_POST["className"];
        $module = $_POST["moduleName"];
        $price = $_POST["Price"];
        $teacher = $_POST["teacherName"];
        $start = $_POST["startDate"];
        $end =  $_POST["endDate"];
        $numsessions = $_POST["numSessions"];
        $capacity =  $_POST["Capacity"];
        $db->query("INSERT INTO `class` (`Class_Id`, `Class_Price`, `Module_Id`, `School_Id`, `Teacher_Id`, `Starting_Date`, `Finishing_Date`, `Class_Capacity`, `Number_Of_Sections`, `class_name`) VALUES (?,?,?,?,?,?,?,?,?,?)",'NULL', $price, $module, $_COOKIE['school_id'], $teacher, $start, $end, $capacity, $numsessions, $className);
        header("location: index.php?action=classlist");   
        
        exit;
    }break;

    case "addstudenttoclass":{
        $students = $db->query('
    SELECT *
    FROM student AS std
    WHERE Supervisor_Id IN (
        SELECT Supervisor_Id
        FROM supervisor
        WHERE School_Id = ?
        AND Student_Id NOT IN (
            SELECT Student_Id
            FROM study
            WHERE Student_Id = std.Student_Id
            AND Class_Id = ?
        )
    )
', [$_COOKIE["school_id"], $_GET['id']])->fetchAll();
        include("view/header.php");
        include("view/sidebar.php");
        include("view/class/addstudenttoclass.php");  
        include("view/footer.php");   
        

        exit;
    }break;
    
    case "doaddstudenttoclass":{
        $classid = $_POST['classid'];
    
        $selectedStudents = $_POST['selectedClasses'];# students_id
        $session_fetcher = $db->query("SELECT * FROM session_ WHERE Class_Id = ?", $classid)->fetchAll();
        $current_date = date("Y-m-d");

$class_infos = $db->query("SELECT * FROM class WHERE Class_Id = ?", $classid);
$class_infos = $class_infos->fetchArray();
$fees_amount_per_month = $class_infos['Class_Price'];
$fees_date = $class_infos['Starting_Date'];
        foreach ($selectedStudents as $student) {
            $studentid = $student;
            $res = $db->query("SELECT * FROM study WHERE Class_Id = ? AND Student_Id = ?", $classid, $studentid);
            if ($res->numRows() == 0) {
        
                $sql = "INSERT INTO `study`(`Class_Id`, `Student_Id`, `Student_Starting_Date`, `Student_Absence`) VALUES (?, ?, ?, 0)";
               $db->query($sql, $classid, $studentid, $current_date);
            }
            for($i=0;$i<count($session_fetcher);$i++) 
            {
                $s_id = $session_fetcher[$i]['Session_Id'];
                $db->query("INSERT INTO absence VALUES (?, ?, 0)", $studentid, $s_id);
            }
            $class_infos = $db->query("SELECT * FROM class WHERE Class_Id = ?", $classid);
            $class_infos = $class_infos->fetchArray();
            $fees_amount_per_session = $class_infos['Class_Price'];
            $fees_date = $class_infos['Starting_Date'];
            $fees = $fees_amount_per_session * $class_infos['Number_Of_Sections'];
            $db->query("INSERT INTO fees VALUES (NULL, ?, ?, ?, 0, ?)", $fees, $studentid, $classid, $fees_date);
        }
        header("location: index.php?action=classlist");   

        exit;
    }break;

    case "showclassstudents":{
        $classstudents =  $db->query('SELECT * FROM student AS student JOIN study ON student.student_Id = study.Student_Id WHERE study.Class_Id =? ',$_GET['id'])->fetchAll();
        $idclass = $_GET['id'];
        include("view/header.php");
        include("view/sidebar.php");
        include("view/class/showclassstudents.php");  
        include("view/footer.php"); 
        exit;
    }break;

    case "deletestudentfromclass":{
        $db->query('DELETE FROM study WHERE Class_Id=? AND Student_Id=?',$_GET['cid'],$_GET['id']);
        $db->query('DELETE FROM absence WHERE Student_Id =?',$_GET['id']);
        $db->query('DELETE FROM fees WHERE Class_Id=? AND Student_Id=?',$_GET['cid'],$_GET['id']);
        header("location: index.php?action=classlist");   
        exit;
    }break;
  
    
}
