<style>
  .active {
    background-color: #0073aa;
    color: white;
  }

  .active a:hover {
    background-color: #0073aa !important;
    color: white !important;
  }

  a:hover {
    color: #0073aa !important;
  }

  li a {
    color: white !important;
    transition: .5s;
  }

  .fas {
    color: white !important;
  }

  li {
    transition: .5s;
  }

  li:hover {
    background-color: black !important;

  }

  .side {
    background-color: #23282d !important;

  }
</style>

<?php if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'ON') {
  $url = "https://";
} else {
  $url = "http://";
}
$url .= $_SERVER['HTTP_HOST'];
$url .= $_SERVER['REQUEST_URI'];


$parts = basename($url);




?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    <div id="col-navigation" class="side">
      <!-- Sidebar -->
      <ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->


        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item <?php echo ($parts == 'welcome') ? "active" : "" ?>">
          <a class="nav-link  " href="<?php echo base_url(); ?>welcome">
            <i class="fas fa-fw fa-tachometer-alt" style="color:white; font-size:1.5rem;"></i>
            <span>Dashboard</span></a>
          <span class="sr-only">
            (current)
          </span>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">



        <!-- Divider -->
        <!--    <hr class="sidebar-divider">

    <! -- Heading -->
        <div class="sidebar-heading">
          Home Page
        </div>

        <!-- Nav Item - Charts -->




        <!-- Nav Item - Tables -->



        <!--li class="nav-item <?php echo ($parts == 'adduser') ? "active" : "" ?>">
          <a class="nav-link " href="<?php echo base_url(); ?>admin/adduser"><i class="fas fa-fw fa-table"></i><span>Add User</span></a>
        </li!-->

        <li class="nav-item ">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#company" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Company</span>
          </a>
          <div id="company" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="py-2 collapse-inner rounded">
              <a class="collapse-item " href="<?php echo base_url(); ?>admin/company/add" style="font-size:1.3rem; ">Add Company</a>
              <a class="collapse-item " href="<?php echo base_url(); ?>admin/company/poc" style="font-size:1.3rem; ">Add Point Of Contact</a>
              <a class="collapse-item " href="<?php echo base_url(); ?>admin/company/allpoc" style="font-size:1.3rem; ">All Point Of Contact</a>
              <a class="collapse-item " href="<?php echo base_url(); ?>admin/company/allcompany" style="font-size:1.3rem; ">All Company</a>
              <div class="collapse-divider"></div>
            </div>
          </div>
        </li>

        <li class="nav-item ">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#drive" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Drive</span>
          </a>
          <div id="drive" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="py-2 collapse-inner rounded">
              <a class="collapse-item " href="<?php echo base_url(); ?>admin/drive/driverequest" style="font-size:1.3rem; ">New Drive Request</a>
              <a class="collapse-item " href="<?php echo base_url(); ?>admin/drive/upcommingdrive" style="font-size:1.3rem; ">Upcoming Drive</a>
              <a class="collapse-item " href="<?php echo base_url(); ?>admin/drive/completedrive" style="font-size:1.3rem; ">Complete Drive</a>
              <a class="collapse-item " href="<?php echo base_url(); ?>admin/drive/canceldrive" style="font-size:1.3rem; ">Cancel Drive</a>
              <a class="collapse-item " href="<?php echo base_url(); ?>admin/drive/adddrive" style="font-size:1.3rem; ">Add drive</a>
              <div class="collapse-divider"></div>
            </div>
          </div>
        </li>

        <li class="nav-item ">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#reporting" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Reporting</span>
          </a>
          <div id="reporting" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="py-2 collapse-inner rounded">
              <a class="collapse-item " href="<?php echo base_url(); ?>admin/reporting/result" style="font-size:1.3rem; ">Ongoin Drives</a>
              <div class="collapse-divider"></div>
            </div>
          </div>
        </li>

        <li class="nav-item ">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#training" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Training</span>
          </a>
          <div id="training" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="py-2 collapse-inner rounded">
              <a class="collapse-item " href="<?php echo base_url(); ?>admin/training/addtraining" style="font-size:1.3rem; ">Add New Training</a>
              <a class="collapse-item " href="<?php echo base_url(); ?>admin/training/alltraining" style="font-size:1.3rem; ">All Training</a>
              <a class="collapse-item " href="<?php echo base_url(); ?>admin/training/addcourse" style="font-size:1.3rem; ">Add Course</a>
              <!-- <a class="collapse-item " href="<?php echo base_url(); ?>admin/training/adddrive" style="font-size:1.3rem; ">Add drive</a> -->
              <div class="collapse-divider"></div>
            </div>
          </div>
        </li>

        <li class="nav-item ">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#student" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Student</span>
          </a>
          <div id="student" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="py-2 collapse-inner rounded">
              <a class="collapse-item " href="<?php echo base_url(); ?>admin/student/studentinfomation" style="font-size:1.3rem; ">Student Infomation</a>
              <a class="collapse-item " href="<?php echo base_url(); ?>admin/student/studentqulification" style="font-size:1.3rem; ">Student Qualification</a>
              <div class="collapse-divider"></div>
            </div>
          </div>
        </li>

        <li class="nav-item ">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#news" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>News</span>
          </a>
          <div id="news" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="py-2 collapse-inner rounded">
              <a class="collapse-item " href="<?php echo base_url(); ?>admin/news/addnews" style="font-size:1.3rem; ">Add News</a>
              <a class="collapse-item " href="<?php echo base_url(); ?>admin/news/allnews" style="font-size:1.3rem; ">All News</a>
              <div class="collapse-divider"></div>
            </div>
          </div>
        </li>

        <li class="nav-item ">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#support" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Support</span>
          </a>
          <div id="support" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="py-2 collapse-inner rounded">
              <a class="collapse-item " href="<?php echo base_url(); ?>admin/support/resetuserpass" style="font-size:1.3rem; ">Reset Poc Password</a>
              <!-- <a class="collapse-item " href="<?php echo base_url(); ?>admin/student/studentqulification" style="font-size:1.3rem; ">Student Qualification</a> -->
              <div class="collapse-divider"></div>
            </div>
          </div>
        </li>
     
        <!-- <li class="nav-item ">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#course" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Service</span>
          </a>
          <div id="course" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="py-2 collapse-inner rounded">
              <a class="collapse-item " href="<?php echo base_url(); ?>admin/servicess/allpost" style="font-size:1.3rem; ">All Services</a>
              <a class="collapse-item " href="<?php echo base_url(); ?>admin/servicess/newpost" style="font-size:1.3rem; ">Add New Services</a>
              <a class="collapse-item " href="<?php echo base_url(); ?>admin/servicess/categary" style="font-size:1.3rem; ">Categary</a>
              <div class="collapse-divider"></div>
            </div>
          </div>
        </li>

        <li class="nav-item ">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#news" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Blog</span>
          </a>
          <div id="news" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="py-2 collapse-inner rounded">
              <a class="collapse-item " href="<?php echo base_url(); ?>admin/news/allpost" style="font-size:1.3rem; ">All Blogs</a>
              <a class="collapse-item " href="<?php echo base_url(); ?>admin/news/newpost" style="font-size:1.3rem; ">Add New Blog</a>


              <div class="collapse-divider"></div>
            </div>
          </div>
        </li>

        <li class="nav-item ">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#gallary" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Gallary</span>
          </a>
          <div id="gallary" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="py-2 collapse-inner rounded">
              <a class="collapse-item " href="<?php echo base_url(); ?>admin/gallary/categary" style="font-size:1.3rem; ">Categary</a>
              <a class="collapse-item " href="<?php echo base_url(); ?>admin/gallary/newpost" style="font-size:1.3rem; ">Add Gallary</a>
              <a class="collapse-item " href="<?php echo base_url(); ?>admin/gallary/allpost" style="font-size:1.3rem; ">All Gallary</a>
              <div class="collapse-divider"></div>
            </div>
          </div>
        </li>

        <li class="nav-item ">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#project" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Projects</span>
          </a>
          <div id="project" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="py-2 collapse-inner rounded">
              <a class="collapse-item " href="<?php echo base_url(); ?>admin/projects/newpost" style="font-size:1.3rem; ">Add Projects</a>
              <a class="collapse-item " href="<?php echo base_url(); ?>admin/projects/allpost" style="font-size:1.3rem; ">All Projects</a>
              <div class="collapse-divider"></div>
            </div>
          </div>
        </li>

        <li class="nav-item ">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Clients" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Clients</span>
          </a>
          <div id="Clients" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="py-2 collapse-inner rounded">
              <a class="collapse-item " href="<?php echo base_url(); ?>admin/clientss/newpost" style="font-size:1.3rem; ">Add Client</a>
              <a class="collapse-item " href="<?php echo base_url(); ?>admin/clientss/allpost" style="font-size:1.3rem; ">All Clients</a>
              <div class="collapse-divider"></div>
            </div>
          </div>
        </li>

        <li class="nav-item ">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#extra" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Extra Page</span>
          </a>
          <div id="extra" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="py-2 collapse-inner rounded">
              <a class="collapse-item " href="<?php echo base_url(); ?>admin/extra/editblog?id=1" style="font-size:1.3rem; ">Update Page</a>
              <a class="collapse-item " href="<?php echo base_url(); ?>admin/extra/allpost" style="font-size:1.3rem; ">Form Data</a>
              <div class="collapse-divider"></div>
            </div>
          </div>
        </li> -->
        <!-- Divider -->
        <!-- <hr class="sidebar-divider d-none d-md-block">
        <div class="sidebar-heading">
          User Data
        </div> -->
        <!--li class="nav-item <?php echo ($parts == 'user') ? "active" : "" ?>">
          <a class="nav-link " href="<?php echo base_url(); ?>admin/user"><i class="fas fa-fw fa-table"></i><span>Users Data</span></a>
        </li-->
        <!-- <li class="nav-item <?php echo ($parts == 'contactdata') ? "active" : "" ?>">
          <a class="nav-link " href="<?php echo base_url(); ?>admin/contactdata"><i class="fas fa-fw fa-table"></i><span>Contact Data</span></a>
        </li>
        <li class="nav-item <?php echo ($parts == 'careerdata') ? "active" : "" ?>">
          <a class="nav-link " href="<?php echo base_url(); ?>admin/careerdata"><i class="fas fa-fw fa-table"></i><span>Career Data</span></a>
        </li>
        <li class="nav-item <?php echo ($parts == 'feedbackdata') ? "active" : "" ?>">
          <a class="nav-link " href="<?php echo base_url(); ?>admin/feedbackdata"><i class="fas fa-fw fa-table"></i><span>Feedback Data</span></a>
        </li>
        <hr class="sidebar-divider"> -->

        <!-- Sidebar Toggler (Sidebar) -->


      </ul>
    </div>

    <!-- End of Sidebar -->