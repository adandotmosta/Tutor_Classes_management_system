<?php
    
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $con = mysqli_connect('localhost','root','','db_tutoring_classes');
        if(isset($_POST['signup'])){
            if(isset($_POST['agree-term'])){
                $sessions = 1;
            }
            else{
                $sessions = 0;

            }
            $scname = $_POST['schoolName'];
            $semail = $_POST['schoolemail'];
            $ofname = $_POST['ownerFName'];
            $olname = $_POST['ownerLName'];
            $location = $_POST['location'];
            $password =md5($_POST['pass']);
            $confirmpassword =md5($_POST['repass']);
            


           $sql = "SELECT * from school WHERE School_Name ='$scname' ";
           
           $result = mysqli_query($con,$sql);
           
           if($result){

            $num = mysqli_num_rows($result);
            if ($num > 0) {
                $exists = "User already exits !";
                session_start();
                $_SESSION['exists'] = $exists; 
                header('Location:./../register.php');
            }
            else{
                if($password == $confirmpassword){
                    $sqll = "INSERT INTO `school`(`School_Id`, `School_Name`, `School_Mail`, `Owner_FirstName`, `Owner_LastName`, `Password_Manager`, `School_Address`, `Session_System`) VALUES ('NULL','$scname','$semail','$ofname','$olname','$password','$location','$sessions')";
                    $resultt = mysqli_query($con,$sqll);
                    if ($resultt) {
                        echo "<script>window.location.href='./index.php'</script>";
                        }
                }
              
                     else {
                        $passcon = "Password did not match !";
                        //session_start();
                        $_SESSION['passcon'] = $passcon; 
                        header('Location:./../register.php');
                     }

            }
           }
        }



    }



?>