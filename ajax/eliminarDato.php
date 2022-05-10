<?php

    include("conexion.php");

    $user_id = $_POST['id'];

    $query = "DELETE FROM productos WHERE id = '$user_id'";
    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }
?>