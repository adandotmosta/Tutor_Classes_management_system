<?php
    
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $con = mysqli_connect('localhost','root','','db_tutoring_classes');
        if(isset($_POST['addstudenttoclass'])){
            
            $studentid= $_POST['studentclass'];
            $classid =  $_POST['classid'];
            $current_date = date("Y-m-d");
            
            foreach($studentid as $id)
            {
                $sql = "INSERT INTO `study`(`Class_Id`, `Student_Id`, `Student_Starting_Date`, `Student_Absence`) VALUES ('$classid','$id','$current_date',0)";
                $con->query($sql);
                

                // Output some text to the browser
               

            }
           
            echo "<script>window.location.href='../Pre School Template/html-template/departments.php'</script>";
           
        }



    }



?>