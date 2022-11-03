 <?php
    session_start();
    include_once "dbconnect.php";
    $db = new newdb();
    $conn = $db->openConnection();
    if (isset($_POST['btn'])) {
        $email = $_POST['email'];
        $pass =  $_POST['password'];
        // $pass = md5($pass);
        $cpass = $_POST['confirmPassword'];

        $sql = "SELECT * FROM `user` WHERE email = :email";
        $data = [
            ':email' => $email
        ];
        $prepare = $conn->prepare($sql);
        $ex = $prepare->execute($data);
        if ($ex == true) {
            if ($pass == $cpass) {
                $query = "UPDATE `user` SET `password`= :password WHERE `email`=:email";
                $para = [
                    ':password' => md5($pass),
                    ':email' => $email
                ];
                $run = $conn->prepare($query);
                $exc = $run->execute($para);
                // if ($exc) {
                //     echo "<script>alert('Password updated');</script>";
                // } else {

                //     echo "<script>alert('try again');</script>";
                // }
            } else {

                echo "<script>alert('Password doesn't match');</script>";
            }
        } else {
            echo "<script>alert('Fill details properly');</script>";
        }
        echo "<script>alert('Password updated');</script>";

        echo "<script>window.location.href='index.php';</script>";
    }

    ?>