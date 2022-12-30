<?php session_start(); ?>

<?php require_once "includes/authCheck.php"; ?>
<?php $title = "Home"; ?>
<?php require_once "includes/header.php"; ?>
    
    <!-- ====================================
    ——— WRAPPER
    ===================================== -->
    <div class="wrapper">
      
        <!-- ====================================
          ——— LEFT SIDEBAR WITH OUT FOOTER
        ===================================== -->
        <?php require_once "includes/sidebar.php"; ?>

      <!-- ====================================
      ——— PAGE WRAPPER
      ===================================== -->
      <div class="page-wrapper">
        
          <!-- topbar -->
          <?php require_once "includes/topbar.php"; ?>

        <!-- ====================================
        ——— CONTENT WRAPPER
        ===================================== -->
        <div class="content-wrapper">

      

        </div>
        
<?php require_once "includes/footer.php" ?>
