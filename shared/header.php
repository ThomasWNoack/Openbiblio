<?php
/*
 * This file is part of a copyrighted work; it is distributed with NO WARRANTY.
 * See the file COPYRIGHT.html for more details.
 */
if (preg_match('/[^a-zA-Z0-9_]/', $tab)) {
    (new Fatal())->internalError("Possible security violation: bad tab name");
    exit(); # just in case
}

include ("../shared/header_top.php");
?>

<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <?php include('navbar.php'); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include('sidebar.php'); ?>
 
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">