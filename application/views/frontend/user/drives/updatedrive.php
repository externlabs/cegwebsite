<!-- <script src="//cdn.ckeditor.com/4.20.2/basic/ckeditor.js"></script>

<style>
    #cke_18{
        display:none;
    }
</style> -->

<?php 
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
        $url = "https://";   
    else  
        $url = "http://";   
        // Append the host(domain name, ip) to the URL.   
        $url.= $_SERVER['HTTP_HOST'];   
  
    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];   
    $driveId = basename($url);
   
    $drive_data = $this->db->where('drive_id',$driveId)->get('drive')->result_array();
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
                    Update Drive
                </div>
                <?php foreach($drive_data as $value){?>
                <form action="<?php echo base_url().'frontend/user/drives/updatedrive/update'?>" method="post">
                            <div class="card-body register">
                                <p class="card-text">Please fill with your details</p>
                                <div class="form-group">
                                    <label for="name" class="form-label">Post / Designation</label>
                                    <input type="text" name="designation" class="form-control" placeholder="Enter Designation" value="<?php echo $value['designation']?>">   
                                </div>

                                <div class="form-group">
                                    <label for="name" class="form-label">No. Of Post</label>
                                    <input type="text" name="post_no" class="form-control" placeholder="Enter No. Of Post" value="<?php echo $value['post_no']?>">   
                                </div>

                                <div class="form-group">
                                    <label for="name" class="form-label">Vanue / Location</label>
                                    <input type="text" name="vanue" class="form-control" placeholder="Enter Vanue" value="<?php echo $value['vanue']?>">   
                                </div>

                                <div class="form-group">
                                    <label for="name" class="form-label">Job Location</label>
                                    <input type="text" name="job_location" class="form-control" placeholder="Enter Job Location" value="<?php echo $value['job_location']?>">   
                                </div>

                                <div class="form-group">
                                    <label for="name" class="form-label">Eligibility</label>
                                    <textarea name="eligibility" id="" cols="30" rows="5" class="form-control"><?php echo $value['eligibility']?></textarea>
                                    <!-- <input type="text" name="eligibility" class="form-control" placeholder="Enter Eligibility">    -->
                                </div>

                                <div class="form-group">
                                    <label for="name" class="form-label">Job Description</label>
                                    <textarea name="job_desc" id="" cols="30" rows="5" class="form-control"><?php echo $value['job_desc']?></textarea>
                                    <!-- <input type="text" name="job_location" class="form-control" placeholder="Enter Job Location">    -->
                                </div>
                                <div class="form-group">
                                    <label for="name" class="form-label">Drive Method</label>
                                    <select name="drive_method" id="" class="form-control">
                                        <option value="">Select Drive Method</option>
                                        <option value="online" <?php if($value['drive_method'] == 'online'){echo "selected";}else{echo '';}?>>Online</option>
                                        <option value="offline" <?php if($value['drive_method'] == 'offline'){echo "selected";}else{echo '';}?>>Offline</option>
                                    </select>
                                    <!-- <input type="date" name="drive_date" class="form-control" placeholder="Enter Designation">    -->
                                </div>
                                <div class="form-group">
                                    <label for="name" class="form-label">Drive Date</label>
                                    <input type="date" name="drive_date" class="form-control" placeholder="Enter Designation" value="<?php echo $value['drive_date']?>">   
                                </div>

                                <div class="form-group">
                                    <label for="name" class="form-label">Last Date to apply</label>
                                    <input type="date" name="last_date" class="form-control" placeholder="Enter Designation" value="<?php echo $value['last_date']?>">   
                                </div>

                                <div class="form-group">
                                    <label for="name" class="form-label">Start Date to apply</label>
                                    <input type="date" name="start_date" class="form-control" placeholder="Enter Designation" value="<?php echo $value['start_date']?>">   
                                </div>


                                <div class="form-group">
                                    <label for="name" class="form-label">Salary</label>
                                    <textarea name="salary" id="" cols="30" rows="5" class="form-control"><?php echo $value['salary']?></textarea>
                                    <!-- <input type="date" name="drive_date" class="form-control" placeholder="Enter Designation">    -->
                                </div>

                                <div class="form-group">
                                    <label for="name" class="form-label">Department</label>
                                    <input type="text" name="department" class="form-control" placeholder="Enter Department" value="<?php echo $value['department']?>">   
                                </div>

                                <div class="form-group">
                                    <label for="name" class="form-label">Benefits</label>
                                    <textarea name="benefits" id="" cols="30" rows="5" class="form-control"><?php echo $value['benefits']?></textarea>
                                    <!-- <input type="date" name="drive_date" class="form-control" placeholder="Enter Designation">    -->
                                </div>

                                <div class="form-group">
                                    <label for="name" class="form-label">Selection Process</label>
                                    <textarea name="selection_process" id="" cols="30" rows="5" class="form-control"><?php echo $value['selection_process']?></textarea>
                                    <!-- <input type="date" name="drive_date" class="form-control" placeholder="Enter Designation">    -->
                                </div>

                                <div class="form-group">
                                    <label for="name" class="form-label">Others</label>
                                    <textarea name="other" id="editor1" cols="30" rows="5" class="form-control"><?php echo $value['other']?></textarea>
                                    <!-- <input type="date" name="drive_date" class="form-control" placeholder="Enter Designation">    -->
                                </div>
                                <input type="hidden" name="drive_id" value="<?php echo $value['drive_id']?>">

                                <div class="form-group">
                                    <button class="btn btn-block btn-primary">Add Drive</button>
                                </div>

                            </div>
                        </form>
                        <?php }?>
                    </div>
                    
                
            </div>
        </div>
    </div>


<!-- <script>
    CKEDITOR.replace( 'editor1' );
</script> -->