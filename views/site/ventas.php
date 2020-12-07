<?php $cantidad = 1;
echo Yii::$app->controller->renderPartial('_url'); ?>
<h1>Detalle Factura</h1>

<table class="table">
	<tr>
		<td>Seleccione Cliente</td>
		<td>
			<select id="id_factura">
				<?php foreach ($dataF as $f) : ?>
					<option value="<?php echo $f['id_factura']; ?>"><?php echo $f['num_factura']; ?> - <?php echo $f['nombre_cliente']; ?></option>
				<?php endforeach; ?>
			</select>
		</td>
	</tr>

	<tr>
		<td>Seleccione Producto</td>
		<td>
			<select id="idproducto">
				<?php foreach ($productos as $p) : ?>
					<option value="<?php echo $p['id_producto']; ?>"><?php echo $p['nombre_producto']; ?></option>
				<?php endforeach; ?>

			</select>
		</td>
	</tr>
	<tr>
		<td>Cantidad</td>
		<td>

			<input type="number" required id="cantidad" placeholder="Ingrese cantidad">
			<br>
	</tr>
	<tr>
		<td>Descuento</td>
		<td>
			<input type="number" required id="descuento" placeholder="Ingrese descuento">
			<br>
			<br>
			<button onclick="Tblproductos();">Adicionar</button>
		</td>
	</tr>
</table>
<button onclick="Limpiarfactura();">Limpiar Factura</button>
<br><br>

<div id="s_factura">

</div>