<link href="<?php echo base_url(); ?>admin/assets/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>admin/assets/css/core.css" rel="stylesheet" type="text/css" />

<script src="<?php echo base_url(); ?>admin/assets/js/jquery.dataTables.min.js"></script>



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

<div class="new-post">
    <div class="container">
        <?php
        if ($this->session->flashdata('success')) {
            echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
        } else if ($this->session->flashdata('error')) {
            echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
        }
        ?>
        <h3>Edit Training</h3>
        <?php if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'ON'){
                    $url = "https://";
                }else{
                    $url = "http://";
                }
                $url.= $_SERVER['HTTP_HOST'];
                $url.= $_SERVER['REQUEST_URI'];
               
            $parts = basename($url);
            
            $rerfe = explode("=",$parts);
                
            $traing_list = $this->db->where('training_id',$rerfe[1])->get('training')->result_array();?>
             <?php foreach($traing_list as $value){?>
                <form method="post" action="<?php echo base_url()?>admin/training/edittraining/update_traning" enctype="multipart/form-data">
                <div class="row">
                <div class="col-md-12">
                    <div class="box">  
                    <label for="name" class="form-label">Training Name <span style="color:red;">*</span></label>
                    <input type="text" name="training_name" class="form-control"  maxlength="150" placeholder="Enter Training Name" value="<?php echo $value['training_name']?>" required> 
                    <label for="name" class="form-label">Registration Last Date  <span style="color:red;">*</span></label>
                    <input type="date" name="registration_last_date" class="form-control" placeholder="e.g: industrial-training" value="<?php echo $value['registration_last_date']?>" required min="<?php echo date('Y-m-d');?>">
                    <label for="name" class="form-label">Training Start Date <span style="color:red;">*</span></label>
                    <input type="date" name="start_date" class="form-control" placeholder="e.g: industrial-training" value="<?php echo $value['start_date']?>" required min="<?php echo date('Y-m-d');?>"> 
                    <label for="name" class="form-label">Training End Date <span style="color:red;">*</span></label>
                    <input type="date" name="end_date" class="form-control" placeholder="e.g: industrial-training"  value="<?php echo $value['end_date']?>" required min="<?php echo date('Y-m-d');?>"> 
                    <label for="name" class="form-label">Training Description <span style="color:red;">*</span></label>
                    <textarea name="training_desc" id="" class="form-control" cols="30" rows="10" placeholder="Enter Training Description" value="<?php echo $value['training_desc']?>"></textarea>
                    <input type="hidden" name="training_id " value="<?php echo $value['training_id ']?>">
                    <button name="formSubmit">Update Training</button>

                    </div>
                </div>
            </div>
        </form>
        <?php }?>
    </div>
</div>







