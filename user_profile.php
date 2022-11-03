<?php
session_start();
include "dbconnect.php";
$db = new newdb();
$conn = $db->openConnection();
$user_email = $_SESSION['email'];
if (isset($_SESSION['email'])) {
    $sql = "SELECT * FROM `user` WHERE `email` = :useremail";
    $data = [
        ':useremail' => $user_email
    ];
    $prepare = $conn->prepare($sql);
    $execute = $prepare->execute($data);
}
?>
<!DOCTYPE html>
<html lang="en">
<style>

</style>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://fonts.googleapis.com/css2?family=Alkalami&family=Playfair+Display:wght@500&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile </title>
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

    <section class="" style="background-color: #9de2ff;">
        <div class="container py-5  ">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md">
                    <div class="card" id="user-profile-card" style="border-radius: 15px;">
                        <?php
                        $users = $prepare->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($users as $user) {
                        ?>
                            <div class="d-flex text-black">
                                <div class="mx-2 flex-shrink-0">
                                    <img src="<?php echo $user['imgUrl']; ?>" alt="user Profile" class="mt-2 img-fluid img-thumbnail" style="width: 210px; border-radius: 10px;height:200px;">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <div class="d-flex justify-content-start rounded-3 p-5 mb-2" style="background-color: #efefef;">
                                        <div class="text-left">
                                            <h6 class="mb-1"><?php echo $user['firstname'] . " " . $user['lastname']; ?></h6>
                                            <h5 class="mb-1 text-muted"><?php echo $user['email'] ?></h5>
                                            <hr>
                                            <h6>
                                                Phone : <?php echo $user['phone']; ?>
                                            </h6>
                                            <h6>
                                                Date of birth : <?php echo $user['DOB']; ?>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="row d-flex">
                            <div class=" col btnbox">
                                <a href="use_home.php" class="btn btn-info">Home</a>
                                <!-- Modal -->
                                <div class="modal fade w-100" id="updatesector" tabindex="-1" aria-labelledby="updatesector" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content" style="width: 50rem !important;text-align: center;margin-left:-10rem;">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    Update Profile
                                                </h5>
                                                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="use_update.php" role="form" id="updateform" name="updateform" method="post" enctype="multipart/form-data" class="form border p-5">
                                                    <div class="row">
                                                        <div class="col form-group">
                                                            <label for="" class="label">First name</label>
                                                            <input type="text" name="fname" id="fname" class="form-control form-control-lg" placeholder="First name" value="<?php echo $user['firstname']; ?>">
                                                        </div>
                                                        <div class="col form-group">
                                                            <label for="" class="label">Last name</label>
                                                            <input type="text" name="lname" id="lname" class="form-control form-control-lg" placeholder="Last name" value="<?php echo $user['lastname']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col form-group">
                                                            <label for="" class="label">Phone</label>
                                                            <input type="text" id="phone" name="phone" class="form-control form-control-lg" placeholder="Phone" value="<?php echo $user['phone']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col form-group">
                                                            <label for="" class="label">Date Of Birth</label>
                                                            <input type="date" id="dob" name="dob" class="form-control form-control-lg" value="<?php echo $user['DOB']; ?>" required>
                                                        </div>
                                                        <div class="col">

                                                            <div class="form-check-inline align-items-baseline">
                                                                <label for="" class="label">Gender</label><br>
                                                                <input type="radio" name="gender" class="form-check-inline mt-2" value="male" id="male">
                                                                <span for="" class="form-check-label mr-4">Male</span>
                                                                <input type="radio" name="gender" class="form-check-inline mt-2" value="female" id="female">
                                                                <span for="" class="form-check-label mr-4">Female</span>
                                                                <input type="radio" name="gender" class="form-check-inline mt-2" value="other" id="other">
                                                                <span for="" class="form-check-label mr-4">Other</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col form-group">
                                                            <label for="" class="label">State</label>
                                                            <select class="selectpicker  form-select form-select-md p-1" onchange="getcity(this.value);" name="select_state" id="select_state" required>
                                                                <option value="" selected disabled>---Choose state---</option>
                                                                <?php
                                                                $stmt = $conn->prepare('SELECT * FROM tbl_states');
                                                                $stmt->execute();
                                                                $states = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                                foreach ($states as $state) {
                                                                ?>
                                                                    <option class="text-dark" value="<?php
                                                                                                        echo $state['name'];
                                                                                                        ?>">
                                                                        <?php echo $state['name']; ?></option><?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col form-group ">
                                                            <label for="" class="label">Password</label>
                                                            <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="Password ">
                                                        </div>
                                                        <div class="col form-group">
                                                            <label for="" class="label">Confirm password</label>
                                                            <input type="password" id="cpassword" name="cpassword" class="form-control form-control-lg" placeholder="Confirm password">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col form-group">
                                                            <label for="" class="label">Profile Photo</label>
                                                            <input type="file" name="file" id="file" class="form-control form-control-lg" value="<?php echo $user['imgUrl']; ?>" placeholder="select picture" required>
                                                        </div>
                                                    </div>
                                                    <div class="mt-3 row">
                                                        <div class="col">
                                                            <button name="update" id="updatebtn" type="submit" class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn">Update</button>
                                                        </div>
                                                        <div class="col">
                                                            <button name="reset" type="reset" class="btn btn-block btn-danger btn-lg font-weight-medium auth-form-btn">RESET</button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#updatesector" data-mdb-toggle="modal" data-mdb-toggle="update" class="btn btn-success" role="button">Update</a>
                                <a href="use_logout.php" onclick="<script>alert('log out in progress...');</script>" name="logout" class="btn btn-danger">logout</a>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
    </section>

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
                        <div class="col-md-4 mx-auto mt-3 foot-add">
                            <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
                            <p><i class="fa-solid fa-house"></i> Gandhinagar- 382002</p>
                            <p><i class="fas fa-envelope mr-3"></i> eventsamy@gmail.com </p>
                            <p><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
                            <p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-lg-3 col-xl-3 mx-auto mt-3 icons">
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