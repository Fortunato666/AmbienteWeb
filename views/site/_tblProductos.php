Productos

<?php
$factura = Yii::$app->session['mifactura'] ;
?>
<table class="table">
	<tr>
		<td>id</td>
		<td>nombre</td>
		<td>precio</td>
		<td>cantidad</td>
		<td>descuento</td>
		<td>total/producto</td>
		
	</tr>
	<?php
	foreach($factura as $f):?>
	<tr>
		<td><?php echo $f['idproducto']; ?></td>
		<td><?php echo $f['nombre_producto']; ?></td>
		<td><?php echo $precio = $f['precio']; ?></td>
		<td><?php echo $f['cantidad']; ?></td>
		<td><?php echo $f['descuento']; ?></td>
		<td><?php echo $f['total']; ?></td>
	</tr>
	<?php endforeach;?>
	<?php $suma = 0;
	foreach($factura as $f):?>
	<tr>
		<?php $suma = $suma + $f['total']; ?>
	</tr>
	<?php endforeach;?>
</table>
<p align="center"><?php echo 'Total: $' , $suma?></p>
<br>

<button onclick="Guardarfactura();">Guardar Factura</button>
