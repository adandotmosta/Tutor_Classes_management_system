<?php
    
    if($_SERVER['REQUEST_METHOD']=='POST'){
      include "../connexion.php";

        if(isset($_POST['addstudenttoclass'])){
            session_start();
            $studentid= $_POST['studentclass'];
            $classid =  $_POST['classid'];
            $session_per_class = mysqli_query($db,"SELECT * FROM session_ WHERE Class_Id=$classid;");
            $current_date = date("Y-m-d");
            $session_system  = $_SESSION['Session_System'];
            

            $class_infos = mysqli_query($db,"SELECT * FROM class WHERE Class_Id = $classid");
            $class_infos = mysqli_fetch_row($class_infos);
            $fees_amount_per_month = $class_infos[1];
            $fees_date = $class_infos[6];
            foreach($studentid as $id)
            {
                $res = mysqli_query($db,"SELECT * FROM study WHERE Class_Id=$classid AND Student_Id=$id;");
                if(mysqli_num_rows($res)==0){
echo "<script>alert('id ={$id}')</script>";

                $sql = "INSERT INTO `study`(`Class_Id`, `Student_Id`, `Student_Starting_Date`, `Student_Absence`) VALUES ('$classid','$id','$current_date',0)";
                $db->query($sql);

                
                }
                
               

                while($session_fetcher = mysqli_fetch_assoc($session_per_class)){
                    $s_id = $session_fetcher['Session_Id'];
                    mysqli_query($db,"INSERT INTO absence VALUES ($id,$s_id,0)");
                }
               
                    
                    // paying per month
                    $class_infos = mysqli_query($db,"SELECT * FROM class WHERE Class_Id = $classid");
                    $class_infos = mysqli_fetch_row($class_infos);
                    $fees_amount_per_month = $class_infos[1];
                    $fees_date = $class_infos[6];
                    $fees_amount_per_month = $fees_amount_per_month * $class_infos[8];
                    mysqli_query($db,"INSERT INTO fees VALUES(NULL,$fees_amount_per_month,$id,$classid,0,'$fees_date')");



                

                // Output some text to the browser
               

            }
           
            echo "<script>window.location.href='../Pre-School-Template/html-template/departments.php'</script>";
           
        }



    }



?>