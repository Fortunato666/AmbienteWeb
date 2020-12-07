<?php
    namespace app\models;
    use Yii;
    echo Yii::$app->controller->renderPartial('_url');
?>
<h1>Eliminar Pedido</h1>
<?php foreach($dataP as $d):?>
id<br>
    <input type="text" id="idpedido" value="<?php echo $d['idpedido'] ?>" disabled>
<br>
Nombre Cliente<br>
    <input type="text" required id="nombre_cliente" value="<?php echo $d['nombre_cliente'] ?>" disabled>
<br>
Total<br>
    <input type="text" required id="total" value="<?php echo $d['total'] ?>" disabled>
<br>
Direccion<br>
    <input type="text" required id="direccion" value="<?php echo $d['direccion'] ?>" disabled>
<br>

<br>
    <button onclick="eliminarPedidos();">Eliminar</button>
    <br>
    <br>
<?php endforeach; ?>