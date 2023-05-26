<div class="page-wrapper">
<div class="content container-fluid">
<div class="page-header">
<div class="row align-items-center">
<div class="col">
<h3 class="page-title">
Modify Teacher
</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="teachers.php">Teacher</a></li>
<li class="breadcrumb-item active">
Modify Teacher
</li>
</ul>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-12">
<div class="card">
<div class="card-body">
<form method="post" >
<input type="hidden" name="id" value="<?php if(isset($_GET['id'])){ echo $_GET['id'] ;}?>" >
<div class="row">
<div class="col-12">
<h5 class="form-title"><span>Teacher Information</span></h5>
</div>


<div class="col-12 col-sm-6">
<div class="form-group">
<label>First Name</label>
<input type="text" name="Teacher_FirstName" class="form-control" value="<?php     

        if(isset($_GET['id'])){
        
           echo $teachertoedit['Teacher_FirstName'];
        }
      ?> "
      
        >
</div>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>Last Name</label>
<input type="text" name="Teacher_LastName" class="form-control" value="<?php     

        if(isset($_GET['id'])){
            echo $teachertoedit['Teacher_LastName'];
        }
      ?> ">
</div>
</div>

<div class="col-12 col-sm-6">
<div class="form-group">
<label>Email</label>
<input type="text" name="Teacher_Mail" class="form-control" value="<?php     

        if(isset($_GET['id'])){
            echo $teachertoedit['Teacher_Mail'];
        }
      ?> "
      
        >
</div>
</div>


<div class="col-12">
<button type="Submit" class="btn btn-primary" name="submit">


Modify

</button>


</div>
</div>
</form>
</div>
</div>
</div>