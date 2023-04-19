        
<?php 

    $user_id = $_SESSION['user_id'];
    $user_type = $_SESSION['profile_type'];


    $user_details = '';

    if($user_type == "company"){
        $user_details = $this->db->where('poc_id',$user_id)->get('company_poc')->result_array();
        foreach($user_details as $value){
            $name = $value['poc_name'];
            $profile_pic = null;
        }   
    }else if($user_type =="student"){
        $user_details = $this->db->where('student_id',$user_id)->get('student')->result_array();
        foreach($user_details as $value){
            $name = $value['student_name'];
            $profile_pic = $value['photo'];
        }
    }
?>
        
        
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!--  Topbar Search  -->
                    <!-- <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <h4 class="text-dark"> Student   </h4>
                    </div>  -->
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                    <li class="nav-item dropdown no-arrow">
                            <a class="nav-link " href="<?php echo base_url()?>alltraining"  role="button" aria-haspopup="true" aria-expanded="false">
                                Training
                            </a>
                        </li>

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link " href="<?php echo base_url()?>upcoming-drives"  role="button" aria-haspopup="true" aria-expanded="false">
                                Drives
                            </a>
                        </li>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link " href="#"  role="button" aria-haspopup="true" aria-expanded="false">
                                Addmissions
                            </a>
                        </li>
                        
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $name;?></span>
                                <?php if($profile_pic == null){?>
                                    <img class="img-profile rounded-circle"
                                    src="<?php echo base_url()?>assets/theme/img/undraw_profile.svg">
                            </a>
                                <?php }else{?>
                                    
                                <img class="img-profile rounded-circle"
                                    src="<?php echo base_url()?>upload/student/<?php echo $profile_pic?>">
                            </a>
                            <?php }?>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?php echo base_url()?>user/my-profile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a> -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo base_url()?>user/forgetpassword" >
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Change Password
                                </a>

                                <a class="dropdown-item" href="<?php echo base_url()?>frontend/logout" >
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>