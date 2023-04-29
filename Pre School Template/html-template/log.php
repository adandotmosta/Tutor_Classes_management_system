<?php 

 session_start();
include "connect.php";
               if(isset($_POST["email"]) && isset($_POST["password"]))
               {
                  function validate($data)
                  {
                        $data= trim($data);
                        $data= stripslashes($data);
                        $data= htmlspecialchars($data);
                     return $data;
                  }
                  $Student_Mail = validate($_POST["email"]);
                  $Student_Password = validate($_POST["password"]);
                  if(empty($Student_Mail))
                  $Supervisor_Mail = validate($_POST["email"]);
                  $Password_User = validate($_POST["password"]);
                  //$Supervisor_Id= validate($_POST["Supervisor_Id"]);
                  if(empty($Supervisor_Mail))
                  {
                     header("Location: login.php?error= email is required");
                   exit();

                  }else if(empty($Student_Password)){
                  }else if(empty($Password_User)){
                     header("Location: login.php?error= password is required");
                   exit();

                  }else{
                     $sql="SELECT * FROM supervisor WHERE Supervisor_Mail='$Supervisor_Mail' AND Password_User='$Password_User' ";
                     $result=mysqli_query($db,$sql);
                     if(mysqli_num_rows($result)===1)
                     {
                        $row=mysqli_fetch_assoc($result);
                        if($row["Supervisor_Mail"]===$Supervisor_Mail && $row["Password_User"]=== $Password_User){
                           $_SESSION["Supervisor_Mail"]=$row["Supervisor_Mail"];
                           $_SESSION["Password_User"]=$row["Password_User"];
                           $_SESSION['Supervisor_Id'] = $row['Supervisor_Id']; 
                           
                           header("Location: children.php");
                           

                        }
                        else{
                           header("Location: login.php?error= Incorrect user name or password");
                   exit();
                        }
                     }else{
                       $error="Incorrect user name or password Try again";
                        header("Location: login.php?error= Incorrect user name or password");
                        exit();}
                  }
                  
               }
               else
               {
                   header("Location: login.php?error");
                   exit();
               }
              

               ?>

               