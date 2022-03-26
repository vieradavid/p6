<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Actividad 1. IAW</title>
	<link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/product/">
	<link href="bootstrap.min.css" rel="stylesheet">
	<style type="text/css">
		.table {
			width: auto;
		}
	</style>
</head>
<body class="bg-success p-2 text-dark bg-opacity-10">
	<div  class="container-sm">
		<div class="container-s">
			<form class="row g-3" action="index.php" name="forms" method="post">
				<div class="form-group col-sm-6">
  				<div class="col-auto">
						<label for="cons" class="form-label"><strong>Ingresa la consulta</strong></label>
					</div>
					<div class="col-auto">
						<input type="text" class="form-control" id="cons" name="consulta">
					</div>
					<div class="col-auto">
						<button type="submit" class="btn btn-primary mb-3 col-auto">Enviar</button>
					</div>
				</div>
  		</form>
		</div>
		<div class="container-s">
			<?php
				require 'connect.php';
				$sql = $_POST["consulta"];
				$resultado = mysqli_query($conn, $sql);
				$infocampos = mysqli_fetch_fields($resultado);
			?>
			<div class="container-s col-sm">
					<div class="lead">
						<p class="text-info bg-dark"> Mostrando datos para (<?php echo $sql; ?>)</p>
					</div>
					<div class="container container-sm">
						<table class="table table-bordered table-striped table-responsive">
							<?php
							if (mysqli_num_rows($resultado) > 0) {
								echo "<tr>";
								foreach ($infocampos as $campo){		//Obtener los campos de la consulta
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
		</div>
	</div>
</body>
</html>
