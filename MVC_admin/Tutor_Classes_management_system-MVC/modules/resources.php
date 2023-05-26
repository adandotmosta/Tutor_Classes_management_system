<?php 
switch($vars['action']){

    case "resourceslist":{ 
        $resources = $db->query("SELECT * FROM resources WHERE Class_Id IN (SELECT Class_Id from class WHERE School_Id=(?));", $_COOKIE["school_id"])->fetchAll();

        include("view/header.php");
        include("view/sidebar.php");
        include("view/resource/list.php");
        include("view/footer.php");
        }break;


    case "addresource":{
    
      $selects = $db->query("SELECT * FROM class WHERE School_Id= (?)", $_COOKIE['school_id'])->fetchAll();
      $options = '';
    //  $options .= '<option >efefefe</option>';
    $options .= '<option  value="0">ALL</option>';
      for($i=0;$i<count($selects);$i++)
      
      {
          $options .= '<option  value="' . $selects[$i]['Class_Id'] . '">' . $selects[$i]['class_name'] . '</option>';
      }
    
        
    include("view/header.php");
    include("view/sidebar.php");
    include("view/resource/add.php");
    include("view/footer.php");
    exit;


    }
    case "doaddresource":{ 
        $Resource_Text = $_POST['Resource_Text'];
        $Class_Id = $_POST['Class_Id'];
        $Resource_Link = $_POST['Resource_Link'];
        $Resource_DueTime = $_POST['Resource_DueTime'];
        
      
           $db->query("INSERT INTO resources (Resource_Text, Class_Id, Resource_Link, Resource_DueTime) VALUES ((?), (?), (?), (?));",$Resource_Text ,$Class_Id ,$Resource_Link ,$Resource_DueTime);
           header("location:index.php?action=resourceslist");
        }
        case "editresource":{
            if (!isset($_GET['id'])) {
                // Redirect to the main page if no resource ID is provided
                header('Location: index.php?action=resourceslist');
                exit();
              }
              $cls_id = $_GET['cls_id'];
              $school_id = $_COOKIE['school_id'];
              $queries= $db->query("SELECT * FROM class WHERE School_Id = (?)",$school_id )->fetchAll();
$options = '';

for ($i=0; $i<count($queries);$i++){
    if($queries[$i]['Class_Id']==$cls_id){
    $options .= '<option selected  value="' . $queries[$i]['Class_Id'] . '">' . $queries[$i]['class_name'] . '</option>';
    } else{
        $options .= '<option  value="' . $queries[$i]['Class_Id'] . '">' . $queries[$i]['class_name'] . '</option>';

    }
}
              if(isset($_POST['edit'])){
                $id = $_GET['id'];
                $Resource_Text = $_POST['Resource_Text'];
                $Class_Id = $_POST['Class_Id'];
                $Resource_Link = $_POST['Resource_Link'];
                $Resource_DueTime = $_POST['Resource_DueTime'];
                $db->query("UPDATE resources SET Resource_Text = (?), Class_Id = (?), Resource_DueTime = (?), Resource_Link= (?) WHERE Resource_Id = (?)", $Resource_Text, $Class_Id, $Resource_DueTime, $Resource_Link, $id);
                header('Location: index.php?action=resourceslist');
                exit();}
              // Get the resource ID from the URL
              $id = $_GET['id'];
              $item = $db->query("SELECT * FROM resources WHERE Resource_Id = (?);", $id)->fetchArray();
                
            include("view/header.php");
            include("view/sidebar.php");
            include("view/resource/edit.php");
            include("view/footer.php");
            exit;
        
        
            }

            case "deleteresource":{
                $id = $_GET['id'];
                $db->query("DELETE FROM resources WHERE Resource_Id = (?);", $id);
                header('Location: index.php?action=resourceslist');
                exit();
            }
    
}
    