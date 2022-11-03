<?php
session_start();
include "dbconnect.php";
try{
    $db = new newdb();
    $conn = $db->openConnection();
    if($conn==null){ 
        echo "<script>alert('Database connection failed...!'); </script>";
        exit;
    }

    //query operation
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $DOB = $_POST['dob'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $state = $_POST['select_state'];
    // $city = $_POST['select_city'];

    $targetdir = "uploadfiles/";
    $filenm = basename($_FILES['file']['name']);//get the filename
    $filepath = $targetdir.$filenm;
    //validate the extension
    $fileType = pathinfo($filepath,PATHINFO_EXTENSION);
    strtolower($fileType);


    if(isset($_POST['signupbtn'])){
        if(!empty($_FILES['file']['name'])){
            $allowTypes = array('jpg','jpeg','png','pdf','doc');
            if(in_array($fileType,$allowTypes)){
                if(move_uploaded_file($_FILES['file']['tmp_name'],$filepath)){
                    $query= "INSERT INTO `user` (firstname,lastname,email,phone,DOB,gender,state,password,imgUrl) VALUES (:fname,:lname,:email,:phone,:DOB,:gender,:state,:password,:imgUrl)";

                    //prepare & fire
                    $prepare = $conn->prepare($query);
                    //named query
                    $data = [
                        ':fname'=>$fname,
                        ':lname'=>$lname,
                        ':email'=>$email,
                        ':phone'=>$phone,
                        ':DOB'=>$DOB,
                        ':gender'=>$gender,
                        ':state'=>$state,
                        // ':city'=>$city,
                        ':password'=>md5($password),
                        ':imgUrl'=>$filepath
                    ];
                    $execute = $prepare->execute($data);
                    echo"<script>alert('Created successfully');</script";
                }
            }
            else{
                echo"<script>alert('Invalid file type');</script";
            }
        }
    }
    echo"<script>alert('created succesfully');</script";
    header('location:index.php');
}
catch (PDOException $e) {
    echo "<script>'error in database connection </script>" . $e->getMessage();
}
$db->closeConnetion();
