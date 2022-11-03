<?php
session_start();
include "dbconnect.php";
try {
    $db = new newdb();
    $conn = $db->openConnection();
} catch (PDOException $e) {
    echo "Error" . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://fonts.googleapis.com/css2?family=Alkalami&family=Playfair+Display:wght@500&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMY events </title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- AOS library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../EMS/assets/css/user.css">
    <!-- <link rel="stylesheet" href="../EMS/assets/css/style.css"> -->
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    </script>
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
                                    <button class="dropdown-item" href="use_logout.php">Log out</button>
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

    <!-- booking form -->
    <section class="form-book">
        <div class="bg-image h-100" style="background-image: url('../EMS/assets/img/parallox1.jpg');">
            <div class="mask d-flex align-items-center h-100">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-10 col-lg-7 col-xl-6">
                            <div class="card mask-custom">
                                <div class="card-body p-5 text-danger">
                                    <div class="my-4">
                                        <h2 class="p-4 shadow-4 text-bg-info rounded-3 text-center mb-5" style="background-color: hsl(0, 0%, 94%);">FeedBack</h2>
                                        <form class="form" name="bookform" id="bookform" enctype="multipart/form-data" method="POST" action="contact_handle.php">
                                            <!-- 2 column grid layout with text inputs for the first and last names -->
                                            <div class="row">
                                                <div class="col-12 mb-4">
                                                    <div class="form-outline ">
                                                        <input type="text" id="form3Example1" class="form-control form-control-lg" name="email" required />
                                                        <label class="form-label" for="form3Example1">Enter email</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 mb-4">
                                                    <div class="form-outline ">
                                                        <textarea id="form3Example1" class="form-control form-control-lg" name="msg" required /></textarea>
                                                        <label class="form-label" for="form3Example1">Type a message</label>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <!-- Submit button -->
                                    <button type="submit" name="btn" class="btn btn-danger btn-block mb-4">Send</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Remove the container if you want to extend the Footer to full width. -->
    <div class="footer-content position-relative top-0">
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
    <!-- AOS library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js" integrity="sha512-A7AYk1fGKX6S2SsHywmPkrnzTZHrgiVT7GcQkLGDe2ev0aWb8zejytzS8wjo7PGEXKqJOrjQ4oORtnimIRZBtw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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