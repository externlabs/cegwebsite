

<?php $qualification_data = $this->db->where('student_id',$_SESSION['user_id'])->get('qualification')->result_array();

    if($qualification_data == Array()){
        $select_box = '<select name="class" id="classGrade" class="form-control ">
                            <option value="">Please Select Class</option>
                            <option value="10th">10th</option>
                        </select> ';
    }else{
        $select_box = '<select name="class" id="classGrade" class="form-control ">
                            <option value="">Please Select Class</option>
                            
                            <option value="12th">12th</option>
                            <option value="ITI">ITI</option>
                            <option value="diploma">Diploma</option>
                            <option value="UG">UG (Graduation)</option>
                            <option value="pg">PG (Post Graduation)</option>
                            <option value="other">Other</option>
                        </select> ';
    }

?>



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
            <form action="<?php echo base_url().'frontend/user/qualification/add'?>" method="post">
                <div class="card-body register">
                    <p class="card-text">Please fill with your details</p>
                    <div class="form-group">
                        <label for="faculity" class="form-label">Select Class <span style="color:red;">*</span></label>
                        <?php echo $select_box?>
                    </div>
                    <div class="form-group" id="course_name">
                        <label for="name">Course Name <span style="color:red;">*</span></label>
                        <input type="text" name="course_name" id="course_name" value="" class="form-control <?php echo (form_error('course_name') != "") ? 'is-invalid' : '';?>"
                            placeholder="">
                        <p class="invalid-feedback"><?php echo strip_tags(form_error('course_name'));?></p>    
                    </div> 
                    <div class="form-group">
                        <label for="name">Name of Institute <span style="color:red;">*</span></label>
                        <input type="text" name="university_name" id="university_name" value="" class="form-control <?php echo (form_error('university_name') != "") ? 'is-invalid' : '';?>"
                            placeholder="">
                        <p class="invalid-feedback"><?php echo strip_tags(form_error('university_name'));?></p>    
                    </div>     
                    <div class="form-group">
                        <label for="faculity" class="form-label">Type of institute <span style="color:red;">*</span></label>
                        <select name="institute_type" class="form-control ">
                            <option value="">Please Select Class</option>
                            <option value="private">Private</option>
                            <option value="goverment">Goverment</option>
                        </select>   
                    </div>
                    <div class="form-groups">State of study <span style="color:red;">*</span></label>
                        <input type="text" name="state" id="university_name" value="" class="form-control <?php echo (form_error('university_name') != "") ? 'is-invalid' : '';?>"
                            placeholder="">
                        <p class="invalid-feedback"><?php echo strip_tags(form_error('university_name'));?></p>    
                    </div>
                    <div class="form-group" id="startYear">
                        <label for="name">Admission Year <span style="color:red;">*</span></label>
                        <input type="number" name="start_year" id="start_year" value="" min="1900" max="<?= date('Y') ?>" class="form-control <?php echo (form_error('start_year') != "") ? 'is-invalid' : '';?>"
                            placeholder="">
                        <p class="invalid-feedback"><?php echo strip_tags(form_error('start_year'));?></p>
                    </div>
                    <div class="form-group" id="passingYear">
                        <label for="name">Passing Year <span style="color:red;">*</span></label>
                        <input type="number" name="passing_year" id="passing_year" value="" min="start_year" max="<?= date('Y') ?>" class="form-control <?php echo (form_error('passing_year') != "") ? 'is-invalid' : '';?>"
                            placeholder="">
                        <p class="invalid-feedback"><?php echo strip_tags(form_error('passing_year'));?></p>
                    </div>
                    <div class="form-groups" id="branch"><label>Branch / Subject <span style="color:red;">*</span></label>
                        <input type="text" name="branch" id="branch" value="" class="form-control <?php echo (form_error('university_name') != "") ? 'is-invalid' : '';?>"
                            placeholder="">
                        <p class="invalid-feedback"><?php echo strip_tags(form_error('university_name'));?></p>    
                    </div>
                    <div class="form-group" id="marks">
                        <label for="name">Percentage <span style="color:red;">*</span></label>
                        <input type="number" name="percentage" id="percentage" value="" class="form-control <?php echo (form_error('percentage') != "") ? 'is-invalid' : '';?>"
                            placeholder="">
                        <p class="invalid-feedback"><?php echo strip_tags(form_error('percentage'));?></p>    
                    </div>
                    
                    <div class="form-group" id="backlog">
                        <label for="faculity" class="form-label">No backlog and Compartment <span style="color:red;">*</span></label>
                        <input type="number" name="backlog" id="backlog" value=""  class = "form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block btn-primary mt-4">SUBMIT</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById("marks").style.display = 'none';
    document.getElementById("backlog").style.display = 'none';
    document.getElementById("startYear").style.display = 'none';
    document.getElementById("branch").style.display = 'none';
    document.getElementById("course_name").style.display = 'none';
    document.getElementById("passingYear").style.display = 'none';




    document.getElementById('classGrade').onchange = function() {
        var classvalue = this.value;
        if(classvalue == "10th"){
            document.getElementById("marks").style.display = 'block';
            document.getElementById("backlog").style.display = 'block';
            document.getElementById("startYear").style.display = 'block';
            document.getElementById("branch").style.display = 'block';
            document.getElementById("course_name").style.display = 'none';
            document.getElementById("passingYear").style.display = 'block';

        }else if(classvalue == "12th"){
            document.getElementById("marks").style.display = 'block';
            document.getElementById("backlog").style.display = 'block';
            document.getElementById("startYear").style.display = 'block';
            document.getElementById("branch").style.display = 'block';
            document.getElementById("course_name").style.display = 'none';
            document.getElementById("passingYear").style.display = 'block';
        }else if(classvalue == "ITI" || classvalue == "diploma" || classvalue == "UG" || classvalue == "pg"){
            document.getElementById("marks").style.display = 'block';
            document.getElementById("backlog").style.display = 'block';
            document.getElementById("startYear").style.display = 'block';
            document.getElementById("branch").style.display = 'block';
            document.getElementById("passingYear").style.display = 'block';
            document.getElementById("course_name").style.display = 'none';

        }else if(classvalue == "other"){
            document.getElementById("marks").style.display = 'block';
            document.getElementById("backlog").style.display = 'block';
            document.getElementById("startYear").style.display = 'block';
            document.getElementById("branch").style.display = 'block';
            document.getElementById("passingYear").style.display = 'block';
            document.getElementById("course_name").style.display = 'block';
        }        
        else{
            document.getElementById("marks").style.display = 'none';
            document.getElementById("backlog").style.display = 'none';
            document.getElementById("startYear").style.display = 'none';
            document.getElementById("branch").style.display = 'none';
            document.getElementById("passingYear").style.display = 'none';
        }
    }
    
</script>

<script>
    $(document).ready(function() {
        $(".num").keypress(function() {
            if ($(this).val().length == $(this).attr("maxlength")) {
                return false;
            }
        });
    });
    </script>