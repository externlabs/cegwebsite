<div class="container mt-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <?php
        if ($this->session->flashdata('success')) {
            echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
        } else if ($this->session->flashdata('error')) {
            echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
        }
        ?>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-Registration-tab" data-bs-toggle="pill" data-bs-target="#pills-Registration" type="button" role="tab" aria-controls="pills-Registration"
                    aria-selected="true">Faculity Registration</button>
                </li>
        
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-login-tab" data-bs-toggle="pill" data-bs-target="#pills-login" type="button" role="tab" aria-controls="pills-login"
                    aria-selected="false">login</button>
                </li>
            </ul>

            <div class="tab-content student-tabbar" id="myTabContent">
                <div class="tab-pane fade show active" id="pills-Registration" role="tabpanel" aria-labelledby="pills-Registration-tab">
                    
                            <div class="card-header">
                            <h3 class="text-center mt-3"> Faculity Register Here </h3>
                            </div>
                            <form action="<?php echo base_url().'frontend/auth/faculity/create_faculity'?>" method="post" enctype="multipart/form-data">
                                <div class="card-body register">
                                    <h4 class="card-text text-center mb-3">Please fill with your details</h4>
                                    
                                    <div class="form-group">
                                        <label for="faculity" class="form-label">Faculity: <span style="color:red;">*</span></label>
                                        <select name="faculity" class="form-control <?php echo (form_error('faculity') != "") ? 'is-invalid' : '';?>">
                                            <option value="">please select title...</option>
                                            <option value="Dr">Dr.</option>
                                            <option value="Mr.">Mr.</option>
                                            <option value="Mrs.">Mrs.</option>
                                        </select>
                                        <p class="invalid-feedback"><?php echo strip_tags(form_error('faculity'));?></p>
                                    </div>


                                    <div class="form-group">
                                        <label for="name" class="form-label">Name of the Participant <span style="color:red;">*</span></label>
                                        <input type="text" name="name" id="name"  class="form-control <?php echo (form_error('name') != "") ? 'is-invalid' : '';?>" placeholder="">
                                        <p class="invalid-feedback"><?php echo strip_tags(form_error('name'));?></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="form-label">Designation <span style="color:red;">*</span></label>
                                        <input type="text" name="designation" id="designation"  class="form-control <?php echo (form_error('designation') != "") ? 'is-invalid' : '';?>" placeholder="">
                                        <p class="invalid-feedback"><?php echo strip_tags(form_error('designation'));?></p>
                                    </div>

                                    <div class="form-group">
                                        <label for="name" class="form-label">Department <span style="color:red;">*</span></label>
                                        <input type="text" name="department" id="department"  class="form-control <?php echo (form_error('department') != "") ? 'is-invalid' : '';?>" placeholder="">
                                        <p class="invalid-feedback"><?php echo strip_tags(form_error('department'));?></p>
                                       
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="name" class="form-label">Organization/University <span style="color:red;">*</span></label>
                                        <input type="text" name="organization" id="organization"  class="form-control <?php echo (form_error('organization') != "") ? 'is-invalid' : '';?>"
                                            placeholder="">
                                        <p class="invalid-feedback"><?php echo strip_tags(form_error('organization'));?></p>
                                    </div>

                                    <div class="form-group">
                                        <label for="name" class="form-label">Email <span style="color:red;">*</span></label>
                                        <input type="text" name="email" id="email"  class="form-control <?php echo (form_error('email') != "") ? 'is-invalid' : '';?>"
                                            placeholder="">
                                        <p class="invalid-feedback"><?php echo strip_tags(form_error('email'));?></p>
                                    </div>
                                   
                                    <div class="form-group">
                                        <label for="name" class="form-label">City <span style="color:red;">*</span></label>
                                        <input type="text" name="city" id="city"  class="form-control <?php echo (form_error('city') != "") ? 'is-invalid' : '';?>" placeholder="">
                                        <p class="invalid-feedback"><?php echo strip_tags(form_error('city'));?></p>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="name" class="form-label">Organization/University Address <span style="color:red;">*</span></label>
                                        <input type="text" name="address" id="address"  class="form-control <?php echo (form_error('address') != "") ? 'is-invalid' : '';?>" placeholder="">
                                        <p class="invalid-feedback"><?php echo strip_tags(form_error('address'));?></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="form-label">State <span style="color:red;">*</span></label>
                                        <input type="text" name="state" id="state"  class="form-control <?php echo (form_error('state') != "") ? 'is-invalid' : '';?>" placeholder="">
                                        <p class="invalid-feedback"><?php echo strip_tags(form_error('state'));?></p>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="name" class="form-label">Mobile No.(Whatsapp) <span style="color:red;">*</span> </label>
                                        <input type="text" name="phone" id="phone" class="form-control <?php echo (form_error('phone') != "") ? 'is-invalid' : '';?>" placeholder="">
                                        <p class="invalid-feedback"><?php echo strip_tags(form_error('phone'));?></p>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="name" class="form-label">Accommodation Required <span style="color:red;">*</span></label>
                                        <select name="accommodation" class="form-control <?php echo (form_error('accommodation') != "") ? 'is-invalid' : '';?>">
                                            <option value="">Please select one…</option>
                                            <option value="yes">YES</option>
                                            <option value="no">NO</option> 
                                            
                                        </select>
                                        <p class="invalid-feedback"><?php echo strip_tags(form_error('accommodation'));?></p>
                                    </div>

                                    <div class="form-group">
                                        <label for="name" class="form-label">Password <span style="color:red;">*</span></label>
                                        <input type="password" name="password" id="password" class="form-control <?php echo (form_error('password') != "") ? 'is-invalid' : '';?>" placeholder="">
                                        <p class="invalid-feedback"><?php echo strip_tags(form_error('password'));?></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="form-label">Confirm Password <span style="color:red;">*</span></label>
                                        <input type="text" name="confirm_password" id="confirm_password" class="form-control <?php echo (form_error('confirm_password') != "") ? 'is-invalid' : '';?>" placeholder="">
                                        <p class="invalid-feedback"><?php echo strip_tags(form_error('confirm_password'));?></p>
                                    </div>
                                    
                                    <div class="form-group">
                                        <button class="btn btn-block btn-primary">SUBMIT</button>
                                    </div>
                                </div>
                            </form>
                        
                    </div>
                    <div class="tab-pane fade" id="pills-login" role="tabpanel" aria-labelledby="pills-login-tab">
                        <div class="card-header">
                        <h3 class="text-center mt-3">Login Here </h3>
                        </div>
                        <form action="<?php echo base_url(). 'frontend/auth/faculity/faculity_login'?>" method="post">
                            <div class="card-body register">
                                <h4 class="card-text text-center">Please fill with your details</h4>
                                <div class="form-group">
                                    <label for="name" class="form-label">Email <span style="color:red;">*</span></label>
                                    <input type="text" name="email" id="" value="" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="name" class="form-label">Password <span style="color:red;">*</span></label>
                                    <input type="password" name="password" id="" value="" class="form-control" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-block btn-primary">SUBMIT</button>
                                </div>
                                
                            </div>
                        </form> 
                        <div class="form-group">
									<a href="<?php echo base_url()?>auth/forget" tabindex="5" data-toggle="modal" data-target="#changemodel" class="forgot-password">Forgot Password</a>
								</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>