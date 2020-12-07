<?php
    namespace app\models;
    use Yii;
    echo Yii::$app->controller->renderPartial('_url');
?>
<h1>Eliminar Municipio</h1>
<?php foreach($dataM as $d):?>
    <input type="text" id="id_municipio" value="<?php echo $d['id_municipio'] ?>" hidden>
<br>
Nombre Departamento<br>
    <input type="text" required id="descripcion" value="<?php echo $d['descripcion'] ?>" disabled>
<br>
Nombre Departamento
<br>
<select required id="id_departamento" disabled>
    <?php foreach($dataD as $dd): ?>
    <option value="<?php echo $dd['id_departamento'];?>"><?php echo $dd['descripcion'];?></option>
    <?php endforeach; ?>
</select>
<br>
<br>
<br>
    <button onclick="eliminarMunicipios();">Eliminar</button>
    <br>
    <br>
<?php endforeach; ?>