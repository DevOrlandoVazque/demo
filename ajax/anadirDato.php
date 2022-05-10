<?php

include("conexion.php");

		$idproducto = $_POST['idproducto'];
		$producto = $_POST['producto'];
		$cantidad = $_POST['cantidad'];
		$tipo = $_POST['tipo'];

		$query = "INSERT INTO productos(id, nombreproducto, cantidad, tipo) VALUES('$idproducto', '$producto', '$cantidad', '$tipo')";
		if (!$result = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	    }
?>