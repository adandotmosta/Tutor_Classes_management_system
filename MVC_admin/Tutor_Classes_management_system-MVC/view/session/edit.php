<div class="page-wrapper">
            <div class="content container-fluid">


                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="index.php?action=doupdatesession&id=<?php echo $session_id;?>&id_c=<?php echo $class_id; ?>">
                                    <div class="row">

                                        <div class="col-12">
                                            <h5 class="form-title"><span>Update a session</span></h5>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Session Start Date</label>
                                                <input type="datetime-local" class="form-control" name="session_start" value="<?php echo $sessions['Session_Start']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Session End Date</label>
                                                <input type="datetime-local" class="form-control" name="session_end" value="<?php echo $sessions['Session_End']; ?>">
                                            </div>
                                        </div>



                                        <div class="col-12">
                                            <input type="submit" class="btn btn-primary" value="Add" name="sub">
                                        </div>

                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>