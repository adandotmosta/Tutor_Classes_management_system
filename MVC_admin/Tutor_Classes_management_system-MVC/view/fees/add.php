<?php

if(isset($_POST['search'])){
    $searched =$_POST['search'];
    $students = $db->query("SELECT * FROM student WHERE Student_LastName LIKE '%{$searched}%' AND Student_Id IN (SELECT Student_Id FROM Supervisor WHERE School_Id=(?));" , $School_id)->fetchAll();
    $html ='<ul class="list-group">';
    if(count($students) != 0){

    for($i=0;$i<count($students);$i++){
        $html .="<li class='list-group-item' ><a>".$students[$i]['Student_LastName'] ." ".$students[$i]['Student_FirstName']."  </a></li>";
        
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
                            <h3 class="page-title">Add Fees</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="fees.php">Fees</a></li>
                                <li class="breadcrumb-item active">Add Fees</li>
                            </ul>
                        </div>
                    </div>
                </div>
<div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="index.php?action=doaddfees">
                                    <div class="row">
                                        
                                            <div class="col-12">
                                                <h5 class="form-title"><span>Fees Information</span></h5>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <label>Student_Name</label>
                                                    <input  class="form-control" type="text" onkeyup="lister(this)" autocomplete="off" name="s_name" id="searchbox">
                                                    <div id="response"> </div>
                                                    
                                                                  
       
                                                </div>
                                            </div>
                                    
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">

                                                    <label>Status</label>
                                                    <select class="form-control" name="status">
                                                        <option value="1">Paid</option>
                                                        <option value="0">Unpaid</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <label>Fees Amount</label>
                                                    <input type="text" class="form-control" name="amount">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <label>Paying date</label>
                                                    <input type="date" class="form-control" name="Fees_Date" value="<?php echo date('Y-m-d'); ?>" />
                                                </div>
                                            </div>

                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <label>Class</label>
                                                    <select class="form-control" name="id_c" onclick="send(this)">
                                                    <?php 
                                                    echo $options;
                                                     ?>
                                                    </select>
                                                </div>

                                            </div>
                                            
                                          
                                            <div class="col-12">
                                                <input type="submit" class="btn btn-primary" name="sub">
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
