<?php
    namespace app\models;
    use Yii;
    echo Yii::$app->controller->renderPartial('_url');
?>
<h1>Actualizar Producto</h1>
<?php foreach($dataP as $d):?>
    <input type="text" id="id_producto" value="<?php echo $d['id_producto'] ?>" hidden>
<br>
Nombre Producto<br>
    <input type="text" id="nombre_producto" value="<?php echo $d['nombre_producto'] ?>">
<br>
Precio<br>
    <input type="text" id="precio" value="<?php echo $d['precio'] ?>">
<br>

<br>
    <button onclick="actualizarProductos();">Actualizar</button>
    <br>
    <br>
<?php endforeach; ?>