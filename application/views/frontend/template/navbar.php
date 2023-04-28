
<?php 

    $user_id = $_SESSION['user_id'];
    $user_type = $_SESSION['profile_type'];


    $user_details = '';


    if(isset($_SESSION['user_id'])){
        if($user_type == "company"){
            $user_details = $this->db->where('poc_id',$user_id)->get('company_poc')->result_array();
            foreach($user_details as $value){
                $name = $value['poc_name'];
            }
        }else if($user_type =="student"){
            $user_details = $this->db->where('student_id',$user_id)->get('student')->result_array();
            foreach($user_details as $value){
                $name = $value['student_name'];
            }
        }
        $login = '<li class="dropdown">'.$name.' <i class="fa-solid fa-angle-down"></i>
        <ul class="dropdown-menu">
            <li><a href="'.base_url().'user/dashboard">My Dashboard </a></li>
            <li><a href="'.base_url().'frontend/logout">logout</a></li>
        </ul>
    </li>';
    }else{
        $login = '<li class="dropdown">Register / Login <i class="fa-solid fa-angle-down"></i>
        <ul class="dropdown-menu">
            <li><a href="'.base_url().'auth/company">Company </a></li>
            <li><a href="'.base_url().'auth/student">Student</a></li>
            <li><a href="'.base_url().'auth/faculity">Faculity</a></li>
        </ul>
    </li>';
    }
?>

<?php $training_data = $this->db->get('training')->result_array();?>


<div>
    <header>
        <div class="topbar">
            <button class="toggle-btn"><i class="fa-solid fa-bars"></i></button>
            <ul class="topbar-list">
                <li><a href="#">Skip to Main Content</a></li>
                <li><a href="#">Screen Reader Access</a></li>
                <li>
                    <button type="button " class="box-btn skybg-btn"></button> 
                    <button type="button " class="box-btn browenbg-btn"></button>
                    <button type="button" class="box-btn redbg-btn"></button>
                </li>
                <li>
                    <button type="button" class="font-btn font-btn-increase">A+</button> 
                    <button type="button" class="font-btn font-btn-default">A</button>
                    <button type="button" class="font-btn font-btn-decrease">A-</button>
                </li>
                <li><a href="#">Website Updated: 06 Feb 2023</a></li>
            </ul>
        </div>
        <div class="logo-bar">
            <div class="left-part">
                <a href="<?php echo base_url()?>">
                    <img src="<?php echo base_url()?>assets/image/logo.svg" alt="logo">
                </a>
                <img src="<?php echo base_url()?>assets/image/ceg.png" alt="logo" />
            </div>
            <div class="right-part">
                <img src="<?php echo base_url()?>assets/image/amart.png" alt="logo" />
            </div>
        </div>

        <div class="menu-bar">
            <button type="button" class="menu-close"> <i class="fa-solid fa-circle-xmark"></i> </button>
            <ul class="menu-list">
                <li><a href="<?php echo base_url()?>">Home</a></li>
                <li class="dropdown">Training <i class="fa-solid fa-angle-down"></i>
                    <ul class="dropdown-menu">
                        <?php foreach($training_data as $training){?>
                        <li><a href="<?php echo base_url()?>training/<?php echo $training['training_link']?>"><?php echo $training['training_name']?></a></li>
                        <?php }?>
                    </ul>
                </li>
                <!--<i class=""></i> <class="fa-solid fa-angle-down"> -->
                <li class="dropdown">Placement <i class="fa-solid fa-angle-down"></i>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url()?>upcoming-drives">Upcoming Drive</a></li>    
                    </ul>
                </li>
                <li class="dropdown">Admissions <i class="fa-solid fa-angle-down"></i>
                    <ul class="dropdown-menu">
                        <!-- <li><a href="<?php echo base_url()?>comingsoon">Coming Soon</a></li>     -->
                        <li><a href="<?php echo base_url()?>btech" class="active">B.E / B.TECH -2023</a></li>
                        <li><a href="<?php echo base_url()?>barch" >B.ARCH-2023</a></li>
                        <li><a href="<?php echo base_url()?>mca">MCA-2023</a></li>
                        <li><a href="<?php echo base_url()?>mba">MBA-2023</a></li>
                    </ul>
                </li>
                <li class="dropdown">e-Governance <i class="fa-solid fa-angle-down"></i>
                    <ul class="dropdown-menu">
                        <li><a href="#" class="active">Learning Resource</a></li>
                        <li><a href="#" >e-Forms</a></li>
                    </ul>
                </li>
                <li >
                    <a href="#">Circular and News</a>
                </li> 
                <li><a href="<?php echo base_url()?>contact">Contact Us</a></li>
                <?php echo $login?>
            </ul>
        </div>
    </header>