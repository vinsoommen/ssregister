  
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url('dashboard'); ?>" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link"><?php echo $title;?></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge"><?php // echo $this->dashboard->count_new_order() + $this->dashboard->count_users_review();?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"><?php //echo $this->dashboard->count_new_order() + $this->dashboard->count_users_review();?> Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url('orders'); ?>" class="dropdown-item">
            <i class="fas fa-shopping-cart mr-2"></i> <?php // echo $this->dashboard->count_new_order();?> order request
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url('product/review'); ?>" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> <?php // echo $this->dashboard->count_users_review();?> review request
          </a>
          <div class="dropdown-divider"></div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  