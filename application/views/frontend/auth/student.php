
<script src="<?php echo base_url('admin/assets/js/jquery/jquery.min.js')?>"></script>
<script src="<?php echo base_url('admin/assets/js/jquery/jquery-3.6.0.min.js')?>"></script>

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
                    <button class="nav-link" id="pills-Registration-tab" data-bs-toggle="pill" data-bs-target="#pills-Registration" type="button" role="tab" aria-controls="pills-Registration"
                    aria-selected="true">Student Registration</button>
                </li>
        
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-login-tab" data-bs-toggle="pill" data-bs-target="#pills-login" type="button" role="tab" aria-controls="pills-login"
                    aria-selected="false">login</button>
                </li>
            </ul>

            <div class="tab-content student-tabbar" id="myTabContent">
                <div class="tab-pane fade" id="pills-Registration" role="tabpanel" aria-labelledby="pills-Registration-tab">
                    
                            <div class="card-header">
                            <h3 class="text-center mt-3"> Student Register Here </h3>
                            </div>
                            <form action="<?php echo base_url().'frontend/auth/student/student_create'?>" method="post" enctype="multipart/form-data">
                                <div class="card-body register">
                                    <h4 class="card-text text-center mb-3">Please fill with your details</h4>
                                    
                                    <div class="form-group">
                                        <label for="name" class="form-label">Name <span style="color:red;">*</span></label>
                                        <input type="text" name="name" id="name" maxlength="50" class="form-control <?php echo (form_error('name') != "") ? 'is-invalid' : '';?>" placeholder="Enter Your Name">
                                        <p class="invalid-feedback"><?php echo strip_tags(form_error('name'));?></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="form-label">Father Name <span style="color:red;">*</span></label>
                                        <input type="text" name="father_name" id="father_name" maxlength="50" class="form-control <?php echo (form_error('father_name') != "") ? 'is-invalid' : '';?>" placeholder="Enter Father name">
                                        <p class="invalid-feedback"><?php echo strip_tags(form_error('father_name'));?></p>
                                    </div>

                                    <div class="form-group">
                                        <label for="name" class="form-label">Mother Name <span style="color:red;">*</span></label>
                                        <input type="text" name="mother_name" id="mother_name" maxlength="50"  class="form-control <?php echo (form_error('mother_name') != "") ? 'is-invalid' : '';?>" placeholder="Mother name">
                                        <p class="invalid-feedback"><?php echo strip_tags(form_error('mother_name'));?></p>
                                    </div>

                                    <div class="form-group">
                                        <label for="name" class="form-label">Email <span style="color:red;">*</span></label>
                                        <input type="text" name="email" id="email" maxlength="255" class="form-control <?php echo (form_error('email') != "") ? 'is-invalid' : '';?>"
                                            placeholder="Enter Your Email">
                                        <p class="invalid-feedback"><?php echo strip_tags(form_error('email'));?></p>
                                    </div>

                                    <div class="form-group">
                                        <label for="name" class="form-label">Phone <span style="color:red;">*</span></label>
                                        <input type="number" name="phone" id="phone" maxlength="10" class="form-control num" placeholder="Enter Your Phone Number">
                                        <p class="invalid-feedback"><?php echo strip_tags(form_error('phone'));?></p>
                                    </div>


                                    <div class="form-group">
                                        <label for="name" class="form-label">Aadhar Number/Janaadhar <span style="color:red;">*</span></label>
                                        <input type="number" name="aadhar" id="aadhar" maxlength="12"  class="form-control num" placeholder="aadhar">
                                        <p class="invalid-feedback"><?php echo strip_tags(form_error('aadhar'));?></p>
                                       
                                    </div>

                                    <div class="form-group">
                                    <label for="dob" class="form-label">DOB: <span style="color:red;">*</span></label>
                                    <input type="date" id="dob" name="dob" class="form-control <?php echo (form_error('dob') != "") ? 'is-invalid' : '';?>">
                                    <p class="invalid-feedback"><?php echo strip_tags(form_error('dob'));?></p>
                                    </div>

                                    
                                    <div class="form-group">
                                        <label for="gender" class="form-label">Gender: <span style="color:red;">*</span></label>
                                        <select name="gender" class="form-control <?php echo (form_error('gender') != "") ? 'is-invalid' : '';?>">
                                            <option value="">Please select one…</option>
                                            <option value="female">Female</option>
                                            <option value="male">Male</option>
                                            <option value="other">Other</option>
                                        </select>
                                        <p class="invalid-feedback"><?php echo strip_tags(form_error('gender'));?></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="form-label">Address <span style="color:red;">*</span></label>
                                        <input type="text" name="address" id="address" maxlength="255" class="form-control <?php echo (form_error('address') != "") ? 'is-invalid' : '';?>" placeholder="Enter Address">
                                        <p class="invalid-feedback"><?php echo strip_tags(form_error('address'));?></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="form-label">City <span style="color:red;">*</span></label>
                                        <input type="text" name="city" id="city"  class="form-control <?php echo (form_error('city') != "") ? 'is-invalid' : '';?>" placeholder="city">
                                        <p class="invalid-feedback"><?php echo strip_tags(form_error('city'));?></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="form-label" >District <span style="color:red;">*</span></label>
                                        <input type="text" name="district" id="district" class="form-control <?php echo (form_error('district') != "") ? 'is-invalid' : '';?>" placeholder="district">
                                        <p class="invalid-feedback"><?php echo strip_tags(form_error('district'));?></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="form-label" >State <span style="color:red;">*</span></label>
                                        <input type="text" name="state" id="state" class="form-control <?php echo (form_error('state') != "") ? 'is-invalid' : '';?>" placeholder="district">
                                        <p class="invalid-feedback"><?php echo strip_tags(form_error('state'));?></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="form-label">Pincode <span style="color:red;">*</span></label>
                                        <input type="text" name="pincode" id="pincode" class="form-control <?php echo (form_error('pincode') != "") ? 'is-invalid' : '';?>" placeholder="pincode">
                                        <p class="invalid-feedback"><?php echo strip_tags(form_error('pincode'));?></p>
                                    </div>
                                    
                                    <div class="form-group">
                                       <input type="submit" name="next" value="Next">
                                    </div>
                                </div>
                            </form>
                        
                    </div>
                    <div class="tab-pane show active" id="pills-login" role="tabpanel" aria-labelledby="pills-login-tab">
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

                                <div class="form-group">
									<a href="<?php echo base_url()?>auth/forget" tabindex="5" data-toggle="modal" data-target="#changemodel" class="forgot-password">Forgot Password</a>
								</div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    $(document).ready(function() {
        $(".num").keypress(function() {
            if ($(this).val().length == $(this).attr("maxlength")) {
                return false;
            }
        });
    });
    </script>