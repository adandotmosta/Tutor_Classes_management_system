<?php

switch($vars['action']){
    case "main":{
        $supervisorId = $_COOKIE['supervisor_id'];
$sql = "SELECT s.image, s.Student_Id, s.Student_LastName, s.Student_FirstName, s.Student_Mail, s.Student_Birthday, s.Student_Phone_number, s.Student_address 
        FROM student s 
        JOIN supervisor st ON s.Supervisor_Id = st.Supervisor_Id 
        WHERE s.Supervisor_Id = (?) ";
$result = $db->query($sql, $supervisorId)->fetchAll();
        include("view/head.php");
        include("view/children.php");
        include("view/footer.php");
        exit;
    }break;

    case "dashboard":{
        if(!(isset($_COOKIE['student_id']))){
                $Id = $_GET["id"];
        setcookie("student_id",$Id, time()+(3600*24),"/");
        }
        $Id = $_COOKIE['student_id'];
// Retrieve student's first name
$sql = "SELECT Student_FirstName FROM student WHERE Student_Id = ?";
$result = $db->query($sql, $Id);

if ($result->numRows() > 0) {
    $row = $result->fetchArray();
    $name = $row["Student_FirstName"];
} else {
    $name = "User";
}

// Retrieve courses info from database
$sql_classer = "SELECT class.class_name, class.Class_Id, COUNT(absence.Student_Id) as count
        FROM (study
        JOIN class ON study.Class_Id = class.Class_Id) Join absence ON absence.Student_Id = study.Student_Id
        WHERE study.Student_Id = ?
        GROUP BY class.Class_Id , count ";

// Retrieve fees info
$sqlfees = "SELECT Fees_Amount,Fees_Status,DATE_FORMAT(Fees_Date, '%Y-%m-%d') AS Fees_Date,Class_Id
        FROM fees
        WHERE Student_Id = ?;";

// Retrieve assignments info
$sqlressources = "SELECT r.Resource_Text, r.Resource_DueTime
        FROM resources r
        JOIN study s ON r.class_id = s.class_id
        WHERE s.Student_Id = ?
        ORDER BY r.Resource_DueTime DESC
        LIMIT 3";

// Count number of absences
$sql = "SELECT COUNT(absence.absent) as count
        FROM absence
        WHERE Student_Id = ?";
$result = $db->query($sql, $Id);
$row = $result->fetchArray();
$absences = $row['count'];

// Count number of resources available to the user
$sql = "SELECT COUNT(Resource_Id) as resources
        FROM resources
        JOIN study ON resources.Class_Id = study.Class_Id
        WHERE Student_Id = ?";
$result = $db->query($sql, $Id);
$row = $result->fetchArray();
$resources = $row['resources'];

// Count number of courses attended
$sql = "SELECT COUNT(Class_Id) as courses
        FROM study
        WHERE Student_Id = ?";
$result = $db->query($sql, $Id);
$row = $result->fetchArray();
$courses = $row['courses'];



        include("view/header.php");
        include("view/sidebar.php");
        include("view/main.php");
        include("view/footer.php");
        exit;
    }break;

    
}
