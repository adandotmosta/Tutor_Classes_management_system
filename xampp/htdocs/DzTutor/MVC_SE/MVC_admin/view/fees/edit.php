<div class="page-wrapper">
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Edit Fees</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="fees.php">Fees</a></li>
                                <li class="breadcrumb-item active">Edit Fees</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="post">
                                    <div class="row">

                                        <div class="col-12">
                                            <h5 class="form-title"><span>Fees Information</span></h5>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Student_Name</label>
                                                <input type="text" onkeyup="lister(this)" class="form-control" name="s_name" value="<?php echo $std_name ?>" id="searchbox" autocomplete="off">
                                                <div id="response"> </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Fees Amount</label>
                                                <input type="text" class="form-control" name="amount"
                                                    value="<?php echo $feetoedit['Fees_Amount'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Paying date</label>
                                                <input type="datetime-local" name="Fees_Date" class="form-control" value="<?php echo $feetoedit['Fees_Date']  ?>" >
                                            
</div>

                                                <div class="form-group">
                                                    <label>Class</label>
                                                    <select class="form-control" name="id_c">
                                                        <?php echo $options ?>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">

                                                    <label>Status</label>
                                                    <select class="form-control" name="status">
                                                        <option value="1" <?php if($status==1){ echo "selected" ;} ?> >Paid</option>

                                                        <option value="0" <?php if($status==0) echo "selected" ?>>Unpaid</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <input type="submit" class="btn btn-primary" name="sub" value="Submit">
                                            </div>

                                        </div>
                                </form>

                            </div>
                        </div>
                    </div>
</div>

            </div>
        </div>

    </div>
    <script>
       
       function send(button){ 
            
            var search_query = button.value;
            
                $.ajax({
                    type: "post",
                    data: {
                        cls_id: search_query
                    },
                    success: function(response) {
                    
                        console.log(search_query);
                    }
                });
          
        }
        
    
</script>

<script>
   
       function lister(button){ 
            
            var search_query = button.value;
            console.log("h");
            if (search_query != "") {
                $.ajax({
                    type: "post",
                    data: {
                        search: search_query
                    },
                    success: function(data) {
                    
                        $("#response").html(data);
                    },
                    dataType:'text'
                });
            } 
        
    }
    
        
    
</script>
<script>
    $(document).on('click', 'li', function () {
        var name = $(this).text();
        console.log("hello");
        $("#searchbox").val(name);
        $("#response").html("");


    });
    </script>