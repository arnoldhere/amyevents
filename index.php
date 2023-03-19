<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMY events</title>
    <style>
        .ulrole {
            background-color: #555;
            padding: 1rem;
            width: 85%;
            text-align: center;
        }

        .ulrole>li {
            margin-left: 1rem !important;
            /* padding: 1rem !important; */
            width: 50% !important;
            text-align: left !important;
            color: #fff !important;
        }
    </style>
        <!-- CSS only
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="../EMS/assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable(); // ID From dataTable 
            $('#dataTableHover').DataTable(); // ID From dataTable with Hover
            $(".nav li").hover(function() {
                var isHovered = $(this).is(":hover");
                if (isHovered) {
                    $(this).children("ul").stop().slideDown(300);
                } else {
                    $(this).children("ul").stop().slideUp(300);
                }
            });
            $('#admintxt').click(function() {
                $('#txtadd').text('Administrator');
            })
            $('#usertxt').click(function() {
                $('#txtadd').text('User');
            })
        });
    </script>
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth p-0">
                <div class="row flex-grow">
                    <div class="col-md-4 p-0">
                        <div class="auth-form-light text-left p-5">
                            <div class="brand-logo" align="center">
                                <img class="img-avatar mb-1" src="../EMS/assets/img/logo.png" alt=""><br>
                                <h4 class="text-muted mt-4">
                                    Welcome <span class="text-success" id="txtadd"> </span>
                                </h4>
                            </div>
                            <form role="form" action="loginhandle.php" id="loginform" name="loginform" method="post" enctype="multipart/form-data" class="form border px-3 pt-3">
                                <div class="form-group ">
                                    <input type="text" value="<?php if (isset($_COOKIE['email'])) {
                                                                    echo $_COOKIE['email'];
                                                                } ?>" class="form-control form-control-lg" name="email" id="email" placeholder="Email" autocomplete="off">
                                    <label for="" class="label">Email</label>
                                </div>
                                <div class="form-group ">
                                    <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Password">
                                    <label for="" class="label">Password</label>
                                </div>
                                <div class="nav">
                                    <ul class="">
                                        <li><a href="javascript:void(0);">Login As
                                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12 21.75c5.384 0 9.75-4.366 9.75-9.75 0-5.385-4.366-9.75-9.75-9.75A9.75 9.75 0 0 0 2.25 12c0 5.384 4.365 9.75 9.75 9.75ZM7.5 9.064l4.5 4.5 4.5-4.5 1.06 1.061-5.56 5.56-5.56-5.56 1.06-1.06Z"></path>
                                                </svg></a>
                                            <ul class="ulrole">
                                                <li> <input type="radio" id="admintxt" name="role" value="admin">Admin
                                                </li>
                                                <li> <input type="radio" id="usertxt" name="role" value="user">User
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="mt-3">
                                    <button style="margin-top: 4rem;" name="loginbtn" class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn">LOGIN</button>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    <a href="forgot_password.php" class="text-secondary">
                                        Forgot Password
                                    </a>
                                </div>
                                <div class="text-center mt-3 font-weight-light">
                                    <a href="signup.php" class="text-bg-secondary">
                                        Not have an account ? <span class="text-danger"> Sign Up</span>
                                    </a>
                                </div>

                            </form>

                        </div>
                    </div>
                    <div class="col-md-8 p-0 ">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="https://images.unsplash.com/photo-1469371670807-013ccf25f16a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8ZXZlbnQlMjBkZWNvcmF0aW9ufGVufDB8fDB8fA%3D%3D&w=1000&q=80" alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="https://hire4event.com/blogs/wp-content/uploads/2019/03/Type-of-events.jpg" alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="https://images.unsplash.com/photo-1514525253161-7a46d19cd819?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8OHx8ZXZlbnQlMjBwbGFubmluZ3xlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60" alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://images.unsplash.com/photo-1530103862676-de8c9debad1d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MjB8fGV2ZW50JTIwcGxhbm5pbmd8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60" alt="" class="d-block w-100">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://images.unsplash.com/photo-1527529482837-4698179dc6ce?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8OXx8ZXZlbnQlMjBwbGFubmluZ3xlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60" alt="" class="d-block w-100">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://images.unsplash.com/photo-1505373877841-8d25f7d46678?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8ZXZlbnR8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60" alt="" class="d-block w-100">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <script>
        document.querySelectorAll('.form-control').forEach((element) => {
            element.addEventListener("blur", (event) => {
                if (event.target.value != "") {
                    event.target.nextElementSibling.classList.add("filled");
                } else {
                    event.target.nextElementSibling.classList.remove("filled");
                }
            });
        })
        var form = document.querySelector('#loginform');
        form.addEventListener('submit', function() {
            if (document.querySelector('#password').value == "") {
                window.alert("Please enter password to Login");
            }

            return false;
            window.location.replace('index.php');
        });
    </script>
    <script src="assets/vendor/js/vendor.bundle.base.js"></script>
    <script src="assets/vendor/chart.js/Chart.min.js"></script>
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/todolist.js"></script>
    <script src="assets/js/file-upload.js"></script>
    <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>



</body>

</html>