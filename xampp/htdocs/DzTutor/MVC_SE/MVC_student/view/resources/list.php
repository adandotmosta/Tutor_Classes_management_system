
         <div class="page-wrapper">
            <div class="content container-fluid">
               <div class="page-header">
                  <div class="row">
                     <div class="col">
                        <h3 class="page-title">Profile</h3>
                        <ul class="breadcrumb">
                           <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                           <li class="breadcrumb-item active">Profile</li>
                        </ul>
                     </div>
                  </div>
               </div>

               <?php if (empty($resources)): ?>
    <p class="lead mt-3">There are no resources</p>
<?php endif; ?>

<?php for ($i = 0; $i < count($resources); $i++): ?>
    <div class="card my-3 w-75">
        <?php if (!empty($resources[$i]['Resource_DueTime'])): ?>
            &nbsp;&nbsp;Assignment
        <?php else: ?>
            &nbsp;&nbsp;Resource
        <?php endif; ?>
        <div class="card-body text-center">
            <?= $resources[$i]['Resource_Text']; ?>
            <div class="text-secondary mt-2">from class of module <?= $resources[$i]['Module_Name']; ?>
                <?php if (!empty($resources[$i]['Resource_DueTime'])): ?>
                    due <?= date_format(date_create($resources[$i]['Resource_DueTime']), 'l jS F Y'); ?>
                <?php else: ?>
                    NULL
                <?php endif; ?>
            </div>
            <div class="modal-body">
                <a href="<?= $resources[$i]['Resource_Link']; ?>">Resources link</a>
            </div>
        </div>
    </div>
<?php endfor; ?>

</div>

