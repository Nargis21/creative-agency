<?php
require_once "../includes/db.php";
$email = $_SESSION['login'];
$get_query = "SELECT * FROM users WHERE email = '$email'";
$user = mysqli_query($db_connect, $get_query);
$allData = mysqli_fetch_assoc($user);

?>
<!-- Header -->
<header class="main-header" id="header">
  <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
    <!-- Sidebar toggle button -->
    <button id="sidebar-toggler" class="sidebar-toggle">
      <span class="sr-only">Toggle navigation</span>
    </button>

    <span class="page-title">dashboard</span>

    <div class="navbar-right">

      <ul class="nav navbar-nav">
        <!-- User Account -->
        <li class="dropdown user-menu">
          <button class="dropdown-toggle nav-link" data-toggle="dropdown">
            <!-- <img src="images/user/u-xl-3.jpg" class="user-image rounded-circle" alt="User Image" /> -->
            <?php if ($allData['user_image']) : ?>
              <img height="40px" width="40px" class=" rounded-circle" src="uploads/user/<?= $allData['user_image']; ?>" alt="">
            <?php else : ?>
              <img  class="user-image rounded-circle" src="./images/avatar.png" alt="">
            <?php endif; ?>
            <span class="d-none d-lg-inline-block text-black">
              <?= $allData['first_name']; ?></span>
          </button>
          <ul class="dropdown-menu dropdown-menu-right">
            <li>
              <a class="dropdown-link-item" href="./myProfile.php">
                <i class="mdi mdi-account-outline"></i>
                <span class="nav-text">My Profile</span>
              </a>
            </li>
            <li class="dropdown-footer">
              <a class="dropdown-link-item" href="../authentication/logout.php">
                <i class="mdi mdi-logout"></i>
                <span class="nav-text">Logout</span>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>