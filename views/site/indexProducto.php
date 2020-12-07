<?php 
  namespace app\models;
  use Yii;
  echo Yii::$app->controller->renderPartial('_url');
?>
<h2>Ingreso de Productos</h2>
<br>
<form>
Nombre Producto<br>
<input type="text" required id="nombre_producto" placeholder="Ingrese nombre producto">
<br>
<br>
Precio<br>
<input type="number" required id="precio" placeholder="Ingrese precio">
<br>
<br>
<input type="text" hidden id="debaja" value="1">
<button class="btn" onclick="mttoProducto();">Guardar</button>
</form>
<br><br><br>

<table class="table" width="100%">
    <tr>
        <td>Nombre Producto</td>
        <td>Precio</td>
        <td>Estado</td>
        <td>Editar</td>
        <td>Eliminar</td>
        
    </tr>
    <?php foreach($dataP as $d):?>
    <tr>
        <td><?php echo $d['nombre_producto'];?></td>
        <td><?php echo $d['precio'];?></td>
        <td><?php echo $d['debaja'];?></td>
        
        <td>
        <?php $id= $d['id_producto']; ?>
            <a href="<?php echo Yii::$app->getUrlManager()->createUrl("site/updateproductos/".$id);?>">
            Editar
            </a>
        </td>
        <td>
        <?php $id= $d['id_producto']; ?>
            <a href="<?php echo Yii::$app->getUrlManager()->createUrl("site/deleteproductos/".$id);?>">
            Eliminar
            </a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>