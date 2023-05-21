<div class="page-wrapper">






<div class="content container-fluid">
<div class="page-header">
<div class="row align-items-center">
<div class="col">

<h3 class="page-title">
    Modify subject
</h3>

<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="subjects.php">Subject</a></li>
<li class="breadcrumb-item active">
Modify subject
</li>
</ul>
</div>
</div>
</div>


<div class="row">
<div class="col-sm-12">
<div class="card">
<div class="card-body">
<form method="post">
<input type="hidden" name="id" value="<?php if(isset($_GET['id'])){ echo $_GET['id'] ;}?>" >
<div class="row">
<div class="col-12">
<h5 class="form-title"><span>Subject Information</span></h5>
</div>

<div class="col-12 col-sm-6">
<div class="form-group">
<label>Subject Name</label>
<input type="text" name="subname" class="form-control" value="<?php     
        echo $subjecttoupdate['Module_Name'];
        
      ?> "
      
        >
</div>
</div>
<div class="col-12 col-sm-6">

</div>
<div class="col-12">
<button type="submit" class="btn btn-primary" name="Submit">
    Modify
</button>



</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>