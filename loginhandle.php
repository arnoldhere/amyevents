
<?php
session_start();
include "dbconnect.php";
try {
    $db = new newdb();
    $conn = $db->openConnection();


    if ((isset($_POST['loginbtn']))) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $_COOKIE = $email;
        $role = $_POST['role'];
        echo $role;
        if ($role == "user") {
            $query = "SELECT * FROM `user` WHERE email = :email AND password = :password";
            $prepare = $conn->prepare($query);
            //named query as a associative array
            $data = [
                ':email' => $email,
                ':password' => $password
            ];
            $execute = $prepare->execute($data);

            if ($execute) {
                $users  = $prepare->fetchAll(PDO::FETCH_ASSOC);
                foreach ($users as $user) {
                    //set session variables
                    $_SESSION['email'] = $email;
                    $_SESSION['id'] = $user['id'];
                }
                // echo "<script>window.location.replace('use_home.php');</script>";
                header("location:use_home.php");
            } else {
                echo "<script>alert('Invalid username or password');</script>";
            }
        } else {

            $query = "SELECT * FROM `admintbl` WHERE email = :email AND password = :password";
            $data = [
                ':email' => $email,
                ':password' => $password
            ];
            $prepare1 = $conn->prepare($query);
            $execute1 = $prepare1->execute($data);

            if (!$execute1) {
                echo "<script>alert('Invalid username or password');</script>";
            } else {
                echo "<script>window.location.replace('dashboard.php');</script>";
            }
        }
    } else {
        echo "<script>alert('Please select role...!');</script>";
        echo "<script>window.location.href = 'index.php';</script>";
    }
} catch (PDOException $e) {
    echo "<script>'error in database connection </script>" . $e->getMessage();
}
$db->closeConnetion();
