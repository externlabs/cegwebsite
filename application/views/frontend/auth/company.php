


<div class="container mt-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <?php
    if ($this->session->flashdata('success')) {
      echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
    } else if ($this->session->flashdata('error')) {
      echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
    }


    ?>
        <ul class="nav nav-tabs " id="myTab" role="tablist" >
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="register-tab" data-bs-toggle="tab"
                            data-bs-target="#register" type="button" role="tab" aria-controls="register"
                            aria-selected="true">Registration</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="login-tab" data-bs-toggle="tab" data-bs-target="#login"
                            type="button" role="tab" aria-controls="login" aria-selected="false">login</button>
                    </li>


                </ul>
                <div class="tab-content campany-tabbar" id="myTabContent ">
                    <div class="tab-pane fade show active" id="register" role="tabpanel" aria-labelledby="register-tab">
                        <div class="card-header mt-3">
                            <h3 class="text-center">Register Here </h3>
                        </div>
                        <p>Please Contact to Adminstrator to create the company account.</p>


                    </div>
                    <div class="tab-pane fade" id="login" role="tabpanel" aria-labelledby="login-tab">
                        <div class="card-header text-center mt-3">
                          <h3>  Login Here </h3>
                        </div>
                        <form action="<?php echo base_url(). 'frontend/auth/company/company_login'?>" method="post">
                            <div class="card-body register">
                                <h4 class="card-text text-center mb-3">Please fill with your details</h4>
                                <div class="form-group">
                                    <label for="name" class="form-label">Email</label>
                                    <input type="text" name="email" id="" value="" class="form-control"
                                        placeholder="Email">
                                </div>

                                <div class="form-group">
                                    <label for="name" class="form-label">Password</label>
                                    <input type="password" name="password" id="" value="" class="form-control"
                                        placeholder="password">
                                </div>

                                <div class="form-group" >
                                    <button class="btn btn-block btn-primary">login</button>
                                </div>

                            </div>
                        </form>
                        <div class="form-group">
									<a href="<?php echo base_url()?>auth/forget" tabindex="5" data-toggle="modal" data-target="#changemodel" class="forgot-password">Forgot Password</a>
								</div>
                    </div>
                </div>
        </div>
    </div>
</div>