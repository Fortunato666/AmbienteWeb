<?php
    namespace app\models;
    use Yii;
    echo Yii::$app->controller->renderPartial('_url');
?>
<h1>Actualizar Pedido</h1>
<?php foreach($dataP as $d):?>
id<br>
    <input type="text" id="idpedido" value="<?php echo $d['idpedido'] ?>" disabled>
<br>
Nombre Cliente<br>
    <input type="text" required id="nombre_cliente" value="<?php echo $d['nombre_cliente'] ?>">
<br>
Total<br>
    <input type="text" required id="total" value="<?php echo $d['total'] ?>">
<br>
Direccion<br>
    <input type="text" required id="direccion" value="<?php echo $d['direccion'] ?>">
<br>

<br>
    <button onclick="actualizarPedidos();">Actualizar</button>
    <br>
    <br>
<?php endforeach; ?>