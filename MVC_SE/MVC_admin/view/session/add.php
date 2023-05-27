
<div class="page-wrapper">
            <div class="content container-fluid">

            
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="index.php?action=doaddsession&id=<?php echo $class_id; ?>">
                                    <div class="row">

                                        <div class="col-12">
                                            <h5 class="form-title"><span>Add A session</span></h5>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Session Start Date</label>
                                                <input type="datetime-local" class="form-control" name="session_start" >
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Session End Date</label>
                                                <input type="datetime-local" class="form-control" name="session_end" >
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

            <footer>
                <p>G6 21 guys.</p>
            </footer>

        </div>

    </div>
