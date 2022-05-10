<?php

include("conexion.php");

    $idproducto = $_POST['idproducto'];
	$producto=$_POST['producto'];
	$cantidad=$_POST['cantidad'];
    $tipo=$_POST['tipo'];

    $query = "UPDATE productos SET id='$idproducto', nombreproducto='$producto', cantidad = '$cantidad', tipo = '$tipo' WHERE id = '$idproducto'";
    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
}