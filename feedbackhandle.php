<?php
session_start();
include "dbconnect.php";
$db = new newdb();
$conn = $db->openConnection();
    $email = $_POST['email'];
    $feedback = $_POST['feedback'];
if(isset($_POST['send'])){
    //query to be executed
    $query = "INSERT INTO `feedback` (email,feedback) VALUES(:email,:feedback)";
    //named query as a associative array
    $params = [
        ':email'=>$email,
        ':feedback'=>$feedback
    ];
    $prepare=$conn->prepare($query);
    $execute = $prepare->execute($params); 
    echo "<script> alert('Your feedback has been submited');</script>";
    header('location:feedback.php');
}

$db->closeConnetion();