<?php
include_once("./connect.php");

if(isset($_GET["id"])) {
    $id = $_GET["id"];
    $query = mysqli_query($db, "DELETE FROM staf WHERE id=$id");

    $max_id_query = mysqli_query($db, "SELECT MAX(id) FROM staf");
    $max_id_result = mysqli_fetch_array($max_id_query);
    $max_id = $max_id_result[0];

 
    mysqli_query($db, "ALTER TABLE staf AUTO_INCREMENT = " . ($max_id + 1));

    header("Location: staff.php");
    exit;
}
?>