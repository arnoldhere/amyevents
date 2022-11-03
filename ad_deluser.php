<?php

session_start();
include "dbconnect.php";
$db = new newdb();
$conn = $db->openConnection();

if (isset($_GET['delid'])) {
    $id = intval($_GET['delid']);
    $query = "DELETE  FROM `user` WHERE id = $id";
    $prepare = $conn->prepare($query);
    // $prepare->bindParam($id, $id, PDO::PARAM_STR);
    $execute = $prepare->execute();


    if ($execute) {
        echo "<script>alert('Data deleted');</script>";
        echo "<script>window.location.href = 'ad_manageuser.php'</script>";
    }
    else{
        echo "<script>alert('Data can't delete try again    ');</script>";
    }
}
