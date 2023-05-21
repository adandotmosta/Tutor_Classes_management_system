<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Absence</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Absence</li>
                    </ul>
                </div>
                <div class="col-auto text-right float-right ml-auto">
                    <a href="index.php?action=addabsence" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                                        <th>StudentName</th>
                                        <th>ClassName</th>
                                        <th>SessionTime</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
            for ($i=0;$i<count($absences);$i++){
                for ($i=0;$i<count($absences2);$i++){
                    for ($i=0;$i<count($absences3);$i++){
                        for ($i=0;$i<count($absences4);$i++){
            ?>
                                        <tr>
                                            <td><?php echo $absences2[$i]['Fullname'] ?></td>
                                            <td><?php echo $absences4[$i]['class_name'] ?></td>
                                            <td><?php echo $absences3[$i]['Session_Start'] ?></td>
                                            <td>
                                                <form method="post">
                                                    <input type="radio" name='marker' value="true#<?php echo "" . $absences[$i]['Student_Id'] . "#" . $absences[$i]['Session_Id']; ?>" id="rad1" onclick="clickedradio(this)" <?php if (($$absences[$i]['absent'])) echo "checked"; ?> />Absent
                                                    <input type="radio" name='marker' value="false#<?php echo "" . $student_id . "#" . $absences[$i]['Session_Id']; ?>" id="rad2" onclick="clickedradio(this)" <?php if ((!($absences[$i]['absent']))) echo "checked"; ?> />Not Absent
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                }
                            }
                        }
                                    ?>
                                </tbody>
                                <script>
                                function clickedradio(radio){


const str = radio.value;
const [boolVar, numVar, strVar] = str.split("#");
$.ajax({
        type: 'post',
        data: {stat: boolVar,id_s: numVar,id_c: strVar},
        success: function(response){
            console.log("Absenteism :",boolVar);
            console.log("id_s : ",numVar);
            console.log("id_c: ",strVar);
          
           
        }
     });
}
</script>
