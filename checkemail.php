<?php
    session_start();
    include_once "dbconnect.php";
    $db = new newdb();
    $con= $db->openConnection();
    $stmt = $con->prepare("SELECT * FROM user WHERE email = :email");
    $stmt->execute([
        ':email'=>$_POST['email']
    ]);
    if($stmt->rowCount()>0){
        echo "<b>email already exists</b>";
    }else{
        echo "<b>email is available</b>";
    }
    $db->closeConnetion();
?>