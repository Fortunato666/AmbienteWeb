<?php
    namespace app\models;
    use Yii;
    echo Yii::$app->controller->renderPartial('_url');
?>
<h1>Actualizar Menu</h1>
<?php foreach($data as $d):?>
id <br>
    <input type="text" id="id_menus" value="<?php echo $d['id_menus'] ?>">
<br>
nombre menu<br>
    <input type="" id="nombre_menus" value="<?php echo $d['nombre_menus'] ?>">
<br>
<br>
    <button onclick="actualizarMenus();">Actualizar</button>
    <br>
    <br>
    <button onclick="regresar();">Regresar</button>
<?php endforeach; ?>