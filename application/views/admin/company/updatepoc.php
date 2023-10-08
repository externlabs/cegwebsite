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
    .datalist,
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
<?php if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'ON'){
                    $url = "https://";
                }else{
                    $url = "http://";
                }
                $url.= $_SERVER['HTTP_HOST'];
                $url.= $_SERVER['REQUEST_URI'];
               
            $parts = basename($url);
            
            $rerfe = explode("=",$parts);

            $poc_data = $this->db->where('poc_id',$rerfe[1])->get('company_poc')->result_array();
            $company_list = $this->db->get('company')->result_array();

                
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
        <h3>Edit Point Of Contact</h3>
        <form method="post" action="<?php echo base_url()?>admin/company/updatepoc/update" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">
                    <?php  foreach($poc_data as $value){?>
                    <div class="box">
                        
                        <label class="form-label">Name of contact person <span style="color:red;">*</span></label>
                        <input type="text" name="name" maxlength="50" placeholder="Enter Full Name" required value="<?php echo $value['poc_name']?>">
                        <label class="form-label">Designation <span style="color:red;">*</span></label>
                        <input type="text" name="designation" maxlength="50" placeholder="Enter Designation" required value="<?php echo $value['designation']?>">
                        <label class="form-label">Mobile No. <span style="color:red;">*</span></label>
                        <input type="number" name="phone" class="num" maxlength="10" placeholder="Enter Mobile No." required value="<?php echo $value['phone']?>">
                        <label class="form-label">Alternate Mobile No.</label>
                        <input type="number" name="alternate_no" class="num" maxlength="10" placeholder="Enter Alternate Mobile No." value="<?php echo $value['alternate_no']?>">
                        <label class="form-label">Email <span style="color:red;">*</span></label>
                        <input type="email" name="email" maxlength="50" placeholder="Enter Email" required value="<?php echo $value['poc_email']?>" readonly>
                        <input type="hidden" name="poc_id" value="<?php echo $value['poc_id']?>" required>
                        <button name="formSubmit">Update Poc</button>
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