<?php
include_once  "dbconnect.php";
try {
    $db = new newdb();
    $con = $db->openConnection();
    if (!empty($_POST['select_state'])) {
        $var =  $_POST['select_state'];
        // $stmt = $con->prepare("SELECT * FROM `cities` WHERE state_id= ' " . $_POST['select_state'] . "'");
        $stmt  = $con->prepare("SELECT * FROM cities WHERE state_id = ". $_POST['select_state'] );
        $stmt->execute();
        $cities = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
    <option selected disabled value=""> ---select city--- </option>
    <?php
    foreach ($cities as $city) {
    ?>
        <option class="text-dark" value="<?php echo $city['city']; ?>">
            <?php echo $city['city']; ?></option>
<?php
    }
    }  
} catch (PDOException $e) {
    $e->getMessage();
}

?>