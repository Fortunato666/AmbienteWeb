<?php
    namespace app\models;
    use Yii;
    echo Yii::$app->controller->renderPartial('_url');
?>
<h1>Eliminar Departamento</h1>
<?php foreach($dataD as $d):?>
    <input type="text" id="id_departamento" value="<?php echo $d['id_departamento'] ?>" hidden>
<br>
Nombre Departamento<br>
    <input type="text" required id="descripcion" value="<?php echo $d['descripcion'] ?>" disabled>
<br>

<br>
    <button onclick="eliminarDepartamento();">Eliminar</button>
    <br>
    <br>
<?php endforeach; ?>