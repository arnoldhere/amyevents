<?php
session_start();
include "dbconnect.php";
try {
    $db = new newdb();
    $conn = $db->openConnection();
    if ($conn == null) {
        echo "<script>alert('Database connection failed...!'); </script>";
        exit;
    }
        if (isset($_POST['btn'])) {
            $email = $_POST['email'];
            $msg = $_POST['msg'];
            $data = [
                ':email' => $email,
                ':msg' => $msg
            ];
            $query = "INSERT INTO feedback (email,feedback)VALUES(:email,:msg)";
            $prepare = $conn->prepare($query);
            $execute = $prepare->execute($data);
            if ($execute) {
                echo "<script>window.alert('Your message has been sent to our team we will contact you soon !'); window.location.replace('use_contact.php');</script>";
            } else {
                echo "<br> Retry ! Unable to fire Query ";
            }
        }
} catch (PDOException $e) {
    echo "<script>'error in database connection </script>" . $e->getMessage();
}
$db->closeConnetion();
