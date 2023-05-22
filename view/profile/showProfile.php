<div class="row">
                  <div class="col-md-12">
                     <div class="profile-header">
                        <div class="row align-items-center">
                           <div class="col-auto profile-image">
                              <a href="#">
                              <img class="rounded-circle" alt="User Image" src="<?php if(isset($info['image'])){ echo 'data:image/jpeg;base64,'.base64_encode($info['image']); } else{ echo ''; } ?>">
                              </a>
                           </div>
                           <div class="col ml-md-n2 profile-user-info">
                              <h4 class="user-name mb-0"><?php echo $fullname ?></h4>
                              <h6 class="text-muted">Software Engineering Team</h6>
                              <div class="user-Location"><i class="fas fa-map-marker-alt"></i> Algiers</div>
                              <div class="about-text">Software Developer</div>
                           </div>
                           
                        </div>
                     </div>
                     <div class="profile-menu">
                        <ul class="nav nav-tabs nav-tabs-solid">
                           <li class="nav-item">
                              <a class="nav-link active" data-toggle="tab" href="#per_details_tab">About</a>
                           </li>
                        </ul>
                     </div>
                    

                     <div class="tab-content profile-tab-cont">
                        <div class="tab-pane fade show active" id="per_details_tab">
                           <div class="row">
                              <div class="col-lg-9">
                                 <div class="card">
                                    <div class="card-body">
                                       <h5 class="card-title d-flex justify-content-between">
                                          <span>Personal Details</span>
                                         
                                       </h5>
                                       <div class="row">
                                          <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
                                          <p class="col-sm-9"><?php echo $info["Student_FirstName"] ?></p>
                                       </div>
                                       <div class="row">
                                          <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Date of Birth</p>
                                          <p class="col-sm-9"><?php echo $info["Student_Birthday"] ?></p>
                                       </div>
                                       <div class="row">
                                          <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
                                          <p class="col-sm-9"><?php echo $info["Student_Mail"] ?></p>
                                       </div>
                                       <div class="row">
                                          <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Mobile</p>
                                          <p class="col-sm-9"><?php echo $info["Student_Phone_number"] ?></p>
                                       </div>
                                       <div class="row">
                                          <p class="col-sm-3 text-muted text-sm-right mb-0">Address</p>
                                          <p class="col-sm-9 mb-0"><?php echo $info["Student_address"] ?><br>
                                          </p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
            
                              </div>
                           </div>
                        </div>
                       
                     </div>
                  </div>