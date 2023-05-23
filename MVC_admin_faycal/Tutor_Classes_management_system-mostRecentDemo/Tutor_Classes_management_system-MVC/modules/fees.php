<?php

switch($vars['action']) {

    case "feeslist":{ 
        $fees = $db->query('SELECT * FROM fees WHERE Class_Id IN (SELECT Class_Id FROM class WHERE School_Id=?);', $_COOKIE["school_id"])->fetchAll();
        $school_id = $_COOKIE["school_id"];
        include("view/header.php");
        include("view/sidebar.php");
        include("view/fees/list.php");
        include("view/footer.php");
        exit;}break;

    case "addfees":{
        $School_id = $_COOKIE['School_id'];
        if(isset($_POST['search'])){
            $searched =$_POST['search'];
            $students = $db->query("SELECT * FROM student WHERE Student_LastName LIKE '%{$searched}%' AND Student_Id IN (SELECT Student_Id FROM Supervisor WHERE School_Id=(?));" , $School_id)->fetchAll();
            $html ='<ul class="list-group">';
            if(count($students) != 0){
        
            for($i=0;$i<count($students);$i++){
                $html .="<li class='list-group-item' ><a>".$students[$i]['Student_LastName'] ." ".$students[$i]['Student_FirstName']."  </a></li>";
                
            }
        
        }
           $html .='</ul>';
           
           exit($html);
        }
        
          if(isset($_POST['cls_id'])){
                $cls_id =$_POST['cls_id'];
                $students = $db->query("SELECT Student_Id, CONCAT(Student_LastName,' ',Student_FirstName) AS full_name FROM student join study ON Class_Id WHERE Class_Id=(?);", $cls_id)->fetchAll();
        echo "<script>test();</script>";
        
        }
        $options = $db->query("SELECT * FROM class WHERE School_Id= (?);", $_COOKIE['School_Id'])->fetchAll();
        for($i=0;$i<count($options);$i++)
        
        {
            $options .= '<option  value="' . $options[$i]['Class_Id'] . '">' . $options[$i]['class_name'] . '</option>';
        }
        include("view/header.php");
        include("view/sidebar.php");
        include("view/fees/add.php");
        include("view/footer.php");


 
                if(isset($_POST['sub'])){
                    $student_name = explode(" ",$_POST['s_name']);
                    $res = mysqli_query($db,"SELECT Student_Id FROM student WHERE Student_LastName= $students[$i]['full_name'] AND Student_FirstName='$student_name[1]' ");

                    $id_student = mysqli_fetch_row($res);
                    $id_s = $id_student[0];

                    $id_c = $_POST['id_c'];
                    $amount = $_POST['amount'];
                    $status = $_POST['status'];
                    $date = date('Y-m-d',strtotime($_POST['Fees_Date']));
                    
                    $db->query("INSERT INTO fees(FeesAmount, Student_Id, Class_Id, Fees_Status, Fees_Date) VALUES ((?), (?), (?), (?),(?));", $amount, $id_s, $id_c, $status, $date);
                    header("location: index.php?action=feeslist");

                }
                


                exit;

     }break;

    case "deletefee":{ 
        $id = $_GET['id'];
        $db->query("DELETE FROM fees WHERE Fees_Id=(?)", $id);
        header("location: index.php?action=feeslist");
        exit;}break; 
    
    case "updatefee":{
        $id_f = $_GET['sent_id'];
        $feetoedit=$db->query("SELECT * FROM fees WHERE Fees_Id=(?);", $id_f)->fetchArray();

        $status = $feetoedit['Fees_Status'];
        $s_id = $feetoedit['Student_Id'];

                    $student = $db->query("SELECT CONCAT(Student_LastName,' ',Student_FirstName) AS fullname FROM student WHERE Student_Id=(?);", $s_id)->fetchArray();
                    $std_name = $student['fullname'];

        $School_id = $_COOKIE['School_Id'];
        if(isset($_POST['search'])){
        $searched =$_POST['search'];
        $students = $db->query("SELECT * FROM student WHERE Student_LastName LIKE '%{$searched}%' AND Student_Id IN (SELECT Student_Id FROM Supervisor WHERE School_Id=(?));", $School_id)->fetchAll();
        $html ='<ul class="list-group">';
        if(count($students)>0){

        for($i=0; $i < count($students); $i++){
             $html .="<li  class='list-group-item' ><a>".$students[$i]['Student_LastName'] ." ".$students[$i]['Student_FirstName']."  </a></li>";
        
        }

}
   $html .='</ul>';
   exit($html);
}

   if(isset($_POST['cls_id'])){
        $cls_id =$_POST['cls_id'];
        $options = $db->query("SELECT Student_Id, CONCAT(Student_LastName,' ',Student_FirstName) AS full_name FROM student join study ON Class_Id WHERE Class_Id=$cls_id; ")->fetchArray();
echo "<script>test();</script>";
}
$cls_id = $options['Class_Id'];
$que= $db->query("SELECT * FROM class WHERE School_Id = (?)", $School_id)->fetchAll();
$options = '';

for ($i=0; $i<count($que);$i++){
    if($que[$i]['Class_Id']==$cls_id){
    $options .= '<option selected  value="' . $que[$i]['Class_Id'] . '">' . $que[$i]['class_name'] . '</option>';
    } else{
        $options .= '<option  value="' . $que[$i]['Class_Id'] . '">' . $que[$i]['class_name'] . '</option>';

    }
}
        include("view/header.php");
        include("view/sidebar.php");
        include("view/fees/edit.php");
        include("view/footer.php");
        
        if(isset($_POST['sub'])){
            $id = $_GET['id'];
            $student_name = explode(" ",$_POST['s_name']);
            $res = mysqli_query($db,"SELECT Student_Id FROM student WHERE Student_LastName='$student_name[0]' AND Student_FirstName='$student_name[1]';");

            $id_student = mysqli_fetch_row($res);
            $id_s = $id_student[0];
            $id_c = $_POST['id_c'];
            $amount = $_POST['amount'];
            $status = $_POST['status'];
            $date = date('Y-m-d',strtotime($_POST['Fees_Date']));
        
            $db->query("UPDATE `fees` SET `Student_Id`= (?),`Class_Id`=(?),`Fees_Amount`=(?), Fees_Status =(?),Fees_Date=(?) WHERE Fees_Id=(?); ", $id_s, $id_c, $amount, $status, $date, $id);
            header("location: index.php?action=feeslist");

        }

        exit;

    }break;


    
    }