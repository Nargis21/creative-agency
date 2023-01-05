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
      <div class="d-flex justify-content-center">
      <lottie-player src="https://assets7.lottiefiles.com/packages/lf20_olozy4qw.json" background="transparent" speed="2" style="width: 1000px; height: 500px;" loop autoplay></lottie-player>
      </div>
    </div>

    <?php require_once "includes/footer.php" ?>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>