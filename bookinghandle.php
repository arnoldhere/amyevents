
<?php
session_start();
include "dbconnect.php";
try {
    $db = new newdb();
    $conn = $db->openConnection();

    if ((isset($_POST['btn']))) {
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $event = $_POST['event'];
        $venue = $_POST['venue'];
        //named query as a associative array
        $data = [
            ':email' => $email,
            ':phone' => $phone,
            ':event' => $event,
            ':venue' => $venue
        ];
        $query = "INSERT INTO booking (email,phone,event,venue)VALUES(:email,:phone,:event,:venue)";
        $prepare = $conn->prepare($query);
        $execute = $prepare->execute($data);
        //validate query execution
        if ($execute == true) {
            echo "<script>window.alert('Your Event has been booked our team will contact you soon !'); window.location.replace('use_bookevent.php');</script>";
            // echo "<br> Query Fired succesfully";
        } else {
            echo "<br> Retry ! Unable to fire Query ";
        }

        // header('location:use_bookevent.php');
    }
} catch (PDOException $e) {
    echo "<script>'error in database connection </script>" . $e->getMessage();
}
$db->closeConnetion();
