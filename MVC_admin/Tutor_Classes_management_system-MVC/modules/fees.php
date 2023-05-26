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
        $School_id = $_COOKIE['school_id'];

        $selects = $db->query("SELECT * FROM class WHERE School_Id= (?)", $_COOKIE['school_id'])->fetchAll();
        $options = '';
      //  $options .= '<option >efefefe</option>';
        for($i=0;$i<count($selects);$i++)
        
        {
            $options .= '<option  value="' . $selects[$i]['Class_Id'] . '">' . $selects[$i]['class_name'] . '</option>';
        }
        include("view/header.php");
        include("view/sidebar.php");
        include("view/fees/add.php");
        include("view/footer.php");
                
        exit;

     }break;

     case "doaddfees":{
        $School_id = $_COOKIE['school_id'];

        

        $selects = $db->query("SELECT * FROM class WHERE School_Id= (?)", $_COOKIE['school_id'])->fetchAll();
        $options = '';
                if(isset($_POST['sub'])){
                    $student_name = explode(" ", $_POST['s_name']);
                    $res = $db->query("SELECT Student_Id FROM student WHERE Student_LastName = ? AND Student_FirstName = ?", $student_name[0], $student_name[1]);
                    
                    $id_student = $res->fetchArray();
                    $id_s = $id_student['Student_Id'];
                    
                    $id_c = $_POST['id_c'];
                    $amount = $_POST['amount'];
                    $status = $_POST['status'];
                    $date = date('Y-m-d', strtotime($_POST['Fees_Date']));
                    
                    $db->query("INSERT INTO fees (Fees_Id,Fees_Amount, Student_Id, Class_Id, Fees_Status, Fees_Date) VALUES (?,?, ?, ?, ?, ?)",'NULL',$amount, $id_s, $id_c, $status, $date);
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
        $id_f = $_GET['id'];
        $cls_id = $_GET['c_id'];
        $feetoedit=$db->query("SELECT * FROM fees WHERE Fees_Id=(?);", $id_f)->fetchArray();

        $status = $feetoedit['Fees_Status'];
        $s_id = $feetoedit['Student_Id'];

                    $student = $db->query("SELECT CONCAT(Student_LastName,' ',Student_FirstName) AS fullname FROM student WHERE Student_Id=(?);", $s_id)->fetchArray();
                    $std_name = $student['fullname'];

        $School_id = $_COOKIE['school_id'];



$queries= $db->query("SELECT * FROM class WHERE School_Id = (?)", $School_id)->fetchAll();
$options = '';

for ($i=0; $i<count($queries);$i++){
    if($queries[$i]['Class_Id']==$cls_id){
    $options .= '<option selected  value="' . $queries[$i]['Class_Id'] . '">' . $queries[$i]['class_name'] . '</option>';
    } else{
        $options .= '<option  value="' . $queries[$i]['Class_Id'] . '">' . $queries[$i]['class_name'] . '</option>';

    }
}
if(isset($_POST['sub'])){
    $id = $_GET['id'];
    $student_name = explode(" ", $_POST['s_name']);
    $res = $db->query("SELECT Student_Id FROM student WHERE Student_LastName = ? AND Student_FirstName = ?", $student_name[0], $student_name[1]);
    
    $id_student = $res->fetchArray();
    $id_s = $id_student['Student_Id'];
    $id_c = $_POST['id_c'];
    $amount = $_POST['amount'];
    $status = $_POST['status'];
    $date = date('Y-m-d', strtotime($_POST['Fees_Date']));
    
    $db->query("UPDATE fees SET Student_Id = ?, Class_Id = ?, Fees_Amount = ?, Fees_Status = ?, Fees_Date = ? WHERE Fees_Id = ?", $id_s, $id_c, $amount, $status, $date, $id);
    header("location:index.php?action=feeslist");
    

}

        include("view/header.php");
        include("view/sidebar.php");
        include("view/fees/edit.php");
        include("view/footer.php");
        


        exit;

    }break;


    
    }