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
        } else if ($this->session->flashdata('error')) {
            echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
        }
        ?>
        <h3>Payment Getway Setting</h3>
        
        <form method="post" action="<?php echo base_url()?>admin/paymentgetway/update" >
            <div class="row">
                <div class="col-md-12">
                <?php foreach($website_data as $data){?>
                    <div class="box">   
                        <label for="name" class="form-label">Merchant Id <span style="color:red;">*</span></label>
                        <input type="text" name="merchant_id"  placeholder="Enter Merchant Id" value="<?php echo $data['merchant_id']?>"> 

                        <label for="name" class="form-label">Merchant Key <span style="color:red;">*</span></label>
                        <input type="text"  name="merchant_key"   placeholder="Enter Merchant Key" value="<?php echo $data['merchant_key']?>">

                        <label for="name" class="form-label">Payment Url <span style="color:red;">*</span></label>
                        <input type="text" name="payment_url" placeholder="Enter Payment Url" value="<?php echo $data['payment_url']?>"> 
  
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