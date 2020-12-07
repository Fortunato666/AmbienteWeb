<?php 
  namespace app\models;
  use Yii;
  echo Yii::$app->controller->renderPartial('_url');
?>
<h2>Ingreso de Pedidos</h2>
<br>
<form>
<input type="text" required id="nombre_cliente" placeholder="Ingrese nombre Cliente">
<br>
<br>
Productos:
<select required id="idproducto">
    <?php foreach($dataPr as $d): ?>
    <option value="<?php echo $d['idproductos'];?>"><?php echo $d['nombre_producto'];?></option>
    <?php endforeach; ?>
</select>
<br>
<br>
<input type="text" required id="total" placeholder="Ingrese el total">
<br>
<br>
<input type="text" required id="direccion" placeholder="Ingrese Direccion">
<br>
<br>
<button class="btn" onclick="mttoPedidos();">Guardar</button>
</form>
<br><br><br>

<table class="table" width="100%">
    <tr>
        <td>Cliente</td>
        <td>Producto</td>
        
        <td>Total</td>
        <td>Direccion</td>
        <td>Editar</td>
        <td>Eliminar</td>
        
    </tr>
    <?php foreach($dataP as $dp):?>
    <tr>
        <td><?php echo $dp['nombre_cliente'];?></td>
        <td><?php echo $dp['nombre_producto'];?></td>
        <td><?php echo $dp['total'];?></td>
        <td><?php echo $dp['direccion'];?></td>
        <td>
        <?php $id= $dp['idpedido']; ?>
            <a href="<?php echo Yii::$app->getUrlManager()->createUrl("site/updatepedido/".$id);?>">
            Editar
            </a>
        </td>
        <td>
        <?php $id= $dp['idpedido']; ?>
            <a href="<?php echo Yii::$app->getUrlManager()->createUrl("site/deletepedido/".$id);?>">
            Eliminar
            </a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
