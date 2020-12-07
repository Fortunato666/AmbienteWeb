<?php
    namespace app\models;
    use Yii;
    echo Yii::$app->controller->renderPartial('_url');
?>
<h1>Actualizar Municipio</h1>
<?php foreach($dataM as $d):?>
    <input type="text" id="id_municipio" value="<?php echo $d['id_municipio'] ?>" hidden>
<br>
Nombre Municipio<br>
    <input type="text" id="descripcion" value="<?php echo $d['descripcion'] ?>">
<br>
Nombre Departamento
<br>
<select required id="id_departamento">
    <?php foreach($dataD as $dd): ?>
    <option value="<?php echo $dd['id_departamento'];?>"><?php echo $dd['descripcion'];?></option>
    <?php endforeach; ?>
</select>
<br>
<br>
    <button onclick="actualizarMunicipios();">Actualizar</button>
    <br>
    <br>
    <?php endforeach; ?>