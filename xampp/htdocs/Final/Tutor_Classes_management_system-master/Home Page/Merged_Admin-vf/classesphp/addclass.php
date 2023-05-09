<?php
     session_start();
     include "../connexion.php" ;
    if(!$db){
        echo "error";
    }
    if(isset($_POST['submit'])){
    
   
    $className = $_POST["className"];
    $module = $_POST["moduleName"];
    $price = $_POST["Price"];
    $teacher = $_POST["teacherName"];
    $start = $_POST["startDate"];
    $end =  $_POST["endDate"];
    $numsessions = $_POST["numSessions"];
    $capacity =  $_POST["Capacity"];
   
    $school = $_SESSION["School_Id"];

   $sql = "INSERT INTO `class`(`Class_Id`, `Class_Price`, `Module_Id`, `School_Id`, `Teacher_Id`, `Starting_Date`, `Finishing_Date`, `Class_Capacity`, `Number_Of_Sections`, `class_name`) VALUES ('NULL',$price,$module,'$school',$teacher,'$start','$end',$capacity,'$numsessions','$className')";
    
    $result = $db->query($sql);
   echo "<script>window.location.href='../Pre-School-Template/html-template/departments.php'</script>";
    }

?>