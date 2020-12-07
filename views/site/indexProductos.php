<?php 
  namespace app\models;
  use Yii;
  echo Yii::$app->controller->renderPartial('_url');
?>
<h2>Ingreso de Productos</h2>
<br>
<form>
<input type="text" required id="nombre_producto" placeholder="Ingrese nombre Producto">
<br>
<br>
<input type="text" required id="descripcion_producto" placeholder="Ingrese descripcion">
<br>
<br>
<input type="text" required id="precio_venta" placeholder="Ingrese precio">
<br>
<br>
<select required id="estatus">
    <option value="1">Visible</option>
    <option value="0">No Visible</option>
</select>
<br>
<br>
<button class="btn" onclick="mttoProductos();">Guardar</button>
</form>
<br><br><br>

<table class="table" width="100%">
    <tr>
        <td>Nombre</td>
        <td>Descripcion</td>
        <td>Precio</td>
        <td>Estatus</td>
        <td>Editar</td>
    </tr>
    <?php foreach($dataP as $dp):?>
    <tr>
        <td><?php echo $dp['nombre_producto'];?></td>
        <td><?php echo $dp['descripcion_producto'];?></td>
        <td><?php echo $dp['precio_venta'];?></td>
        <td><?php echo $dp['estatus'];?></td>
        <td>
        <?php $id= $dp['idproductos']; ?>
            <a href="<?php echo Yii::$app->getUrlManager()->createUrl("site/updateproducto/".$id);?>">
            Editar
            </a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>