<?php echo Yii::$app->controller->renderPartial('_url');?>

<h1>::::::...... ingresar medicamento:::::......... </h1>

<input type="text" id="nombre" placeholder="Ingrese su nombre">
<br>
<input type="text" id="precio" placeholder="Ingrese precio">
<br>
<select id="estatus">
	<option value="1">Activo</option>
	<option value="0">Desactivado</option>
</select>
<br>
<button class="btn btn-info" onclick="Insertarmedicamento();">Ingresar</button>

<span id="s_msn"></span>


<div id="s_tabla"> </div>



<script type="text/javascript">

	$(document).ready(function(){

		//alert('Jquery funcionando');
		Tblmedicamentos();
	});

</script>


