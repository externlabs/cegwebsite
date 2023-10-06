<?php
    $user_type = $_SESSION['profile_type'];

    if($user_type == "company"){
        $tabname = "Drive";
        $tabitem_name = "Add Drive";
        $tablink = "add-drive";
    }else{
        $tabname = "Qualification";
        $tabitem_name = "Qualification";
        $tablink = "qualification"; 
    }
?>


<!-- Sidebar -->
<ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand" href="<?php echo base_url()?>">
    <img src="<?php echo base_url()?>assets/image/ceg.png"  alt="logo"/>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<!-- <li class="nav-item active">
    <a class="nav-link" href="<?php echo base_url()?>user/dashboard">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li> -->

<!-- Divider -->
<hr class="sidebar-divider">


<!-- Nav Item - profile  Menu -->
<?php if($user_type == "company"){?>
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Drive</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url()?>user/add-drive">Add Drive</a>
            <a class="collapse-item" href="<?php echo base_url()?>user/pending-drive">Pending Drive</a>
            <a class="collapse-item" href="<?php echo base_url()?>user/rejected-drive">Rejected Drive</a>
            <a class="collapse-item" href="<?php echo base_url()?>user/upcomming-drive">Upcomming / Ongoing Drive</a>
            <a class="collapse-item" href="<?php echo base_url()?>user/complete-drive">Completed Drive</a>
            <a class="collapse-item" href="<?php echo base_url()?>user/cancel-drive">Cancel Drive</a>

        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="<?php echo base_url()?>user/student-application">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Application</span>
    </a>
   
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Short Listing</span>
    </a>
   
</li>

<?php }?>


<?php if($user_type == "student"){?>
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Acadmic Profile</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url()?>user/my-profile">My Profile</a>
        <a class="collapse-item" href="<?php echo base_url()?>user/add-qualification">Add Qualification</a>
            <a class="collapse-item" href="<?php echo base_url()?>user/qualifications">Qualification</a>
        </div>
    </div>
</li>

<!-- <li class="nav-item">
    <a class="nav-link collapsed" href="#">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Subscription</span>
    </a>
   
</li> -->

<li class="nav-item">
    <a class="nav-link collapsed" href="<?php echo base_url()?>user/driveapplication">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Drive Application</span>
    </a>
   
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="<?php echo base_url()?>user/trainingapplication">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Training Application</span>
    </a>
   
</li>

<?php }?>



<?php if($user_type == "faculity"){?>
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Acadmic Profile</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url()?>user/add-qualification">Add Qualification</a>
            <a class="collapse-item" href="<?php echo base_url()?>user/qualifications">Qualification</a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="<?php echo base_url()?>user/trainingapplication">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Training Application</span>
    </a>
   
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="<?php echo base_url()?>user/driveapplication">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Drive Application</span>
    </a>
   
</li>

<?php }?>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>



</ul>
<!-- End of Sidebar -->