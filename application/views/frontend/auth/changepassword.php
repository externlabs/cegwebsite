
<div class="container mt-5 mt-5 changepassword">
    <div class="row justify-content-center">
        <div class="col-md-6">
        <?php
        if ($this->session->flashdata('success')) {
            echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
        } else if ($this->session->flashdata('error')) {
            echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
        }
        ?>
            <div class="card-body register">
                <h3 class="text-center mt-3">Change Password</h3>
                <div class="row"> 
                    <div class="form-group">
                        <form action="<?php echo base_url(). 'frontend/auth/changepassword/change_password'?>" method="post">
                            <div class="row">
                                <div class="col-md-10">
                                    <label class="inputLabel mb-1" for="password">New Password<span style="color:red">*</span></label>
                                    <input type="text" id="new_password" class="form-control" name="password" Placeholder="Enter password" required>
                                </div>

                                <div class="col-md-10">
                                    <label class="inputLabel mb-1" for="password">Confirm Password<span style="color:red">*</span></label>
                                    <input type="text" id="new_password" class="form-control" name="cofirm_password" Placeholder="Enter password" required>
                                </div>

                                <div class="form-group mb-5">
                                <button class="btn btn-block btn-primary">submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
    </div>
 </div>
</div>
</div>