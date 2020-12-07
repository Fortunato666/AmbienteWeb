<?php
    namespace app\models;
    use Yii;
    echo Yii::$app->controller->renderPartial('_url');
?>
<h1>Actualizar Cliente</h1>
<?php foreach($dataC as $d):?>
    <input type="text" id="id_cliente" value="<?php echo $d['id_cliente'] ?>" hidden>
<br>
Nombre Cliente<br>
    <input type="text" id="nombre_cliente" value="<?php echo $d['nombre_cliente'] ?>">
<br>
Apellido Cliente<br>
    <input type="text" id="apellido_cliente" value="<?php echo $d['apellido_cliente'] ?>">
<br>
Direccion<br>
    <input type="text" id="direccion" value="<?php echo $d['direccion'] ?>">
<br>
Municipio
<br>
<select required id="id_municipio">
    <?php foreach($dataM as $dd): ?>
    <option value="<?php echo $dd['id_municipio'];?>"><?php echo $dd['descripcion'];?></option>
    <?php endforeach; ?>
</select>
<br>
<br>
    <button onclick="actualizarClientes();">Actualizar</button>
    <br>
    <br>
    <?php endforeach; ?>