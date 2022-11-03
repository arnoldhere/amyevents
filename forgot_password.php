<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMY events | change password</title>
    <!-- CSS only
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" href="../EMS/assets/css/style.css"> -->
    <style>
        .mainDiv {
            display: flex;
            min-height: 100%;
            align-items: center;
            justify-content: center;
            background-color: #f9f9f9;
            font-family: 'Open Sans', sans-serif;
        }

        .cardStyle {
            width: 500px;
            border-color: white;
            background: #fff;
            padding: 36px 0;
            border-radius: 4px;
            margin: 30px 0;
            box-shadow: 0px 0 2px 0 rgba(0, 0, 0, 0.25);
        }

        #signupLogo {
            max-height: 100px;
            margin: auto;
            display: flex;
            flex-direction: column;
        }

        .formTitle {
            font-weight: 600;
            margin-top: 20px;
            color: #2F2D3B;
            text-align: center;
        }

        .inputLabel {
            font-size: 12px;
            color: #555;
            margin-bottom: 6px;
            margin-top: 24px;
        }

        .inputDiv {
            width: 70%;
            display: flex;
            flex-direction: column;
            margin: auto;
        }

        input {
            height: 40px;
            font-size: 16px;
            border-radius: 4px;
            border: none;
            border: solid 1px #ccc;
            padding: 0 11px;
        }

        input:disabled {
            cursor: not-allowed;
            border: solid 1px #eee;
        }

        .buttonWrapper {
            margin-top: 40px;
        }

        .submitButton {
            width: 70%;
            height: 40px;
            margin: auto;
            display: block;
            color: #fff;
            background-color: #065492;
            border-color: #065492;
            text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.12);
            box-shadow: 0 2px 0 rgba(0, 0, 0, 0.035);
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
        }

        .submitButton:disabled,
        button[disabled] {
            border: 1px solid #cccccc;
            background-color: #cccccc;
            color: #666666;
        }

        #loader {
            position: absolute;
            z-index: 1;
            margin: -2px 0 0 10px;
            border: 4px solid #f3f3f3;
            border-radius: 50%;
            border-top: 4px solid #666666;
            width: 14px;
            height: 14px;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
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
    <script>
        function check() {
            jQuery.ajax({
                url: "chkmailfp.php",
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
    </script>
</head>

<body>

    <div class="mainDiv">
        <div class="cardStyle">
            <form action="chngepassword.php" method="post" name="Form" id="Form">

                <img src="../EMS/assets/img/logo.png" id="signupLogo" />

                <h2 class="formTitle">
                    change your password
                </h2>
                <div class="inputDiv">
                    <label class="inputLabel" for="email">Your email</label>
                    <input type="email" id="email" name="email" required onblur="check();">
                    <span id="email-availabiity-status" class="bg-danger"></span>
                </div>
                <div class="inputDiv">
                    <label class="inputLabel" for="password">New Password</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="inputDiv">
                    <label class="inputLabel" for="confirmPassword">Confirm Password</label>
                    <input type="password" id="confirmPassword" name="confirmPassword">
                </div>

                <div class="buttonWrapper">
                    <button type="submit" id="submitButton" class="submitButton pure-button pure-button-primary" name="btn">
                        <span>Continue</span>
                        <!-- <span id="loader"></span> -->
                    </button>
                </div>

            </form>
        </div>
    </div>



    <!-- <script>
        var password = document.getElementById("password"),
            confirm_password = document.getElementById("confirmPassword");


        function validatePassword() {
            if (password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Don't Match");
                return false;
            } else {
                confirm_password.setCustomValidity('');
                return true;
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;

        function enableSubmitButton() {
            document.getElementById('submitButton').disabled = false;
            document.getElementById('loader').style.display = 'none';
        }

        function disableSubmitButton() {
            document.getElementById('submitButton').disabled = true;
            document.getElementById('loader').style.display = 'unset';
        }

        function validateSignupForm() {
            var form = document.getElementById('signupForm');

            for (var i = 0; i < form.elements.length; i++) {
                if (form.elements[i].value === '' && form.elements[i].hasAttribute('required')) {
                    console.log('There are some required fields!');
                    return false;
                }
            }

            if (!validatePassword()) {
                return false;
            }
        }
    </script>
     -->
    <script>
        var form = document.querySelector('#Form');
        form.addEventListener('submit', function() {
            var regxpass = /^(?=.*[a-zA-z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{6,})/;
            var pass = document.querySelector('password').value;
            if (regxpass.test(pass) == false) {
                window.alert("Password must contain atleast 1 numeric & 1 alphabetical & 1 special character");
                return false;
            }
            var cpass = document.querySelector('#confirmPassword').value;
            if (pass != cpass) {
                window.alert("Password not match");
                return false;
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