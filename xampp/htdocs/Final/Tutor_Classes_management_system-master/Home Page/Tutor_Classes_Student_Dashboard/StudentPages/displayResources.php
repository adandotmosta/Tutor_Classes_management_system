<?php if (empty($resources)): ?>
    <p class="lead mt-3">There is no ressources</p>
  <?php endif; ?>

  <?php foreach ($resources as $item): ?>
    
    <div class="card my-3 w-75">
    <?php
    if(!empty($item['Resource_DueTime'])){
        echo "&nbsp;&nbsp;Assignment";
    }else{
        echo "&nbsp;&nbsp;Resource";
    }
    ?>
     <div class="card-body text-center">
       <?php echo $item['Resource_Text']; ?>
       <div class="text-secondary mt-2">from class of module<?php echo $item[
         'Module_Name'
       ]; ?>  <?php if(!empty($item['Resource_DueTime'])) { echo "due ".date_format(
   date_create($item['Resource_DueTime']),
   'l jS F Y'
 ); 
}else{

    echo Null;
    
 }?></div>
      
    <div class="modal-body">
    <a href =" <?php echo $item['Resource_Link']?>">Resources link</a>
    </div>
<?php

    ?>

           
      
    </div>
  </div>
  <?php endforeach; ?>