<?php
switch($vars['action']){
    case "supervisorlist":{
        $supervisors = $db->query('SELECT * FROM supervisor WHERE School_Id=(?) ;', $_COOKIE["school_id"])->fetchAll();
        include("view/header.php");
        include("view/sidebar.php");
        include("view/supervisor/list.php");
        include("view/footer.php");
        exit;
    }break;
case "addsupervisor":{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $Fname = $_POST['Supervisor_FirstName'];
        $Lname = $_POST['Supervisor_LastName'];
        $Supervisor_Mail = $_POST['Supervisor_Mail'];
        $Supervisor_Phone_number = $_POST['Supervisor_Phone_number'];
        $Supervisor_pass  = md5($_POST['Supervisor_Password']);
        $db->query("INSERT INTO supervisor (Supervisor_FirstName, Supervisor_LastName,School_Id, Supervisor_Mail,Password_User,Mobile_number) VALUES ( ?, ?, ?, ?, ?,?)", $Fname, $Lname,$_COOKIE['school_id'] ,$Supervisor_Mail,$Supervisor_pass, $Supervisor_Phone_number);

        header("location: index.php?action=supervisorlist");
        exit;
    }
    include("view/header.php");
    include("view/sidebar.php");
    include("view/supervisor/add.php");
    include("view/footer.php");

}break;
case "updatesupervisor":{
    $id = $_GET['id'];
    $Query = "SELECT * FROM supervisor WHERE Supervisor_Id = $id;";
    $res = $db->query($Query)->fetchArray();
    $f_name = $res['Supervisor_FirstName'];
    $l_name = $res['Supervisor_LastName'];
    $email = $res['Supervisor_Mail'];
  //  $pass = $res['Password_User'];
    $mobile_number = $res['Mobile_number'];
    if (isset($_POST['Register'])) {
        $Fname = $_POST['Supervisor_FirstName'];
        $Lname = $_POST['Supervisor_LastName'];
        $Supervisor_Mail = $_POST['Supervisor_Mail'];
        $Supervisor_Phone_number = $_POST['Supervisor_Phone_number'];
        $Supervisor_pass = $_POST['Supervisor_Password'];
        if($Supervisor_pass!=$pass){
            $Supervisor_pass = md5($pass);
        }
        $db->query("UPDATE supervisor SET Supervisor_FirstName=(?), Supervisor_LastName=(?), Supervisor_Mail=(?),Mobile_number=(?) WHERE Supervisor_Id=(?)", $Fname, $Lname, $Supervisor_Mail, $Supervisor_Phone_number,$id );
        header("location:index.php?action=supervisorlist");

    }


    include("view/header.php");
    include("view/sidebar.php");
    include("view/supervisor/edit.php");
    include("view/footer.php");


}break;
case "deletesupervisor":{
    $id = $_GET['id'];
    $db->query("DELETE FROM supervisor WHERE Supervisor_Id=(?)",$id);
    header("location:index.php?action=supervisorlist");   
    exit;        
}break;
}
