

<link rel="stylesheet" href="<?php echo base_url()?>https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<script src="<?php echo base_url()?>https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="<?php echo base_url()?>https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


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
                    Add Drive
                </div>
                <form action="<?php echo base_url().'frontend/user/drives/adddrive/add'?>" method="post">
                            <div class="card-body register">
                                <p class="card-text">Please fill with your details</p>
                                <div class="form-group">
                                    <label for="name" class="form-label">Post / Designation <span style="color:red;">*</span></label>
                                    <input type="text" name="designation" maxlength="100" class="form-control num" placeholder="Enter Designation">   
                                </div>

                                <div class="form-group">
                                    <label for="name" class="form-label">No. Of Post <span style="color:red;">*</span></label>
                                    <input type="number" name="post_no" class="form-control"  maxlength="3" placeholder="Enter No. Of Post">   
                                </div>

                                <div class="form-group">
                                    <label for="name" class="form-label">Vanue / Location <span style="color:red;">*</span></label>
                                    <input type="text" name="vanue" class="form-control" maxlength="255" placeholder="Enter Vanue">   
                                </div>

                                <div class="form-group">
                                    <label for="name" class="form-label">Job Location <span style="color:red;">*</span></label>
                                    <input type="text" name="job_location"  maxlength="255" class="form-control" placeholder="Enter Job Location">   
                                </div>

                                <div class="form-group">
                                    <label for="name" class="form-label">Eligibility <span style="color:red;">*</span></label>
                                    <textarea name="eligibility"  id="" cols="30" rows="5" class="form-control"></textarea>
                                  
                                </div>

                                <div class="form-group">
                                    <label for="name" class="form-label">Job Description <span style="color:red;">*</span></label>
                                    <textarea name="job_desc" id="" cols="30" rows="5" class="form-control"></textarea>
                                     
                                </div>
                                <div class="form-group">
                                    <label for="name" class="form-label">Drive Method <span style="color:red;">*</span></label>
                                    <select name="drive_method" id="" class="form-control">
                                        <option value="">Select Drive Method</option>
                                        <option value="online">Online</option>
                                        <option value="offline">Offline</option>
                                    </select>
                                  
                                </div>
                                <div class="form-group">
                                    <label for="name" class="form-label">Drive Date <span style="color:red;">*</span></label>
                                    
                                    <input type="date" name="drive_date" class="form-control" min="<?php echo date('Y-m-d');?>" placeholder="Enter Designation"> 
                                    
                                </div>

                                <div class="form-group">
                                    <label for="name" class="form-label">Start Date to apply <span style="color:red;">*</span></label>
                                    
                                    <input type="date" name="start_date" class="form-control" min="<?php echo date('Y-m-d');?>"  placeholder="Enter Designation">
                                    
                                </div>

                                <div class="form-group">
                                    <label for="name" class="form-label">Last Date to apply <span style="color:red;">*</span></label>
                                    <input type="date" name="last_date" class="form-control" min="<?php echo date('Y-m-d');?>"  placeholder="Enter Designation">
                                    
                                     
                                </div>


                                <div class="form-group">
                                    <label for="name" class="form-label">Salary <span style="color:red;">*</span></label>
                                    <textarea name="salary" id="" cols="30" rows="5"  class="form-control"></textarea>
                               
                                </div>

                                <div class="form-group">
                                    <label for="name" class="form-label">Department <span style="color:red;">*</span></label>
                                    <input type="text" name="department" class="form-control"  maxlength="50"  placeholder="Enter Department">   
                                </div>

                                <div class="form-group">
                                    <label for="name" class="form-label">Benefits <span style="color:red;">*</span></label>
                                    <textarea name="benefits" id="" cols="30" rows="5" class="form-control"></textarea>
                                 
                                </div>

                                <div class="form-group">
                                    <label for="name" class="form-label">Selection Process <span style="color:red;">*</span></label>
                                    <textarea name="selection_process" id="" cols="30" rows="5" class="form-control"></textarea>
                                   
                                </div>

                                <div class="form-group">
                                    <label for="name" class="form-label">Others</label>
                                    <textarea name="other" id="editor1" cols="30" rows="5" class="form-control"></textarea>
                                   
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-block btn-primary">Add Drive</button>
                                </div>

                            </div>
                    </form>
        </div>
    </div>
</div>





    
