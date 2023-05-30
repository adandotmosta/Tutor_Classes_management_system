<?php
switch($vars['action']){

case "studentlist":{
    $students = $db->query('SELECT * FROM student WHERE Supervisor_Id IN (SELECT Supervisor_Id FROM supervisor WHERE School_Id=?);', $_COOKIE["school_id"])->fetchAll();
    include("view/header.php");
    include("view/sidebar.php");
    include("view/student/list.php");
    include("view/footer.php");
    exit;
}break;

case "deletestudent":{
    $id = $_GET['id'];
    $db->query("DELETE FROM student WHERE Student_Id=(?)",$id);
    header("location: index.php?action=studentlist");   
    exit;        
}break;

case "updatestudent":{
    $school_id = $_COOKIE['school_id'];
    $student_id = $_GET['id'];
    $Query = "SELECT * FROM student WHERE Student_Id = ?;";
    $res = $db->query($Query,$student_id)->fetchArray();
    $Student_Mail = $res["Student_Mail"];
    $firstname = $res["Student_FirstName"];
    $lastname = $res["Student_LastName"];
    $phonenumber = $res["Student_Phone_number"];
    $dateofbirth = $res["Student_Birthday"];
    $Student_address = $res["Student_address"];
    $datofbirth = date('m-d-Y', strtotime($dateofbirth));
    
    if (isset($_POST['search'])) {
        $searched = $_POST['search'];
        $fetch=$db->query("SELECT * FROM supervisor WHERE Supervisor_FirstName LIKE '%{$searched}%' AND School_Id =$school_id ;");


        $html = '<ul class="list-group">';
        if ($fetch->numRows() > 0) {
            $result= $fetch->fetchAll();
            for($i=0;$i<count($result);$i++) {
                $html .= "<li id='check_me' class='list-group-item'><a>" . $result[$i]['Supervisor_LastName'] . " " . $result[$i]['Supervisor_FirstName'] . "</a></li>";
            }
        }
        $html .= '</ul>';
        exit($html);
    }
    
    if (isset($_POST["Register"])) {
        $Student_Mail = $_POST["Student_Mail"];
        $firstname = $_POST["Student_FirstName"];
        $lastname = $_POST["Student_LastName"];
        $phonenumber = $_POST["Student_Phone_number"];
        $dataofbirth = $_POST["Student_Birthday"];
        $Student_address = $_POST["Student_address"];
        $choice = $_POST["choice"];
      
        $schoolID = $school_id;
        $supervisorId = 0;
      

      
        if ($db->connection->connect_error) {
            die("connection field" . $db->connection->connect_error);
        } else {
            if ($choice == 0) {
                $db->query("UPDATE student SET Student_FirstName=?, Student_LastName=?, Student_Mail=?, Student_Birthday=?, Student_address=?, Student_Phone_number=? WHERE Student_Id=?;", $firstname, $lastname, $Student_Mail, $dataofbirth, $Student_address, $phonenumber,$student_id);
                header("location:index.php?action=studentlist");
            } else {
                $student_name = explode(" ", $_POST['s_name']);
                $std_name = $student_name[0];
                $std_last = $student_name[1];
                $res = $db->query("SELECT Supervisor_Id FROM supervisor WHERE Supervisor_LastName=? AND Supervisor_FirstName=?", $std_name, $std_last);
                $id_student = $res->fetchArray();
                $id_s = $id_student['Supervisor_Id'];
                $supervisorId = $id_s;
                $db->query("UPDATE student SET Supervisor_Id=?, Student_FirstName=?, Student_LastName=?, Student_Mail=?, Student_Birthday=?, Student_address=?, Student_Phone_number=? WHERE Student_Id=?;",$supervisorId, $firstname, $lastname, $Student_Mail, $dataofbirth, $Student_address, $phonenumber,$student_id);
                header("location:index.php?action=studentlist");
            }
      
        }
    }
    $id = $_GET['id'];
    $res = $db->query("SELECT * FROM student WHERE Student_Id = ?;",$id)->fetchArray();
    $Query2 = "SELECT * FROM supervisor WHERE Supervisor_Id = (?);";
    $res2 = $db->query($Query2, $res['Supervisor_Id'])->fetchArray();
    $sup_name = $res2['Supervisor_LastName']." ".$res2["Supervisor_FirstName"];
    include("view/header.php");
    include("view/sidebar.php");
    include("view/student/edit.php");
    include("view/footer.php");
    exit;
}break;

case "addstudent":{
    $school_id = $_COOKIE['school_id'];
    if (isset($_POST['search'])) {
        $searched = $_POST['search'];
        $fetch=$db->query("SELECT * FROM supervisor WHERE Supervisor_FirstName LIKE '%{$searched}%' AND School_Id =$school_id ;");


        $html = '<ul class="list-group">';
        if ($fetch->numRows() > 0) {
            $result= $fetch->fetchAll();
            for($i=0;$i<count($result);$i++) {
                $html .= "<li id='check_me' class='list-group-item'><a>" . $result[$i]['Supervisor_LastName'] . " " . $result[$i]['Supervisor_FirstName'] . "</a></li>";
            }
        }
        $html .= '</ul>';
        exit($html);
    }
    
    if (isset($_POST["Register"])) {
        $Student_Mail = $_POST["Student_Mail"];
        $Student_Password = md5($_POST["Student_Password"]);
        $firstname = $_POST["Student_FirstName"];
        $lastname = $_POST["Student_LastName"];
        $phonenumber = $_POST["Student_Phone_number"];
        $dataofbirth = $_POST["Student_Birthday"];
        $Student_address = $_POST["Student_address"];
        $choice = $_POST["choice"];
      
        $schoolID = $school_id;
        $supervisorId = 0;
        $image="fr";
      

      
        if ($db->connection->connect_error) {
            die("connection field" . $db->connection->connect_error);
        } else {
            if ($choice == 0) {
                $query = "INSERT INTO supervisor (Supervisor_Id, Supervisor_FirstName, Supervisor_LastName, School_Id, Supervisor_Mail, Password_User, Mobile_number) VALUES (NULL,?,?,?,?,?,?)";
                $db->query($query, $firstname, $lastname, $school_id, $Student_Mail, $Student_Password, $phonenumber);
                $supervisorId = $db->lastInsertID();
                $query = "INSERT INTO student (Student_Id, Supervisor_Id, Student_FirstName, Student_LastName, Student_Mail, Student_Password, Student_Birthday, Student_address, Student_Phone_number, image) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $db->query($query, $supervisorId, $firstname, $lastname, $Student_Mail, $Student_Password, $dataofbirth, $Student_address, $phonenumber, $image);
                header("location:index.php?action=studentlist");
            } else {
                $student_name = explode(" ", $_POST['s_name']);
                $std_name = $student_name[0];
                $std_last = $student_name[1];
                $res = $db->query("SELECT Supervisor_Id FROM supervisor WHERE Supervisor_LastName=? AND Supervisor_FirstName=?", $std_name, $std_last);
                $id_student = $res->fetchArray();
                $id_s = $id_student['Supervisor_Id'];
                $supervisorId = $id_s;
                $query = "INSERT INTO student VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $db->query($query, $supervisorId, $firstname, $lastname, $Student_Mail, $Student_Password, $dataofbirth, $Student_address, $phonenumber, $image);
                header("location:index.php?action=studentlist");
            }
      
        }
    }
    

    include("view/header.php");
    include("view/sidebar.php");
    include("view/student/add.php");
    include("view/footer.php");
    exit;
}break;

}
