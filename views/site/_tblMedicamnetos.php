Vista de medicamentos


<table class="table">
	<tr>
		<td>medicamento</td>
		<td>precio</td>
		<td>Eliminar</td>
	</tr>

	<?php foreach($data as $d):?>
	<tr>
		<td><?php echo $d['nombre'];?></td>
		<td><?php echo $d['precio'];?></td>
		<td><button class="btn btn-primary" onclick="DeleteMedicamentos('<?php echo $d["idmedicamneto"]; ?>')"> Eliminar</button> </td>
		
	</tr>
	<?php endforeach;?>
</table>