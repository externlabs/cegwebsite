
<div class="maincontent_box">
  <div class="forgotpassword">
<?php
        if ($this->session->flashdata('success')) {
            echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
        } else if ($this->session->flashdata('error')) {
            echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
        }
        ?>
  
    <form action="<?php echo base_url(). 'frontend/user/forgetpassword/updatepwd'?>" method="post">
    <div class="card-body register">

    <h3 class="text-center mt-3">Change Password</h3>
    <div class="row">
      <div class="form-group col-12">
        <label class="inputLabel" for="password">Current Password <span style="color:red;">*</span></label>
        <input type="password" class="form-control"  id="password" name="password" required>
      </div>
        

      <div class="form-group col-12">
        <label class="inputLabel" for="password">New Password <span style="color:red;">*</span></label>
        <input type="password" class="form-control" id="new_password" name="new_password" required>
      </div>

      <div class="form-group col-12">
        <label class="inputLabel" for="password">Confirm Password <span style="color:red;">*</span></label>
        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
      </div>
      <div class="col-12">
        <button class="btn mx-auto btn-primary">submit</button>
      </div>

    </div>
    </div>
  </form>
</div>
</div>

