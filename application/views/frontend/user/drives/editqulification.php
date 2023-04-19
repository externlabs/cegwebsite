

<div class="container mt-md-5 mt-3">
    <div class="row">
        <div class="col-12">
        <?php
        if ($this->session->flashdata('success')) {
            echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
        } else if ($this->session->flashdata('error')) {
            echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
        }
        ?>
            <div class="card-header">
                Add Qualification
            </div>

            <form action="<?php echo base_url().'frontend/user/editqualification/updated_edit'?>" method="post">
            <?php if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'ON'){
                    $url = "https://";
                }else{
                    $url = "http://";
                }
                $url.= $_SERVER['HTTP_HOST'];
                $url.= $_SERVER['REQUEST_URI'];
               
            $parts = basename($url);
            
            $rerfe = explode("=",$parts);
                
            ?>
             <?php foreach( $fetch_content as $value){ if($value['company_id']==$rerfe[1]){?>
                <div class="card-body register">
                    <p class="card-text">Please fill with your details</p>
                    <div class="form-group">
                        <label for="faculity" class="form-label">Select Class</label>
                        <select name="class" id="classGrade" class="form-control ">
                            <option value="">Please Select Class</option>
                            <option value="10th">10th</option>
                            <option value="12th">12th</option>
                            <option value="ITI">ITI</option>
                            <option value="diploma">Diploma</option>
                            <option value="UG">UG (Graduation)</option>
                            <option value="pg">PG (Post Graduation)</option>
                            <option value="other">Other</option>
                        </select>   
                    </div>
                    <div class="form-group">
                        <label for="name">Name of Institute</label>
                        <input type="text" name="university_name" id="university_name" value="" class="form-control <?php echo (form_error('university_name') != "") ? 'is-invalid' : '';?>"
                            placeholder="">
                        <p class="invalid-feedback"><?php echo strip_tags(form_error('university_name'));?></p>    
                    </div>     
                    <div class="form-group">
                        <label for="faculity" class="form-label">Type of institute</label>
                        <select name="institute_type" class="form-control ">
                            <option value="">Please Select Class</option>
                            <option value="private">Private</option>
                            <option value="goverment">Goverment</option>
                        </select>   
                    </div>
                    <div class="form-groups">State of study</label>
                        <input type="text" name="state" id="university_name" value="" class="form-control <?php echo (form_error('university_name') != "") ? 'is-invalid' : '';?>"
                            placeholder="">
                        <p class="invalid-feedback"><?php echo strip_tags(form_error('university_name'));?></p>    
                    </div>
                    <div class="form-group" id="startYear">
                        <label for="name">Admission Year</label>
                        <input type="text" name="start_year" id="start_year" value="" class="form-control <?php echo (form_error('start_year') != "") ? 'is-invalid' : '';?>"
                            placeholder="">
                        <p class="invalid-feedback"><?php echo strip_tags(form_error('start_year'));?></p>
                    </div>
                    <div class="form-group">
                        <label for="name">Passing Year</label>
                        <input type="text" name="passing_year" id="passing_year" value="" class="form-control <?php echo (form_error('passing_year') != "") ? 'is-invalid' : '';?>"
                            placeholder="">
                        <p class="invalid-feedback"><?php echo strip_tags(form_error('passing_year'));?></p>
                    </div>
                    <div class="form-groups" id="branch"><label>Branch</label>
                        <input type="text" name="branch" id="branch" value="" class="form-control <?php echo (form_error('university_name') != "") ? 'is-invalid' : '';?>"
                            placeholder="">
                        <p class="invalid-feedback"><?php echo strip_tags(form_error('university_name'));?></p>    
                    </div>
                    <div class="form-group" id="marks">
                        <label for="name">Percentage</label>
                        <input type="text" name="percentage" id="percentage" value="" class="form-control <?php echo (form_error('percentage') != "") ? 'is-invalid' : '';?>"
                            placeholder="">
                        <p class="invalid-feedback"><?php echo strip_tags(form_error('percentage'));?></p>    
                    </div>
                    
                    <div class="form-group" id="backlog">
                        <label for="faculity" class="form-label">No backlog and Compartment</label>
                        <input type="text" name="backlog" id="backlog" value=""  class = "form-control">
                        <!-- <select name="backlog" class="form-control ">

                            <option value="">Please Select an option</option>
                            <option value="yes">yes</option>
                            <option value="no">no</option>
                        </select>    -->
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block btn-primary">SUBMIT</button>
                    </div>
                </div>
                <?php }}?>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById("marks").style.display = 'none';
    document.getElementById("backlog").style.display = 'none';
    document.getElementById("startYear").style.display = 'none';
    document.getElementById("branch").style.display = 'none';


    document.getElementById('classGrade').onchange = function() {
        var classvalue = this.value;

        if(classvalue == "10th"){
            document.getElementById("marks").style.display = 'block';
            document.getElementById("backlog").style.display = 'none';
            document.getElementById("startYear").style.display = 'none';
            document.getElementById("branch").style.display = 'block';
        }else if(classvalue == "12th"){
            document.getElementById("marks").style.display = 'block';
            document.getElementById("backlog").style.display = 'none';
            document.getElementById("startYear").style.display = 'block';
            document.getElementById("branch").style.display = 'block';
        }else if(classvalue == "ITI" || classvalue == "diploma" || classvalue == "UG" || classvalue == "pg"){
            document.getElementById("marks").style.display = 'block';
            document.getElementById("backlog").style.display = 'block';
            document.getElementById("startYear").style.display = 'block';
            document.getElementById("branch").style.display = 'block';
        }else{
            document.getElementById("marks").style.display = 'none';
            document.getElementById("backlog").style.display = 'none';
            document.getElementById("startYear").style.display = 'none';
            document.getElementById("branch").style.display = 'none';
        }
    }
    
</script>