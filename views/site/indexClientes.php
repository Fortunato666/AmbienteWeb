<?php 
  namespace app\models;
  use Yii;
  echo Yii::$app->controller->renderPartial('_url');
?>
<h2>Ingreso de Clientes</h2>
<br>
<form>
Nombre Cliente<br>
<input type="text" required id="nombre_cliente" placeholder="Ingrese nombre cliente">
<br>
<br>
Apellido Cliente<br>
<input type="text" required id="apellido_cliente" placeholder="Ingrese apellido cliente">
<br>
<br>
Direccion<br>
<input type="text" required id="direccion" placeholder="Ingrese direccion">
<br>
<br>
Municipio:  
<select required id="id_municipio">
    <?php foreach($dataM as $d): ?>
        <option value="<?php echo $d['id_municipio'];?>"><?php echo $d['descripcion'];?></option>
    <?php endforeach; ?>
</select>
<br>
<br>
<button class="btn" onclick="mttoClientes();">Guardar</button>
</form>
<br><br><br>

<table class="table" width="100%">
    <tr>
        <td>Nombre</td>
        <td>Apellido</td>
        <td>Direccion</td>
        <td>Municipio</td>
        <td>Editar</td>
        <td>Eliminar</td>
        
    </tr>
    <?php foreach($dataC as $d):?>
    <tr>
        <td><?php echo $d['nombre_cliente'];?></td>
        <td><?php echo $d['apellido_cliente'];?></td>
        <td><?php echo $d['direccion'];?></td>
        <td><?php echo $d['municipio'];?></td>
        <td>
        <?php $id= $d['id_cliente']; ?>
            <a href="<?php echo Yii::$app->getUrlManager()->createUrl("site/updateclientes/".$id);?>">
            Editar
            </a>
        </td>
        <td>
        <?php $id= $d['id_cliente']; ?>
            <a href="<?php echo Yii::$app->getUrlManager()->createUrl("site/deleteclientes/".$id);?>">
            Eliminar
            </a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>