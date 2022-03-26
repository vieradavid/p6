<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Actividad 1 IAW p7</title>
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
			<form class="row g-3" action="update.php" name="forms" method="post">
				<div class="form-group col-sm-6">
					<div class="col-auto">
						<label for="cons" class="form-label"><strong>Ingresa la consulta de actualización</strong></label>
					</div>
					<div class="col-auto">
						<input type="text" class="form-control" id="cons" name="consultab">
					</div>
					<div class="col-auto">
						<button type="submit" class="btn btn-primary mb-3 col-auto">Enviar</button>
					</div>
				</div>
			</form>
		</div>
		<div class="container-s"
		<?php
		require 'connect.php';
		$sql1 = $_POST["consultab"];
		?>
		<div class="container-s col-sm">
			<?php
			try {
				if (mysqli_query($conn, $sql1)) {
					echo "Actualizacion  realizada correctamente";
				}else{
					echo "Se ha producido un error". mysqli_error($conn);
				}
			} catch (\Exception $e) {
				echo "ERRRROR";
			}


			mysqli_close($conn);
			?>
		</div>
	</div>
</div>
</body>
</html>
