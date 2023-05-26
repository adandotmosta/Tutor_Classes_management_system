
<div class="page-wrapper">
            <div class="content container-fluid">
            <h3 class="page-title">Sessions</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
<li class="breadcrumb-item ">Sessions</li>
</ul>

            <div class="col-auto text-right float-right ml-auto">
<a href="index.php?action=addsession&id=<?php echo $class_id; ?>" class="btn btn-primary"><i class="fas fa-plus"></i></a>
</div>
                <div class="row">

                    <div class="col-sm-12">
                        <div class="card card-table">
                            <div class="card-body">
                                <div class="table-responsive">
                                        <table class="table table-hover table-center mb-0 datatable">
                                            <thead>
                                                <tr>
                                                    <th>SessionNumber</th>
                                                    <th>Session Start date</th>
                                                    <th>Session End date</th>
                                                    <th>Class</th>
                                                    <th class="text-right">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                            for($i=0;$i<count($sessions);$i++) {
                                                
                                                $session_start = $sessions[$i]["Session_Start"];
                                                $session_end = $sessions[$i]['Session_End'];
                                                $session_id =$sessions[$i]['Session_Id'];
                                            
                                                

                                            
                                    


                                             ?>
                                                <tr>

                                                    <td>
                                                         <?php  echo $session_id;  ?>
                                                    </td>
                                                    <td>
                                                        <?php  echo $session_start  ?>
                                                    </td>
                                                    <td>
                                                        <?php  echo $session_end  ?>
                                                    </td>
                                                    <td>
                                                        <?php  echo $class_name  ?>
                                                    </td>

                                                    <td class="text-right">
                                                        <div class="actions">
                                                            <a href="index.php?action=updatesession&id=<?php echo $sessions[$i]['Session_Id'] ?>&id_c=<?php echo $class_id ?>"
                                                                class="btn btn-sm bg-success-light mr-2">
                                                                <i class="fas fa-pen"></i>
                                                            </a>
                                                            <a href="index.php?action=dodeletesession&s_id=<?php echo $session_id; ?>&id_c=<?php echo $class_id; ?>"
                                                                class="btn btn-sm bg-danger-light mr-2">
                                                                <i class="fas fa-trash"></i>
                                                            </a>
                                                            
                                                           

                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                           

                                            }
                                            ?>

                                            
                                </div>




                                </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                </div>

            </div>

            <footer>
                <p>G6 21 guys.</p>
            </footer>

        </div>

    </div>
