
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
                    aria-selected="true">Student Registration</button>
                </li>
        
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-login-tab" data-bs-toggle="pill" data-bs-target="#pills-login" type="button" role="tab" aria-controls="pills-login"
                    aria-selected="false">login</button>
                </li>
            </ul>

            <div class="tab-content student-tabbar" id="myTabContent">
                <div class="tab-pane fade show active" id="pills-Registration" role="tabpanel" aria-labelledby="pills-Registration-tab">
                    
                            <div class="card-header">
                            <h3 class="text-center mt-3"> Student Register Here </h3>
                            </div>
                            <form action="<?php echo base_url().'frontend/auth/student/add_create'?>" method="post" enctype="multipart/form-data">
                                <div class="card-body register">
                                    <h4 class="card-text text-center mb-3">Please fill with your details</h4>
                                
                                    <!-- <div class="form-group">
                                    <label for="name">Uplode your resume </label>
                                    <input type="file" id="myFile" name="re" class="form-control" required>
                                    <p>format allowed pdf,docs</p>
                                    </div> -->

                                    <div class="form-group">
                                        <label for="name">Uplode Photo <span style="color:red;">*</span></label>
                                        <input type="file"  name="photo" class="form-control" required>
                                        <p>format allowed jpg,png,jpeg</p>
                                    </div> 

                                    <div class="form-group">
                                        <label for="name">Upload Aadhar Photo <span style="color:red;">*</span> </label>
                                        <input type="file"  name="aadhar" class="form-control" required>
                                        <p>format allowed jpg,png,jpeg</p>
                                    </div> 
                                

                                    <div class="form-group">
                                        <label for="name">Upload Signature <span style="color:red;">*</span></label>
                                        <input type="file"  name="signature" class="form-control" required>
                                        <p>format allowed jpg,png,jpeg</p>
                                    </div> 
                        
                                    <div class="form-group">
                                        <label for="name" class="form-label">Height <span style="color:red;">*</span></label>
                                        <input type="text" name="height" id="height" maxlength="5"class="form-control <?php echo (form_error('height') != "") ? 'is-invalid' : '';?>" placeholder="height">
                                        <p class="invalid-feedback"><?php echo strip_tags(form_error('height'));?></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="form-label">Weight <span style="color:red;">*</span></label>
                                        <input type="text" name="weight" id="weight"  maxlength="3" class="form-control <?php echo (form_error('weight') != "") ? 'is-invalid' : '';?>" placeholder="weight">
                                        <p class="invalid-feedback"><?php echo strip_tags(form_error('weight'));?></p>
                                    </div>
                                
                                    <div class="form-group">
                                        <label for="name" class="form-label">Blood Group: <span style="color:red;">*</span></label>
                                        <select name="bloodgroup" class="form-control <?php echo (form_error('bloodgroup') != "") ? 'is-invalid' : '';?>">
                                            <option value="">Please select one…</option>
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option> 
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="O+">O+</option>
                                        </select>
                                        <p class="invalid-feedback"><?php echo strip_tags(form_error('bloodgroup'));?></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="form-label">Password <span style="color:red;">*</span></label>
                                        <input type="password" name="password" id="password" class="form-control <?php echo (form_error('password') != "") ? 'is-invalid' : '';?>" placeholder="password">
                                        <p class="invalid-feedback"><?php echo strip_tags(form_error('password'));?></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="form-label">Confirm Password <span style="color:red;">*</span></label>
                                        <input type="text" name="confirm_password"  class="form-control" placeholder="Confirm password">
                                        
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-block btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        
                    </div>
                    <div class="tab-pane fade" id="pills-login" role="tabpanel" aria-labelledby="pills-login-tab">
                        <div class="card-header">
                        <h3 class="text-center mt-3"> Login Here </h3>
                        </div>
                        <form action="<?php echo base_url(). 'frontend/auth/student/student_login'?>" method="post">
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
                                    <button class="btn btn-block btn-primary">submit</button>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>