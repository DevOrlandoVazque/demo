<?php

	include("db_connection.php");

	$data = '<table class="table table-bordered table-striped">
						<tr>
							<th>Id</th>
							<th>Producto</th>
							<th>Cantidad</th>
							<th>Tipo</th>
							<th></th>
							<th></th>
						</tr>';

	$query = "SELECT * FROM productos";

	if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }

    if(mysqli_num_rows($result) > 0)
    {
    	while($row = mysqli_fetch_assoc($result))
    	{
    		$data .= '<tr>
				<td>'.$row['id'].'</td>
				<td>'.$row['nombreproducto'].'</td>
				<td>'.$row['cantidad'].'</td>
				<td>'.$row['tipo'].'</td>
				<td>
					<button onclick="GetUserDetails('.$row['id'].')" class="btn btn-warning"><i class="fas fa-edit"></i></button>
				</td>
				<td>
					<button onclick="DeleteUser('.$row['id'].')" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
				</td>
    		</tr>';
    	}
    }
    else
    {
    	// records now found 
    	$data .= '<tr><td colspan="6">No hay registros!</td></tr>';
    }

    $data .= '</table>';

    echo $data;
?>