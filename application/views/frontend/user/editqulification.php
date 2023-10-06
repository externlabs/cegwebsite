

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
                Edit Qualification
            </div>
            <form action="<?php echo base_url().'frontend/user/editqualification/update_edit'?>" method="post">
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
             <?php foreach( $fetch_content as $value){ if($value['qualification_id']==$rerfe[1]){?>
            
            
             
                <div class="card-body register">
                    <p class="card-text">Please fill with your details</p>
                    <div class="form-group">
                    <label for="name" class="form-label">Select Class<span style="color:red;">*</span></label>
                    <input type="text" name="class"  class="form-control" placeholder="" value="<?php echo $value['class']?>" readonly>  
                    </div>
                    <?php if($value['class'] == "other"){?>
                    <div class="form-group" id="course_name">
                        <label for="name">Course Name  <span style="color:red;">*</span></label>
                        <input type="text" name="course_name" id="course_name" value="<?php echo $value['course_name']?>" class="form-control <?php echo (form_error('course_name') != "") ? 'is-invalid' : '';?>"
                            placeholder="">
                        <p class="invalid-feedback"><?php echo strip_tags(form_error('course_name'));?></p>    
                    </div> 
                    <?php }?>
                    <div class="form-group">
                        <label for="name">Name of Institute   <span style="color:red;">*</span></label>
                        <input type="text" name="university_name" id="university_name" value="<?php echo $value['university_name']?>" class="form-control <?php echo (form_error('university_name') != "") ? 'is-invalid' : '';?>"
                            placeholder="">
                        <p class="invalid-feedback"><?php echo strip_tags(form_error('university_name'));?></p>    
                    </div>     
                    <div class="form-group">
                        <label for="faculity" class="form-label">Type of institute  <span style="color:red;">*</span></label>
                        <select name="institute_type" class="form-control ">
                            <option value="">Please Select Class</option>
                            <option value="private" <?php if($value['institute_type'] == "private"){ echo "selected";}else{echo "";}?>>Private</option>
                            <option value="goverment" <?php if($value['institute_type'] == "goverment"){ echo "selected";}else{echo "";}?>>Goverment</option>
                        </select>   
                    </div>
                    <div class="form-groups">State of study  <span style="color:red;">*</span></label>
                        <input type="text" name="state" id="university_name" value="<?php echo $value['state']?>" class="form-control <?php echo (form_error('university_name') != "") ? 'is-invalid' : '';?>"
                            placeholder="">
                        <p class="invalid-feedback"><?php echo strip_tags(form_error('university_name'));?></p>    
                    </div>
                    <div class="form-group" id="startYear">
                        <label for="name">Admission Year  <span style="color:red;">*</span></label>
                        <input type="number" name="start_year" id="start_year" value="<?php echo $value['start_year']?>" class="form-control <?php echo (form_error('start_year') != "") ? 'is-invalid' : '';?>"
                            placeholder="">
                        <p class="invalid-feedback"><?php echo strip_tags(form_error('start_year'));?></p>
                    </div>
                    <div class="form-group">
                        <label for="name">Passing Year  <span style="color:red;">*</span></label>
                        <input type="number" name="passing_year" id="passing_year" value="<?php echo $value['passing_year']?>" class="form-control <?php echo (form_error('passing_year') != "") ? 'is-invalid' : '';?>"
                            placeholder="">
                        <p class="invalid-feedback"><?php echo strip_tags(form_error('passing_year'));?></p>
                    </div>
                    <div class="form-groups" id="branch"><label>Branch / Subject  <span style="color:red;">*</span></label>
                        <input type="text" name="branch" id="branch" value="<?php echo $value['branch']?>" class="form-control <?php echo (form_error('university_name') != "") ? 'is-invalid' : '';?>"
                            placeholder="">
                        <p class="invalid-feedback"><?php echo strip_tags(form_error('university_name'));?></p>    
                    </div>
                    <div class="form-group" id="marks">
                        <label for="name">Percentage  <span style="color:red;">*</span></label>
                        <input type="number" name="percentage" id="percentage" value="<?php echo $value['percentage']?>" class="form-control <?php echo (form_error('percentage') != "") ? 'is-invalid' : '';?>"
                            placeholder="">
                        <p class="invalid-feedback"><?php echo strip_tags(form_error('percentage'));?></p>    
                    </div>
                    
                    <div class="form-group" id="backlog">
                        <label for="faculity" class="form-label">No backlog and Compartment  <span style="color:red;">*</span></label>
                        <input type="number" name="backlog" id="backlog" value="<?php echo $value['backlog']?>"  class = "form-control">
                    </div>
                    <input type="hidden" name="qualification_id" value="<?php echo $value['qualification_id']?>">
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
    $(document).ready(function() {
        $(".num").keypress(function() {
            if ($(this).val().length == $(this).attr("maxlength")) {
                return false;
            }
        });
    });
    </script>






