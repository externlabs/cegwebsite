

<div class="container mt-5 mt-5">
<?php
        if ($this->session->flashdata('success')) {
            echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
        } else if ($this->session->flashdata('error')) {
            echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
        }
        ?>
  <div class="row justify-content-center">
  <div class="col-md-8">
  
    <form action="<?php echo base_url(). 'frontend/user/forgetpassword/updatepwd'?>" method="post">
    <div class="card-body register">

    <h3 class="text-center mt-3">Forget Password</h3>

      <div class="form-group">
      <label class="inputLabel" for="password">Current Password</label>
      <input type="password" id="password" name="password" required>
    </div>
      

    <div class="form-group">
      <label class="inputLabel" for="password">New Password</label>
      <input type="password" id="new_password" name="new_password" required>
    </div>

    <div class="form-group">
      <label class="inputLabel" for="password">Confirm Password</label>
      <input type="password" id="confirm_password" name="confirm_password" required>
    </div>
      
   
    
    <div class="form-group">
        <button class="btn btn-block btn-primary">submit</button>
    </div>
    </div>
  </form>
  </div>
  </div>
</div>