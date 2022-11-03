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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMY events | signup</title>
    <!-- CSS only
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="../EMS/assets/css/style.css">
    <link rel="stylesheet" href="../EMS/assets/css/user.css">
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
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
        });
    </script>
    <script>
        //function to check email-availabiity-status
        function check() {
            jQuery.ajax({
                url: "checkemail.php",
                data: 'email=' + $("#email").val(),
                type: 'POST',
                success: function(data) {
                    $("#email-availabiity-status").html(data);
                },
                error: function() {
                    event.preventDefault();
                }
            })
        }
        //function to get the cities
        function getcity(value) {
            $.ajax({
                type: "POST",
                url: "fetchCity.php",
                data: 'state_id = ' + val,
                success: function(data) {
                    $("#city_id").html(data);
                },
                error: function() {
                    event.preventDefault();
                }
            })
        }
    </script>
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth p-0">
                <div class="row flex-grow">
                    <div class="col-md p-0">
                        <div class="auth-form-light text-left p-5">
                            <div class="brand-logo" align="center">
                                <img class="img-avatar mb-3" src="../EMS/assets/img/logo.png" alt=""><br>
                                <h4 class="text-dark">
                                    Create an account
                                </h4>
                            </div>
                            <form action="signuphandle.php" role="form" id="signupform" onsubmit="validate();return false;" name="signupform" method="post" enctype="multipart/form-data" class="form border p-5">
                                <div class="row">
                                    <div class="col form-group">
                                        <span class="msg bg-danger" id="fnmmsg"> Name must have only letters & spaces</span>
                                        <input type="text" name="fname" id="fname" class="form-control form-control-lg" placeholder="First name">
                                        <label for="" class="label">First name</label>
                                    </div>
                                    <div class="col form-group">
                                        <span class="msg bg-danger" id="lnmsg">Name must have only letters & spaces</span>
                                        <input type="text" name="lname" id="lname" class="form-control form-control-lg" placeholder="Last name">
                                        <label for="" class="label">Last name</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col form-group ">
                                        <span class="msg bg-success" style="margin-left: 5rem;top:10px;" id="emailmsg">Invalid Email&nbsp;&nbsp;</span>
                                        <span id="email-availabiity-status" class="bg-success"></span>
                                        <input type="text" class="form-control form-control-lg" name="email" id="email" placeholder="Email " onblur="check();">
                                        <label for="" class="label">Email</label>
                                    </div>
                                    <div class="col form-group">
                                        <span class="msg bg-danger" id="phnmsg">Phone no. must have 10 digits</span>
                                        <input type="text" id="phone" name="phone" class="form-control form-control-lg" placeholder="Phone">
                                        <label for="" class="label">Phone</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col form-group">
                                        <input type="date" id="dob" name="dob" class="form-control form-control-lg" required>
                                        <label for="" class="label">Date Of Birth</label>
                                    </div>
                                    <div class="col">
                                        <label for="" class="label">Gender</label><br>
                                        <div class="form-check-inline align-items-baseline">
                                            <input type="radio" name="gender" class="form-check-inline mt-2" value="male" id="male">
                                            <span for="" class="form-check-label mr-4">Male</span>
                                            <input type="radio" name="gender" class="form-check-inline mt-2" value="female" id="female">
                                            <span for="" class="form-check-label mr-4">Female</span>
                                            <input type="radio" name="gender" class="form-check-inline mt-2" value="other" id="other">
                                            <span for="" class="form-check-label mr-4">Other</span>
                                            <span class="msg bg-danger" id="sexmsg">Select your gender</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col form-group">
                                        <label for="" class="label">State</label>
                                        <select class="selectpicker  form-select form-select-md p-1" onChange="getcity(this.value);" name="select_state" id="select_state" required>
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
                                    <!-- <div class="col form-group">
                                        <label for="" class="label">City</label>
                                        <select name="city_id" id="city_id" class="selectpicker form-select form-select-md p-1">
                                            <option value="" selected disabled>---CITY---</option>
                                        </select>
                                    </div> -->
                                </div>
                                <div class="row">
                                    <div class="col form-group ">
                                        <span class="msg bg-danger" id="passmsg">Password must contain atleast 1 numeric & 1 alphabetical & 1 special character</span>
                                        <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="Password length of min 6">
                                        <label for="" class="label">Password</label>
                                    </div>
                                    <div class="col form-group">
                                        <span class="msg bg-danger" id="cpassmsg">Password not match</span>
                                        <input type="password" id="cpassword" name="cpassword" class="form-control form-control-lg" placeholder="Confirm password">
                                        <label for="" class="label">Confirm password</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col form-group">
                                        <span class="msg bg-danger" id="filemsg">Upload your photo</span>
                                        <input type="file" name="file" id="file" class="form-control form-control-lg" required>
                                        <label for="" class="label">Profile Photo</label>
                                    </div>
                                </div>
                                <div class="mt-3 row">
                                    <div class="col">
                                        <button name="signupbtn" id="signupbtn" type="submit" class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn">CREATE</button>
                                    </div>
                                    <div class="col">
                                        <button name="reset" type="reset" class="btn btn-block btn-danger btn-lg font-weight-medium auth-form-btn">RESET</button>
                                    </div>
                                </div>
                                <div class="text-center mt-3 font-weight-light">
                                    <a href="index.php" class="text-bg-secondary">
                                        Already have an account ? <span class="text-danger"> Login</span>
                                    </a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <script src="../EMS/assets/js/signup.js"></script> -->
        <script>
            function validate() {
                const form = document.getElementById('signupform');
                var fnm = document.querySelector('#fname').value;
                var regxnm = /^[a-zA-Z ]+$/;
                if (regxnm.test(fnm) == false) {
                    document.querySelector('#fnmmsg').classList.add('msgpopup');
                    document.getElementById('fname').focus();
                    return false;
                }

                var lnm = document.querySelector('#lname').value;
                if (regxnm.test(lnm) == false) {
                    document.querySelector('#lnmsg').classList.add('msgpopup');
                    document.getElementById('lname').focus();
                    return false;
                }

                var email = document.querySelector('#email').value;
                var regxemail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                if (regxemail.test(email) == false) {
                    document.querySelector('#emailmsg').classList.add('msgpopup');
                    document.getElementById('email').focus();
                    return false;
                }

                var phn = document.querySelector('#phone').value;
                var regxphn = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
                if (regxphn.test(phn) == false) {
                    document.querySelector('#phnmsg').classList.add('msgpopup');
                    document.getElementById('phone').focus();
                    return false;
                }

                if (form['gender'].checked == false) {
                    document.querySelector('#sexmsg').classList.add('msgpopup');
                    return false;
                }

                var pass = document.querySelector('#password').value;
                var regxpass = /^(?=.*[a-zA-z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{6,})/;
                if (regxpass.test(pass) == false) {
                    document.querySelector('#passmsg').classList.add('msgpopup');
                    document.getElementById('password').focus();
                    return false;
                }

                var cpass = document.querySelector('#cpassword').value;
                if (pass != cpass) {
                    document.querySelector('#cpassmsg').classList.add('msgpopup');
                    document.getElementById('cpassword').focus();
                    return false;
                }

                var file = document.getElementById('file').value;
                var f = file.files;
                if (f.length == 0) {
                    document.querySelector('#filemsg').classList.add('msgpopup');
                    document.getElementById('file').focus();
                    return false;
                }
                return true;
            };
        </script>
        <script src="../EMS/assets/vendor/js/vendor.bundle.base.js"></script>
        <script src="../EMS/assets/vendor/chart.js/Chart.min.js"></script>
        <script src="../EMS/assets/js/off-canvas.js"></script>
        <script src="../EMS/assets/js/hoverable-collapse.js"></script>
        <script src="../EMS/assets/js/misc.js"></script>
        <script src="../EMS/assets/js/todolist.js"></script>
        <script src="../EMS/assets/js/file-upload.js"></script>
        <script src="../EMS/assets/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="../EMS/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
</body>

</html>