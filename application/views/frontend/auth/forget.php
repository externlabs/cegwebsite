
<div class="container mt-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card-body register">
            <?php
        if ($this->session->flashdata('success')) {
            echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
        } else if ($this->session->flashdata('error')) {
            echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
        }
        ?>
                <h3 class="text-center mt-3">Reset Password</h3>
                <div class="form-group">
                    <?php echo form_open(base_url( 'frontend/auth/forget/forgot_password'), array('id'=>'otpform','method'=>'POST'));?>
                    <div class="row">
                        <div class="col-md-10">
                            <label class="inputLabel mb-1" for="password">Email <span style="color:red">*</span></label>
                            <input type="text" id="email" class="form-control" name="email" Placeholder="Enter Email" required>
                            <p id="errormsg" style="color:red;font-size:12px;font-style:italic;"></p>
                            <p id="successmsg"></p>
                        </div>
                        <div class="col-md-2 mt-4">
                            <input type="submit" name="formSubmit" id="sendotpbtn"  class="btn btn-block btn-primary"  value="Send OTP"/>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
                <form action="<?php echo base_url()?>frontend/auth/forget/verify_otp" method="post">
                    <div class="form-group mb-3 mt-3">
                        <label class="inputLabel mb-1" for="password">OTP <span style="color:red">*</span></label>
                        <input type="text" id="email" class="form-control" name="verification_code" Placeholder="Enter Otp" required>
                    </div>
                    <div class="form-group mb-5">
                        <button class="btn btn-block btn-primary">Submit</button>
                    </div>
                </form>
            </div>  
    </div>
 </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<script>

    $("#otpform").submit(function(event){
	event.preventDefault();
	var post_url = $(this).attr("action"); 
	var request_method = $(this).attr("method"); 
	var form_data = $(this).serialize();
    $('#sendotpbtn').attr('disabled','true');
	$.ajax({
		url : post_url,
        type: request_method,
        dataType:"json",
        data : form_data, 
    }).done(function(response){
        if(response.status == "success"){
            $('#successmsg').html(response.msg);
            $('#sendotpbtn').removeAttr('disabled','false');
        }else{
            $('#errormsg').html(response.msg);
            $('#sendotpbtn').removeAttr('disabled','false');
        }
	});
});


</script>























