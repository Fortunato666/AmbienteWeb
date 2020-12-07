<?php
    namespace app\models;
    use Yii;
    echo Yii::$app->controller->renderPartial('_url');
?>
<h1>Actualizar Producto</h1>
<?php foreach($dataP as $d):?>
id<br>
    <input type="text" id="idproductos" value="<?php echo $d['idproductos'] ?>" disabled>
<br>
nombre producto<br>
    <input type="text" required id="nombre_producto" value="<?php echo $d['nombre_producto'] ?>">
<br>
Descripcion<br>
    <input type="text" required id="descripcion_producto" value="<?php echo $d['descripcion_producto'] ?>">
<br>
Precio<br>
    <input type="text" required id="precio_venta" value="<?php echo $d['precio_venta'] ?>">
<br>
Estatus<br>
    <input type="text" required id="estatus" value="<?php echo $d['estatus'] ?>">
<br>

<br>
    <button onclick="actualizarProductos();">Actualizar</button>
    <br>
    <br>
<?php endforeach; ?>