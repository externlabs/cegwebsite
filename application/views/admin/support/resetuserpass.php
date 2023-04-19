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
    input[type="file"],input[type="number"],input[type="email"],
    select,
    textarea, .uinpuuu {
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

<?php $company_list = $this->db->get('company')->result_array(); ?>

<div class="new-post">
    <div class="container">
        <?php
        if ($this->session->flashdata('success')) {
            echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
        } else if ($this->session->flashdata('error')) {
            echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
        }
        ?>
        <h3>Reset Point Of Contact Password</h3>
        <form method="post" action="<?php echo base_url()?>admin/support/resetuserpass/reset" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Select Company <span style="color:red;">*</span></label>
                                <select name="" id="companyId" required>
                                    <option value="">Select Company</option>
                                    <?php foreach($company_list as $company){?>
                                        <option value="<?php echo $company['company_id']?>"><?php echo $company['company_name']?> (<?php echo $company['company_email']?>)</option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Select Point Of Contact <span style="color:red;">*</span></label>
                                <select name="poc_id" id="pocDeatails" required>
                                    <option value="">Select Point Of Contact</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">New Password<span style="color:red;">*</span></label>
                                <input type="text" placeholder="Enter New Password" name="new_pass" required>
                            </div>
                        </div>
                        <button name="formSubmit">Reset</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>

    $("#companyId").change(function(){
        var companyId = $('#companyId').val();

        if(companyId != null){
            $.ajax({
                url:'<?php echo base_url('admin/support/resetuserpass/getpoc');?>',
                type:'POST',
                data: {companyId:companyId},
                success:function(data){
                    var parseData = JSON.parse(data);
                    if(parseData.status == "Success"){
                        for(var i=0; i<parseData.pocdeatils.length; i++){
                            $('#pocDeatails').append(`<option value="${parseData.pocdeatils[i].poc_id}">${parseData.pocdeatils[i].poc_name} (${parseData.pocdeatils[i].poc_email})</option>`);
                        }
                    }else{
                        $('#pocDeatails').append(`<option value="">No Data Found!</option>`);
                    }
                }
            });
        }else{
            alert("Please Select Company");
        }
    });
</script>