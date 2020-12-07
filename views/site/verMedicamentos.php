<h1>Ver medicamentos</h1>

<table class="table">
	<tr>
		<td>ID</td>
		<td>Nombre</td>
	</tr>

	<?php foreach($datos as $d): ?>
	<tr>
		<td><?php echo $d['idmedicamneto']; ?></td>
		<td><?php echo $d['nombre'];?></td>
	</tr>
   <?php endforeach;?>

</table>


<h1>Ver paciente</h1>

<table class="table">
	<tr>
		<td>ID</td>
		<td>Nombre paciente</td>
	</tr>

	<?php foreach($pacientes as $p): ?>
	<tr>
		<td><?php echo $p['idpaciente']; ?></td>
		<td><?php echo $p['nombres'];?></td>
	</tr>
   <?php endforeach;?>

</table>