
    <!-- Brand Logo -->
    <a href="<?php echo base_url('dashboard'); ?>" class="brand-link">
      <img src="<?php echo $this->config->item('assets_url');?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item <?php echo @$dash_menuopen?>">
            <a href="<?php echo base_url('dashboard'); ?>" class="nav-link <?php echo @$dash_smenuactive?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item <?php echo @$ps_menuopen?>">
            <a href="#" class="nav-link <?php echo @$pssub_menuactive?>">
              <i class="nav-icon fas fa-tools"></i>
              <p>
                Product Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('product_unit'); ?>" class="nav-link <?php echo @$psunit_menuactive?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Unit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('product_brand'); ?>" class="nav-link <?php echo @$psbrand_menuactive?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Brand</p>
                </a>
              </li>
              <!--
              <li class="nav-item">
                <a href="<?php echo base_url('product_type'); ?>" class="nav-link <?php echo @$pstype_menuactive?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Type</p>
                </a>
              </li>
            -->
              <li class="nav-item">
                <a href="<?php echo base_url('category'); ?>" class="nav-link <?php echo @$pscat_menuactive?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('subcategory'); ?>" class="nav-link <?php echo @$psscat_menuactive?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Sub Category</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item <?php echo @$urd_menuopen?>">
            <a href="<?php echo base_url('orders'); ?>" class="nav-link <?php echo @$urd_menuactive?>">
              <i class="nav-icon fas fa-list"></i>
              <p>Orders List</p>
            </a>
          </li>
          <li class="nav-item <?php echo @$prd_menuopen?>">
            <a href="<?php echo base_url('product'); ?>" class="nav-link <?php echo @$prd_menuactive?>">
              <i class="nav-icon fas fa-list"></i>
              <p>Products List</p>
            </a>
          </li>
          <li class="nav-item <?php echo @$prdrview_menuopen?>">
            <a href="<?php echo base_url('product/review'); ?>" class="nav-link <?php echo @$prdrview_menuactive?>">
              <i class="nav-icon fas fa-history"></i>
              <p>Products Review</p>
            </a>
          </li>
           <li class="nav-item <?php echo @$usr_menuopen?>">
            <a href="<?php echo base_url('users'); ?>" class="nav-link <?php echo @$usr_menuactive?>">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>Users List</p>
            </a>
          </li>
           <li class="nav-item <?php echo @$cc_menuopen?>">
            <a href="<?php echo base_url('coupon_code'); ?>" class="nav-link <?php echo @$cc_menuactive?>">
              <i class="nav-icon fas fa-tag"></i>
              <p>Coupon Code</p>
            </a>
          </li>
          <li class="nav-item <?php echo @$usrnl_menuopen?>">
            <a href="<?php echo base_url('users/download_newsletter'); ?>" class="nav-link <?php echo @$usrnl_menuactive?>">
              <i class="nav-icon fas fa-envelope"></i>
              <p>Download Newsletter</p>
            </a>
          </li>
          <!--
          <li class="nav-item <?php echo @$dtr_menuopen?>">
            <a href="<?php echo base_url('doctors'); ?>" class="nav-link <?php echo @$dtr_menuactive?>">
              <i class="nav-icon fas fa-user-md"></i>
              <p>Doctor's List</p>
            </a>
          </li>
          <li class="nav-item <?php echo @$drcon_menuopen?>">
            <a href="<?php echo base_url('doctors/consultation'); ?>" class="nav-link <?php echo @$drcon_menuactive?>">
              <i class="nav-icon fas fa-comments"></i>
              <p>Doctors Consultation List</p>
            </a>
          </li>
          <li class="nav-item <?php echo @$labcon_menuopen?>">
            <a href="<?php echo base_url('lab_test/consultation'); ?>" class="nav-link <?php echo @$labcon_menuactive?>">
              <i class="nav-icon fas fa-comments"></i>
              <p>Lab Consultation List</p>
            </a>
          </li>
          <li class="nav-item <?php echo @$ls_menuopen?>">
            <a href="#" class="nav-link <?php echo @$lssub_menuactive?>">
              <i class="nav-icon fas fa-vial"></i>
              <p>
                Lab Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('lab_test'); ?>" class="nav-link <?php echo @$lstest_menuactive?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lab Tests</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('labs'); ?>" class="nav-link <?php echo @$lslabs_menuactive?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Labs</p>
                </a>
              </li>
            </ul>
          </li>
        -->
          <li class="nav-item <?php echo @$ws_menuopen?>">
            <a href="#" class="nav-link <?php echo @$wssub_menuactive?>">
              <i class="nav-icon fas fa-globe"></i>
              <p>
                Website Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('basicsettings'); ?>" class="nav-link <?php echo @$bst_menuactive?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Basic Settings</p>
                </a>
              </li>
              <li class="nav-item">
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
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  