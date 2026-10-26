<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> <?php echo $this->config->item('company')?> | <?php echo $title;?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo $this->config->item('assets_url');?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <!-- iCheck -->
  <!-- JQVMap -->
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $this->config->item('assets_url');?>dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo $this->config->item('assets_url');?>plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo $this->config->item('assets_url');?>plugins/summernote/summernote-bs4.min.css">
  <!-- jQuery -->
<script src="<?php echo $this->config->item('assets_url');?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo $this->config->item('assets_url');?>plugins/jquery-ui/jquery-ui.min.js"></script>
<style type="text/css">
  .list-page .btn{
    padding: .175rem .75rem !important;
  }
  .list-page .dropdown-menu{
    padding: 0 !important;
  }
</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?php echo $this->config->item('assets_url');?>dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>
    <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <?php $this->load->view('theme/headertop');?>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <?php $this->load->view('theme/menu')?>
  </aside>
  <style type="text/css">
    .control-sidebar.control-sidebar-dark{height: 56px !important;}
  </style>