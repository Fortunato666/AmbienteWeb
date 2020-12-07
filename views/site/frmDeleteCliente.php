<?php
    namespace app\models;
    use Yii;
    echo Yii::$app->controller->renderPartial('_url');
?>
<h1>Eliminar Cliente</h1>
<?php foreach($dataC as $d):?>
    <input type="text" id="id_cliente" value="<?php echo $d['id_cliente'] ?>" hidden>
<br>
Nombre Cliente<br>
    <input type="text" required id="nombre_cliente" value="<?php echo $d['nombre_cliente'] ?>" disabled>
<br>
Apellido Cliente<br>
    <input type="text" required id="apellido_cliente" value="<?php echo $d['apellido_cliente'] ?>" disabled>
<br>
Direccion<br>
    <input type="text" required id="direccion" value="<?php echo $d['direccion'] ?>" disabled>
<br>
Nombre Municipio
<br>
<select required id="id_municipio" disabled>
    <?php foreach($dataM as $dd): ?>
    <option value="<?php echo $dd['id_municipio'];?>"><?php echo $dd['descripcion'];?></option>
    <?php endforeach; ?>
</select>
<br>
<br>
<br>
    <button onclick="eliminarClientes();">Eliminar</button>
    <br>
    <br>
<?php endforeach; ?>