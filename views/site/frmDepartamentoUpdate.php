<?php
    namespace app\models;
    use Yii;
    echo Yii::$app->controller->renderPartial('_url');
?>
<h1>Actualizar Departamento</h1>
<?php foreach($dataD as $d):?>
    <input type="text" id="id_departamento" value="<?php echo $d['id_departamento'] ?>" hidden>
<br>
Nombre Departamento<br>
    <input type="text" id="descripcion" value="<?php echo $d['descripcion'] ?>">
<br>

<br>
    <button onclick="actualizarDepartamento();">Actualizar</button>
    <br>
    <br>
<?php endforeach; ?>