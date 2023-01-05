<?php
session_start();
require_once "includes/header.php";
?>

<body>
    <header class="slide-gap">
        <nav class="banner-margin navbar bgColor1 navbar-expand-lg fixed-top shadow">
            <div class="container d-flex justify-content-between align-items-center">
                <a class="navbar-brand " href="index.php">
                    <img width="150px" src="images/logos/logo.png" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0 ms-auto align-items-center">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#service">Our Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">About Us</a>
                        </li>
                        <?php
                        if (isset($_SESSION['login'])) {
                        }
                        if (!isset($_SESSION['login'])) : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="../authentication/login.php">
                                    <button class="customButton">Login</button>
                                </a>
                            </li>
                        <?php endif ?>
                        <?php
                        if (isset($_SESSION['login'])) : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="../dashboard/index.php">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../authentication/logout.php">
                                    <button class="customButton">Logout</button></a>
                            </li>
                        <?php endif ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="bgColor1 py-5 mt-5">
        <section class="container py-5 mt-5">
            <div class="row gy-5">
                <div class="col-lg-5 col-md-12 col-12 pe-5 ">
                    <h1 class="fw-bold lh-base bannerHeading">Let's Grow Your <br> Brand To The <br> Next Level</h1>
                    <p class="my-4">A creative agency is an organization that uses creative strategies to help clients achieve their goals. Creative agencies, sometimes called marketing agencies.</p>
                    <button class="customButton">Hire Us</button>
                </div>
                <div class="col-lg-7 col-md-12 col-12">
                    <img width="90%" src="images/Logos/Frame.png" alt="">
                </div>
            </div>
        </section>
    </main>
    <section class="container py-5" id="service">
        <div class="py-5 d-flex justify-content-evenly align-items-center">
            <img width="12%" src="images/logos/slack.png" alt="">
            <img width="12%" src="images/logos/google.png" alt="">
            <img width="8%" src="images/logos/uber.png" alt="">
            <img width="10%" src="images/logos/netflix.png" alt="">
            <img width="13%" src="images/logos/airbnb.png" alt="">
        </div>
        <h2 class="py-5 text-center">Provide Awesome <span class="text-success">services</span></h2>
        <?php require_once('includes/service.php'); ?>
    </section>

    <section class="sliderSection" id="about">
        <div class="container">
            <h2 class="py-5 text-center text-white">Here are some of <span class="text-success">our works</span></h2>
            <div class="row row-cols-1 row-cols-lg-3 row-cols-md- gy-4 pb-5">
                    <div class="rounded col ">
                        <img width="90%" src="./images/carousel-1.png" />
                    </div>
                    <div class="rounded col ">
                        <img width="90%" src="./images/carousel-2.png" />
                    </div>
                    <div class="rounded col ">
                        <img width="90%" src="./images/carousel-4.png" />
                    </div>
            </div>
        </div>
    </section>

    <?php require_once('includes/review.php'); ?>

    <footer class="my-5 py-5 text-center">
        <small><i class="far fa-copyright"></i>2022.Creative Agency.All rights reserved by nargis21!</small>
    </footer>
    <!-- Js bundle stylesheet -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


</body>

</html>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6396ad61daff0e1306dc2bc2/1gk29aibl';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->