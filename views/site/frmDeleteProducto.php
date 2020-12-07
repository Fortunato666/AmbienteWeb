<?php
    namespace app\models;
    use Yii;
    echo Yii::$app->controller->renderPartial('_url');
?>
<h1>Eliminar Producto</h1>
<?php foreach($dataP as $d):?>
    <input type="text" id="id_producto" value="<?php echo $d['id_producto'] ?>" hidden>
<br>
Nombre Producto<br>
    <input type="text" required id="nombre_producto" value="<?php echo $d['nombre_producto'] ?>" disabled>
<br>
Precio<br>
    <input type="text" required id="precio" value="<?php echo $d['precio'] ?>" disabled>
<br>

<br>
    <button onclick="eliminarProductos();">Eliminar</button>
    <br>
    <br>
<?php endforeach; ?>