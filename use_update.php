<?php
session_start();
include "dbconnect.php";

$db = new newdb();
$conn = $db->openConnection();

if (isset($_POST['update'])) {
    //query operation
    // $id1 = $_SESSION["id"];
    $fname1 = $_POST['fname'];
    $lname1 = $_POST['lname'];
    $email1 = $_SESSION['email'];
    $phone1 = $_POST['phone'];
    $DOB1 = $_POST['dob'];
    $gender1 = $_POST['gender'];
    $state1 = $_POST['select_state'];
    $password1 = $_POST['password'];
    $password1 = md5($password1);

    $idsql = "SELECT * FROM `user` WHERE email = '$email1'";
    $run = $conn->prepare($idsql);
    // $dt = [
    //     ':email' => $email1
    // ];
    $ex = $run->execute();
    if ($ex) {
        $i = $run->fetchAll(PDO::FETCH_ASSOC);
        foreach ($i as $j) {
            $sid = $j['id'];
        }
    }

    // $sid = $_SESSION["id"];
    $targetdir = "uploadfiles/";

    $filenm = basename($_FILES['file']['name']); //get the filename
    $filepath = $targetdir . $filenm;
    //validate the extension
    $fileType = pathinfo($filepath, PATHINFO_EXTENSION);
    strtolower($fileType);
    if (!empty($_FILES['file']['name'])) {
        $allowTypes = array('jpg', 'jpeg', 'png', 'pdf', 'doc');
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $filepath)) {

                // $sql = ;

                $prepare = $conn->prepare("UPDATE `user` SET `firstname`= '$fname1' , `lastname`= '$lname1',`email`='$email1',`phone`= '$phone1' ,`DOB`='$DOB1',`gender`= '$gender1',`state`= '$state1',`password`='$password1' ,`imgUrl`= '$filepath'  WHERE  id ='$sid'");
                $execute = $prepare->execute();
                if ($execute) {
                    echo "<script> alert('Profile has been updated');window.location.href.replace('user_home.php');</script>";
                }


                echo "<script> window.location.href = 'user_profile.php';</script>";
            }
        }
    }
}


                // $params = [
                //     ':firstname' => $fname1,
                //     ':lastname' => $lname1,
                //     ':email' => $_SESSION['email'],
                //     ':phone' => $phone1,
                //     ':DOB' => $DOB1,
                //     ':gender' => $gender1,
                //     ':state' => $state1,
                //     ':password' => $password1,
                //     ':imgUrl' => $filepath,
                //     ':id' => $sid
                // ];