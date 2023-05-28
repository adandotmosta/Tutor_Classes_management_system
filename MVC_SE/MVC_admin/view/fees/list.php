<?php
        if(isset($_POST['search'])){
            $searched =$_POST['search'];
            $students = $db->query("SELECT * FROM student WHERE Student_LastName LIKE '%{$searched}%' AND Student_Id IN (SELECT Student_Id FROM supervisor WHERE School_Id=(?));", $School_id)->fetchAll();
            $html ='<ul class="list-group">';
            if(count($students)>0){
    
            for($i=0; $i < count($students); $i++){
                 $html .="<li  class='list-group-item' ><a>".$students[$i]['Student_LastName'] ." ".$students[$i]['Student_FirstName']."  </a></li>";
            
            }
    
    }
       $html .='</ul>';
       exit($html);
    }
?>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Fees</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Fees</li>
                    </ul>
                </div>
                <div class="col-auto text-right float-right ml-auto">
                    <a href="index.php?action=addfees" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th>Student ID</th>
                                        <th>Student Name</th>
                                        <th>Class</th>
                                        <th>Amount</th>
                                        <th>Paying Date</th>
                                        <th>Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i=0; $i<count($fees);$i++){ 
                                                $id_s = $fees[$i]['Student_Id'];
                                                $id_f = $fees[$i]['Fees_Id'];
                                                $id_c = $fees[$i]['Class_Id'];
                                                $amount = $fees[$i]['Fees_Amount'];
                                                $Fees_date = $fees[$i]['Fees_Date'];
                                                
                                                $student = $db->query("SELECT * FROM student WHERE Student_Id = ?",$id_s)->fetchArray();
                                                $student_name  = $student["Student_LastName"]." ".$student["Student_FirstName"];
                                                $class = $db->query("SELECT * FROM class WHERE Class_Id = ? ",$id_c)->fetchArray();
                                                $class_name = $class["class_name"];
                                        ?>
                                        <tr>
                                            <td><?php echo $fees[$i]['Student_Id']; ?></td>
                                            <td>
                                                <h2>
                                                    <a><?php echo $student_name; ?></a>
                                                </h2>
                                            </td>
                                            <td><?php echo $class_name; ?></td>
                                            <td><?php echo $amount; ?></td>
                                            <td><?php echo $fees[$i]['Fees_Date']; ?></td>
                                            <td class="text-right">
                                                <?php if ($fees[$i]['Fees_Status'] == 1) : ?>
                                                    <span class="badge badge-success">Paid</span>
                                                <?php else : ?>
                                                    <span class="badge badge-danger">Unpaid</span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-right">
                                                <div class="actions">
                                                    <a href="index.php?action=updatefee&id=<?php echo $fees[$i]['Fees_Id']; ?>&c_id=<?php echo $id_c;?>" class="btn btn-sm bg-success-light mr-2">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                    <a href="index.php?action=deletefee&id=<?php echo $fees[$i]['Fees_Id']; ?>" class="btn btn-sm bg-danger-light mr-2">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
