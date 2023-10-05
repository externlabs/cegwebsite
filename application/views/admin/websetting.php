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
    $website_data = $this->db->get('websetting')->result_array();
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
        <h3>Website Setting</h3>
        
        <form method="post" action="<?php echo base_url()?>admin/websetting/update" >
            <div class="row">
                <div class="col-md-12">
                <?php foreach($website_data as $data){?>
                    <div class="box">   
                        <label for="name" class="form-label">Website Name <span style="color:red;">*</span></label>
                        <input type="text" name="web_name"  placeholder="Enter Website Name" value="<?php echo $data['web_name']?>"> 

                        <label for="name" class="form-label">Official Email <span style="color:red;">*</span></label>
                        <input type="email"  name="email"   placeholder="Enter Official Email" value="<?php echo $data['email']?>">

                        <label for="name" class="form-label">Office Address <span style="color:red;">*</span></label>
                        <input type="text" name="address" placeholder="Enter Office Address" value="<?php echo $data['address']?>"> 

                        <label for="name" class="form-label">Office Contact No. <span style="color:red;">*</span></label>
                        <input type="number" class="num" name="contact" placeholder="Enter Contact No." maxlength="10" value="<?php echo $data['contact']?>">  
                        <input type="hidden" name="id" value="<?php echo $data['id']?>">
                        <button name="formSubmit">Update Details</button>
                    </div>
                    <?php }?>
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