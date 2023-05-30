<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Edit Event</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="event.html">Events</a></li>
                        <li class="breadcrumb-item active">Edit Event</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title"><span>Event Information</span></h5>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Information</label>
                                        <input type="text" class="form-control <?php echo !$TextErr ?:
           'is-invalid'; ?>" placeholder="brief description of the content"
                                            value="<?php echo $item['Resource_Text']; ?>" name="Resource_Text">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Class</label>
                                        <select class="form-control" name="Class_Id">
                                            <?php echo $options ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Due Date</label>
                                        <input type="date" class="form-control <?php echo !$TimeErr ?:
           'is-invalid'; ?>" placeholder="deadline"
                                            value="<?php echo date('m-d-Y', strtotime($item['Resource_DueTime'])); ?>"
                                            name="Resource_DueTime">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Useful links</label>
                                        <input type="text" class="form-control "
                                            placeholder="Links related to the assignments document"
                                            value="<?php echo $item['Resource_Link']; ?>" name="Resource_Link">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary" name="edit">Done</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>