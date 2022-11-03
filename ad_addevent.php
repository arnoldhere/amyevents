<?php
session_start();
include "dbconnect.php";
try{
$db = new newdb();
$conn = $db->openConnection();
$event = $_POST['event'];
if(isset($_POST['add'])){
    
    $query= "INSERT INTO  eventcategory  (eventCategory) VALUES (:event)";
    $params = [
        ':event'=> $event
    ];
    $prepare= $conn->prepare($query);
    $execute= $prepare->execute($params);

if($execute){
        echo "<script> alert('Event has been inserted successfully');</script>";
        header('location:ad_manageevents.php');
}else{
    echo " error in adding event";
}


}




}catch (PDOException $e) {
    echo "<script>'error in database connection </script>" . $e->getMessage();
}
$db->closeConnetion();
