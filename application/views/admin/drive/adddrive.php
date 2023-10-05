<link href="<?php echo base_url(); ?>admin/assets/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>admin/assets/css/core.css" rel="stylesheet" type="text/css" />

<script src="<?php echo base_url(); ?>admin/assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('admin/assets/js/jquery/jquery.min.js')?>"></script>
<script src="<?php echo base_url('admin/assets/js/jquery/jquery-3.6.0.min.js')?>"></script>

<style>
    .new-post {
        width: 100%;
        height: auto;
        padding-top: 2rem;
        padding-bottom: 2rem;

    }

    .new-post .box {
        width: 100%;
        height: auto;
        background-color: white;
        box-shadow: 0 3px 3px -2px rgb(0 0 0 / 40%);
        border: 1px solid #cdcdcd;
        padding-top: 2rem;
        padding-bottom: 2rem;
        padding-left: 1rem;
        padding-right: 1rem;
        margin-bottom: 2rem;
    }

    .new-post input[type="text"],
    input[type="file"],
    select,
    input[type="email"],input[type="number"],
    input[type="date"],
    textarea {
        width: 100%;
        height: auto;
        padding-top: .5rem;
        padding-bottom: .5rem;
        padding-left: 1rem;
        border: 1px solid #cdcdcd;
        margin-bottom: 1rem;
    }

    .new-post button {
        width: 10rem;
        height: auto;
        padding-top: .6rem;
        padding-bottom: .6rem;
        color: white;
        background-color: rgb(239, 69, 84);
        outline: none;
        border: none;
        transition: .5s;
    }

    .new-post button:hover {
        opacity: .7;

    }

    .new-post p {
        margin-top: -.5rem;
        color: #666;
        font-size: 12px;
        font-weight: 300;
        font-style: italic;
    }
</style>

<?php 
    $company_data = $this->db->get('company')->result_array();
?>

<div class="new-post">
    <div class="container">
        <?php
        if ($this->session->flashdata('success')) {
            echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
            unset($_SESSION['success']);
        } else if ($this->session->flashdata('error')) {
            echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
            unset($_SESSION['error']);
        }
        ?>
        <h3>Add Drive</h3>
        <form method="post" action="<?php echo base_url()?>admin/drive/adddrive/add_drive" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <label for="name" class="form-label">Select Company <span style="color:red;">*</span></label>
                        <select name="company_id" id="" >
                            <option value="">Select Company</option>
                            <?php foreach($company_data as $value){?>
                            <option value="<?php echo $value['company_id']?>"><?php echo $value['company_name']?></option>
                            <?php }?>
                        </select>   
                        <label for="name" class="form-label">Post / Designation <span style="color:red;">*</span></label>
                        <input type="text" name="designation" maxlength="100" placeholder="Enter Designation"> 
                        <label for="name" class="form-label">No. Of Post <span style="color:red;">*</span></label>
                        <input type="number" class="num" name="post_no" maxlength="3"  placeholder="Enter No. Of Post">
                        <label for="name" class="form-label">Vanue / Location <span style="color:red;">*</span></label>
                        <input type="text" name="vanue" maxlength="255"  placeholder="Enter Vanue"> 
                        <label for="name" class="form-label">Job Location <span style="color:red;">*</span></label>
                        <input type="text" name="job_location" maxlength="255" placeholder="Enter Job Location">  
                        <label for="name" class="form-label">Eligibility <span style="color:red;">*</span></label>
                        <textarea name="eligibility" id="" cols="30" rows="5" ></textarea> 
                        <label for="name" class="form-label">Job Description <span style="color:red;">*</span></label>
                        <textarea name="job_desc" id="" cols="30" rows="5" ></textarea> 
                        <label for="name" class="form-label">Drive Method <span style="color:red;">*</span></label>
                        <select name="drive_method" id="" >
                            <option value="">Select Drive Method</option>
                            <option value="online">Online</option>
                            <option value="offline">Offline</option>
                        </select>
                        <label for="name" class="form-label">Drive Date <span style="color:red;">*</span></label>
                        <input type="date" name="drive_date"  placeholder="Enter Designation" min="<?php echo date('Y-m-d');?>"> 
                        <label for="start_date">Start Date: <span style="color:red;">*</span></label>
                        <input type="date" id="start_date" name="start_date" min="<?php echo date('Y-m-d');?>">
                        <label for="last_date">Last Date: <span style="color:red;">*</span></label>
                        <input type="date" id="last_date" name="last_date" min="<?php echo date('Y-m-d');?>">
                      
                        <label for="name" class="form-label">Salary <span style="color:red;">*</span></label>
                        <textarea name="salary" id="" cols="30" rows="5" ></textarea>
                        <label for="name" class="form-label">Department <span style="color:red;">*</span></label>
                        <input type="text" name="department" maxlength="50"  placeholder="Enter Department">
                        <label for="name" class="form-label">Benefits <span style="color:red;">*</span></label>
                        <textarea name="benefits" id="" cols="30" rows="5" ></textarea> 
                        <label for="name" class="form-label">Selection Process <span style="color:red;">*</span></label>
                        <textarea name="selection_process" id="" cols="30" rows="5" ></textarea>
                        <label for="name" class="form-label">Others</label>
                        <textarea name="other" id="editor1" cols="30" rows="5" ></textarea>
                        <button name="formSubmit">Add drive</button>
                    </div>
                </div>
            </div>
        </form>
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