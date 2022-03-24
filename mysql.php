<!DOCTYPE HTML>  
<html lang=es>
<head>
	<title>Ejercicios PHP MySQL</title>
	<link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/product/">
	<link href="bootstrap.min.css" rel="stylesheet">
	<style type="text/css">
		.table {
			width: auto;
		}
	</style>
</head>
<body class="text-primary">
	<?php
	require 'connect.php';
	$sql = $_POST["consulta"];
	//$sql = "SELECT * FROM clientes"; 
	$resultado = mysqli_query($conn, $sql);
	$infocampos = mysqli_fetch_fields($resultado);
	?>
<div class="container-s">
	<div class="lead">
		<p class="text-info bg-dark"> Mostrando datos para (<?php echo $sql; ?>)</p>
	</div>
	<div class="container container-sm">
		<table class="table table-bordered table-striped table-responsive">
		<?php
			if (mysqli_num_rows($resultado) > 0) {			
				echo "<tr>";
				foreach ($infocampos as $campo){       			  //Obtener los campos de la consulta
					echo "<th>". $campo->name. "</th>";
				}
				echo "</tr>";
				echo "<tr>";
				while($row = mysqli_fetch_assoc($resultado)) {    //Presentar los resultados
					foreach ($infocampos as $campo){
					echo "<td>". $row[$campo->name]. "</td>";
					}
				echo "</tr>";
				}
				$nlineas=mysqli_num_rows($resultado);
				echo "<tr class='text-dark'>Total resultados= $nlineas </tr>";
			} else {
				echo "0 results";
			}
			
			mysqli_close($conn);
		?>
		</table>
	</div>
</div>
</body>
</html>
