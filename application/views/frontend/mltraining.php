
<style>
.submit_btn{
    width:6rem;
    height:auto;
    padding:.5rem;
    color:white;
    border-radius:4px;
    background-color:#0d6efd;
    border:none;
    outline:none;
    margin-bottom:3rem;
}
.form-group{
    margin-bottom:1rem;
}
</style>

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
            

           
                            <div class="card-header">
                            <h3 class="text-center mt-3">AI/ML/DS Training Registration </h3>
                            </div>
                            <form action="<?php echo base_url().'frontend/mltraining/add'?>" method="post" >
                                <div class="card-body register">
                                    <h4 class="card-text text-center mb-3">Please fill  your details</h4>
                                    
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
                                        <input type="email" name="email" id="email" maxlength="255" class="form-control <?php echo (form_error('email') != "") ? 'is-invalid' : '';?>"
                                            placeholder="Enter Your Email">
                                        <p class="invalid-feedback"><?php echo strip_tags(form_error('email'));?></p>
                                    </div>

                                    <div class="form-group">
                                        <label for="name" class="form-label">Whatsapp Number <span style="color:red;">*</span></label>
                                        <input type="number" name="phone" id="phone" maxlength="10" class="form-control num" placeholder="Enter Your Whatsapp Number">
                                        <p class="invalid-feedback"><?php echo strip_tags(form_error('phone'));?></p>
                                    </div>


                                    <div class="form-group">
                                        <label for="name" class="form-label">Enrollment No. <span style="color:red;">*</span></label>
                                        <input type="text" name="enrollment" maxlength="50"  class="form-control" placeholder="Enrollment No.">
                                       
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
                                        <label for="name" class="form-label">Collage Name <span style="color:red;">*</span></label>
                                        <input type="text" name="collage" id="city"  class="form-control <?php echo (form_error('city') != "") ? 'is-invalid' : '';?>" placeholder="Collage Name">
                                        <p class="invalid-feedback"><?php echo strip_tags(form_error('city'));?></p>
                                    </div>

                                    <div class="form-group">
                                        <label for="name" class="form-label">Course Name <span style="color:red;">*</span></label>
                                        <select name="course" id="" class="form-control">
                                            <option value="">Select Course</option>
                                            <option value="b.tech">B.tech</option>
                                            <option value="diploma">Diploma</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="name" class="form-label" >Branch Name <span style="color:red;">*</span></label>
                                        <input type="text" name="branch" id="district" class="form-control <?php echo (form_error('district') != "") ? 'is-invalid' : '';?>" placeholder="Branch">
                                        <p class="invalid-feedback"><?php echo strip_tags(form_error('district'));?></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="form-label" >Year / Semester <span style="color:red;">*</span></label>
                                        <select name="year" id="" class="form-control">
                                            <option value="">Select Year/Semester</option>
                                            <option value="First Year / 1st Semester">First Year / 1st Semester</option>
                                            <option value="First Year / 2nd Semester">First Year / 2nd Semester</option>
                                            <option value="Second Year / 3rd Semester">Second Year / 3rd Semester</option>
                                            <option value="Second Year / 4th Semester">Second Year / 4th Semester</option>
                                            <option value="Third Year / 5th Semester">Third Year / 5th Semester</option>
                                            <option value="Third Year / 6th Semester">Third Year / 6th Semester</option>
                                            <option value="Fourth Year / 7th Semester">Fourth Year / 7th Semester</option>
                                            <option value="Fourth Year / 8th Semester">Fourth Year / 8th Semester</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                       <input type="submit" name="next" class="submit_btn" value="Register">
                                    </div>
                                </div>
                            </form>
                        
                  
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url('admin/assets/js/jquery/jquery.min.js')?>"></script>
<script src="<?php echo base_url('admin/assets/js/jquery/jquery-3.6.0.min.js')?>"></script>

<script>
    $(document).ready(function() {
        $(".num").keypress(function() {
            if ($(this).val().length == $(this).attr("maxlength")) {
                return false;
            }
        });
    });
    </script>