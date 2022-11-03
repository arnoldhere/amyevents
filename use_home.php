<?php
session_start();
include_once "dbconnect.php";
$db = new newdb();
$conn = $db->openConnection();
// $query = "SELECT `email` FROM `user` WHERE " . " '$user_email' ";
// $prepare = $conn->prepare($query);
// $execute = $prepare->execute();
if(!isset($_SESSION['email'])){
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMY events </title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="../EMS/assets/css/user.css">
    <!-- <link rel="stylesheet" href="../EMS/assets/css/style.css"> -->
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    </script>
    <!-- fullpage js  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/4.0.11/fullpage.css" integrity="sha512-TzpAFfzjJAI0CY7w33tQEEIflTR3zB4kaQcCXcr+V4HmoQmXSMsQpX6z+c3lNC3XV0BeXQ6ZNb5X+sKeLP3cKA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- font awsome -->
    <script src="https://kit.fontawesome.com/24b1cc3df5.js" crossorigin="anonymous"></script>
</head>

<body>
    <!--Navbar-->
    <header class="site-navbar" role="banner">

        <nav class="site-navigation text-right" role="navigation">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-3 ">
                        <h1 class="mb-0 site-logo"><a href="" class="text-danger mb-0 navbar-brand">AMY Events</a></h1>
                    </div>
                    <div class="col-7  d-xl-block">
                        <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                            <li><a href="use_home.php"><span>Home</span></a></li>
                            <li class="dropdown dropdown-center"><a href="use_bookevent.php" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false"><span>Book Events</span></a>
                                <!-- <div class="dropdown-menu">
                                    <a href="use_bookevent.php" class="dropdown-item">Book Events</a>
                                    <a href="" class="dropdown-item">View Events</a>
                                    <a href="" class="dropdown-item">Delete Events</a>
                                </div> -->
                            </li>
                            <li><a href="use_about.php"><span>About Us</span></a></li>
                            <li><a href="use_contact.php"><span>Contact us</span></a></li>
                            <!-- <li><a href=""><span>Contact</span></a></li> -->
                        </ul>
                    </div>
                    <div class="col-2 d-flex justify-content-end">
                        <a href="user_profile.php">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 12a5.25 5.25 0 1 0 0-10.499A5.25 5.25 0 0 0 12 12Zm0 1.5c-3.254 0-9.75 2.01-9.75 6v3h19.5v-3c0-3.99-6.496-6-9.75-6Z"></path>
                                    </svg>&nbsp;&nbsp; My Profile
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="user_profile.php">Visit Profile</a>
                                    <a class="dropdown-item" href="use_logout.php">Log out</a>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>
                </div>
            </div>
            </div>
        </nav>
    </header>


    <!-- Carousel wrapper -->
    <div class="wrapper">
        <div id="introCarousel" class="carousel slide carousel-fade shadow-2-strong" data-mdb-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-mdb-target="#introCarousel" data-mdb-slide-to="0" class="active"></li>
                <li data-mdb-target="#introCarousel" data-mdb-slide-to="1"></li>
                <li data-mdb-target="#introCarousel" data-mdb-slide-to="2"></li>
            </ol>

            <!-- Inner -->
            <div class="carousel-inner">
                <!-- Single item -->
                <div class="carousel-item active  p-5 bg-image rounded-3">
                    <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
                    </div>
                </div>
                <!-- Single item -->
                <div class="carousel-item p-5 bg-image rounded-3">
                </div>
                <!-- Single item -->
                <div class="carousel-item  p-5 bg-image  rounded-3">
                </div> <!-- Single item -->
                <div class="carousel-item  p-5 bg-image  rounded-3">
                </div>
            </div>
            <!-- Inner -->
        </div>



        <!-- Controls -->
        <a class="carousel-control-prev" href="#introCarousel" role="button" data-mdb-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only"></span>
        </a>
        <a class="carousel-control-next" href="#introCarousel" role="button" data-mdb-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only"></span>
        </a>
    </div>
    <!-- Carousel wrapper -->
    <div class="mid-content ">
        <div class="section">
            <div class="mid-head text-center text-danger">
                <h4>UNPARALLELED, STRESS-FREE</h4>
                <h2>EVENT PLANNING & DESIGN</h2>
            </div>
            <div class="mid-body m-5 container ">
                <div class="row">
                    <div class="container col-lg">
                        <p class="para text-center text-black-50">
                            The Infinity experience is unlike any other. Our full-service event planning and design team will guide you every step of the way, ensuring a stress-free experience from start to finish.
                            With us, customization is guaranteed. From the very beginning, we will create a custom proposal tailored to your specific wants and needs. You'll be paired with an Infinity Event Team who will collaborate with you to bring your vision to life. We will team up with some of the best vendors in Nashville and take care of the all the details like meeting scheduling, delivery dates, payments, day-of setup, and more. <br>
                            When it is showtime, our staff will work tirelessly to guarantee your event is effortless and unforgettable.
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md text-center">
                        <a href="use_about.php" class="btn btn-success text-white abt-btn"> Learn more </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid event-preview ">
        <h3 class="text-danger text-center m-3">Our events</h3>
        <div class="row event-cards ">
            <div class="col text-center">
                <figure>
                    <img src="../EMS/assets/img/card1.jpg" alt="" class="">
                    <figcaption class="text-muted">wedding ceremony</figcaption>
                </figure>
            </div>
            <div class="col">
                <div class="col text-center">
                    <figure>
                        <img src="../EMS/assets/img/card2.jpg" alt="" class="">
                        <figcaption class="text-muted">Business meet</figcaption>
                    </figure>
                </div>
            </div>
            <div class="col">
                <div class="col text-center">
                    <figure>
                        <img src="../EMS/assets/img/card3.jpg" alt="" class="">
                        <figcaption class="text-muted">Concerts</figcaption>
                    </figure>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid services-preview">
        <h3 class="text-danger text-center">Our services</h3>
        <div class="row">
            <div class="col">
                <img src="../EMS/assets/img/icon1.png" alt="">
            </div>
            <div class="col">
                <button class="btn btn-warning">Live stream
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="m12.563 5.25 6.75 6.75-6.75 6.75"></path>
                        <path d="M18.375 12H4.687"></path>
                    </svg>
                </button>
                <p class="desc">
                    Whether your event is designed for 20 attendees or 10,000, a video broadcast may be your best option (for more reasons than you'd think!). Live streaming helps attendees feel they are "in the know" while allowing brands to keep their products top of mind.
                </p>
            </div>
            <div class="col">
                <img src="../EMS/assets/img/icon2.png" alt="">
            </div>
            <div class="col">
                <button class="btn btn-warning">Audio
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="m12.563 5.25 6.75 6.75-6.75 6.75"></path>
                        <path d="M18.375 12H4.687"></path>
                    </svg>
                </button>
                <p class="desc">
                    AMY uses only the best full-concert D&B Audiotechnik system with the most experienced technicians. A full range of microphones, consoles, band and DJ equipment plus monitors are also available.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <img src="../EMS/assets/img/icon3.png" alt="">
            </div>
            <div class="col">
                <button class="btn btn-warning">Staging
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="m12.563 5.25 6.75 6.75-6.75 6.75"></path>
                        <path d="M18.375 12H4.687"></path>
                    </svg>
                </button>
                <p class="desc">
                    AMY can create new, self-contained temporary structures. Motorized truss systems, self-climbing roof systems, modular staging, catwalks, podiums, etc. We also provide event power distribution and generation.
                </p>
            </div>
            <div class="col">
                <img src="../EMS/assets/img/icon6.png" alt="">
            </div>
            <div class="col">
                <button class="btn btn-warning">Lighting
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="m12.563 5.25 6.75 6.75-6.75 6.75"></path>
                        <path d="M18.375 12H4.687"></path>
                    </svg>
                </button>
                <p class="desc">
                    From elegant ballroom lighting to a full concert/electronic dance party light show, Oxygen uses sleek, state of the art, energy-efficient lighting gear with effects that go from subtle to spectacular.
                </p>
            </div>
            <div class="row">
                <div class="col">
                    <img src="../EMS/assets/img/icon5.png" alt="">
                </div>
                <div class="col">
                    <button class="btn btn-warning">Integration
                        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="m12.563 5.25 6.75 6.75-6.75 6.75"></path>
                            <path d="M18.375 12H4.687"></path>
                        </svg>
                    </button>
                    <p class="desc">
                        The seamless integration of lighting, sound and video to create event experiences which are second to none.
                    </p>
                </div>
                <div class="col">
                    <img src="../EMS/assets/img/icon4.png" alt="">
                </div>
                <div class="col">
                    <button class="btn btn-warning">Video
                        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="m12.563 5.25 6.75 6.75-6.75 6.75"></path>
                            <path d="M18.375 12H4.687"></path>
                        </svg>
                    </button>
                    <p class="desc">
                        Bringing your events to life with cutting edge multi-media technology like 3-D video mapping using high-definition projectors, HD video walls and LED flatscreens amongst others.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Remove the container if you want to extend the Footer to full width. -->
    <div class="footer-content">
        <!-- Footer -->
        <footer class="text-center text-lg-start text-white" style="background-color: #929fba">
            <!-- Grid container -->
            <div class="container p-4 pb-0">
                <!-- Section: Links -->
                <section class="">
                    <!--Grid row-->
                    <div class="row">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                            <h6 class="text-uppercase mb-4 font-weight-bold">
                                AMY Events
                            </h6>
                            <p class="text-left text-white">
                                AMY events is always ready to serve you the best event as you want . Feel free to contact us anytime and anywhere . It's always been pleasure to have clients likes you
                            </p>
                        </div>
                        <!-- Grid column -->

                        <hr class="w-100 clearfix d-md-none" />


                        <hr class="w-100 clearfix d-md-none" />

                        <!-- Grid column -->
                        <hr class="w-100 clearfix d-md-none" />

                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3 foot-add">
                            <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
                            <p><i class="fa-solid fa-house"></i> Gandhinagar- 382002</p>
                            <p><i class="fas fa-envelope mr-3"></i> eventsamy@gmail.com </p>
                            <p><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
                            <p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3 icons">
                            <h6 class="text-uppercase mb-4 font-weight-bold">Follow us</h6>

                            <!-- Facebook -->
                            <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998" href="https://facebook.com" role="button"><i class="fab fa-facebook-f"></i></a>

                            <!-- Twitter -->
                            <a class="btn btn-primary btn-floating m-1" style="background-color: #55acee" href="https://twitter.com" role="button"><i class="fab fa-twitter"></i></a>

                            <!-- Google -->
                            <!-- <a class="btn btn-primary btn-floating m-1" style="background-color: #dd4b39" href="https://google.com" role="button"><i class="fab fa-google"></i></a> -->

                            <!-- Instagram -->
                            <a class="btn btn-primary btn-floating m-1" style="background-color: #ac2bac" href="https://instagram.com" role="button"><i class="fab fa-instagram"></i></a>

                            <!-- Linkedin -->
                            <a class="btn btn-primary btn-floating m-1" style="background-color: #0082ca" href="https://linkedincom" role="button"><i class="fab fa-linkedin-in"></i></a>
                            <!-- Github -->
                            <a class="btn btn-primary btn-floating m-1" style="background-color: #333333" href="https://github.com" role="button"><i class="fab fa-github"></i></a>
                        </div>
                    </div>
                    <!--Grid row-->
                </section>
                <!-- Section: Links -->
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
                © 2022 Copyright:
                <a class="text-white" href="">eventsbyamy@gmail.com</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->
    </div>
    <!-- End of .container -->




    <script>
        const $dropdown = $(".dropdown");
        const $dropdownToggle = $(".dropdown-toggle");
        const $dropdownMenu = $(".dropdown-menu");
        const showClass = "show";

        $(window).on("load resize", function() {
            if (this.matchMedia("(min-width: 768px)").matches) {
                $dropdown.hover(
                    function() {
                        const $this = $(this);
                        $this.addClass(showClass);
                        $this.find($dropdownToggle).attr("aria-expanded", "true");
                        $this.find($dropdownMenu).addClass(showClass);
                    },
                    function() {
                        const $this = $(this);
                        $this.removeClass(showClass);
                        $this.find($dropdownToggle).attr("aria-expanded", "false");
                        $this.find($dropdownMenu).removeClass(showClass);
                    }
                );
            } else {
                $dropdown.off("mouseenter mouseleave");
            }
        });
    </script>
    <!-- JS for hemburger -->
    <script>
        $(document).ready(function() {

            $('.first-button').on('click', function() {

                $('.animated-icon1').toggleClass('open');
            });
            $('.second-button').on('click', function() {

                $('.animated-icon2').toggleClass('open');
            });
            $('.third-button').on('click', function() {

                $('.animated-icon3').toggleClass('open');
            });
        });
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- fullpage.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/4.0.11/fullpage.min.js" integrity="sha512-ojnoeSkK5NDwnuW5S0ZnddobHez8Bx1yVa3RE+Cd0fGEuY/NEd4sgVF/CJ6eDtnOeLZLbTJpNFrCkUYbHS2hRA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"></script>
    <script src="assets/vendor/js/vendor.bundle.base.js"></script>
    <script src="assets/vendor/chart.js/Chart.min.js"></script>
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/todolist.js"></script>
    <script src="assets/js/file-upload.js"></script>
    <!-- <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script> -->
    <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
</body>

</html>
<?php
$db->closeConnetion();
?>