
<?php
$adm_id=$this->session->userdata('admin_id');  
$level=$this->session->userdata('admin_level');
$name=$this->session->userdata('name');
$designation=$this->session->userdata('designation');


?>
    <!-- Brand Logo -->
    <a href="<?php echo base_url('dashboard'); ?>" class="brand-link">
      <img src="<?php echo $this->config->item('assets_url');?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span> 
      <div style="padding-left: 20%;">
        <span class="brand-text font-weight-light"> <?php echo $name; ?></span><br><?php echo "$designation"; ?>
      </div>
    </a>


    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <?php  
if(($level == 1) || ($level == 2) || ($level == 3) || ($level == 4) || ($level == 5))
{
?>
          <li class="nav-item <?php echo @$dash_menuopen?>">
            <a href="<?php echo base_url('dashboard'); ?>" class="nav-link <?php echo @$dash_smenuactive?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
        <?php 
     }
      if(($level == 1) ||  ($level != 5) && ($level != 2) && ($level != 3)&& ($level != 4))
       {

      ?>
          <li class="nav-item <?php echo @$zon_menuopen?>">
            <a href="#" class="nav-link <?php echo @$zon_menuactive?>">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                Manage Zone
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('zone'); ?>" class="nav-link <?php echo @$psunit_menuactive?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Zone</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('zone/add'); ?>" class="nav-link <?php echo @$psbrand_menuactive?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Zone</p>
                </a>
              </li>
        
            </ul>
          </li>
         
      
            <li class="nav-item <?php echo @$ds_menuopen?>">
            <a href="#" class="nav-link <?php echo @$ds_menuactive?>">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                Manage District
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('district'); ?>" class="nav-link <?php echo @$psunit_menuactive?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All District</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('district/add'); ?>" class="nav-link <?php echo @$psbrand_menuactive?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add District</p>
                </a>
              </li>
            </ul>
          </li>
            <?php  
            }
           if(($level == 1) ||  ($level == 5) && ($level != 2) && ($level != 3)&& ($level != 4))
           {

           ?>
            <li class="nav-item <?php echo @$lo_menuopen?>">
            <a href="#" class="nav-link <?php echo @$lo_menuactive?>">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                Manage Local Centers
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('local_center'); ?>" class="nav-link <?php echo @$psunit_menuactive?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Local Centers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('local_center/add'); ?>" class="nav-link <?php echo @$psbrand_menuactive?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Local Centers</p>
                </a>
              </li>
            </ul>
          </li>
            <?php  
            }
           
           ?>

           <?php  
            if(($level == 1) || ($level == 2) || ($level == 3) ||  ($level == 5))
            {
           ?>

          <li class="nav-item <?php echo @$st_menuopen?>">
            <a href="#" class="nav-link <?php echo @$st_menuactive?>">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                Manage Login
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('staff'); ?>" class="nav-link <?php echo @$psunit_menuactive?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Login Details</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('staff/add'); ?>" class="nav-link <?php echo @$psbrand_menuactive?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Login</p>
                </a>
              </li>
            </ul>
          </li> 
        <?php  
      }
            if(($level == 1) || ($level == 2) || ($level == 3) || ($level == 4) || ($level == 5))
            {
           ?>
             <li class="nav-item <?php echo @$stud_menuopen?>">
            <a href="#" class="nav-link <?php echo @$stud_menuactive?>">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                Manage Students
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('students'); ?>" class="nav-link <?php echo @$psunit_menuactive?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Students</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('students/add'); ?>" class="nav-link <?php echo @$psbrand_menuactive?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Students</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('students/search_report'); ?>" class="nav-link <?php echo @$psbrand_menuactive?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Search Report</p>
                </a>
              </li>
            </ul>
          </li>
         <li class="nav-item <?php echo @$te_menuopen?>">
            <a href="#" class="nav-link <?php echo @$tea_menuactive?>">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                Manage Teachers
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('teacher'); ?>" class="nav-link <?php echo @$psunit_menuactive?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Teachers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('teacher/add'); ?>" class="nav-link <?php echo @$psbrand_menuactive?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Teachers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('teacher/search_report'); ?>" class="nav-link <?php echo @$psbrand_menuactive?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Search Report</p>
                </a>
              </li>
            </ul>
          </li>

        <?php } ?>
         
          <li class="nav-item <?php echo @$ws_menuopen?>">
            <a href="#" class="nav-link <?php echo @$wssub_menuactive?>">
              <i class="nav-icon fas fa-globe"></i>
              <p>
                 Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('changepassword/'); ?>" class="nav-link <?php echo @$bst_menuactive?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Password</p>
                </a>
              </li>
             <!--  <li class="nav-item">
                <a href="<?php echo base_url('banner'); ?>" class="nav-link <?php echo @$bnr_menuactive?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Banner</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="<?php echo base_url('page'); ?>" class="nav-link <?php echo @$pg_menuactive?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('advertisement'); ?>" class="nav-link <?php echo @$ads_menuactive?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Advertisement</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('blogs'); ?>" class="nav-link <?php echo @$blog_menuactive?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blog</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('news'); ?>" class="nav-link <?php echo @$news_menuactive?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>News</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('offer_type'); ?>" class="nav-link <?php echo @$oftype_menuactive?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Offer Type</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('offers'); ?>" class="nav-link <?php echo @$offer_menuactive?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Offer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('testimonials'); ?>" class="nav-link <?php echo @$tmnl_menuactive?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Testmonials</p>
                </a>
              </li>-->
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  