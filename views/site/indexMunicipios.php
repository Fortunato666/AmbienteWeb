<?php 
  namespace app\models;
  use Yii;
  echo Yii::$app->controller->renderPartial('_url');
?>
<h2>Ingreso de Municipios</h2>
<br>
<form>
Nombre Municipio<br>
<input type="text" required id="descripcion" placeholder="Ingrese nombre municipio">
<br>
<br>
Departamento:
<select required id="id_departamento">
    <?php foreach($dataD as $d): ?>
    <option value="<?php echo $d['id_departamento'];?>"><?php echo $d['descripcion'];?></option>
    <?php endforeach; ?>
</select>
<br>
<br>
<button class="btn" onclick="mttoMunicipios();">Guardar</button>
</form>
<br><br><br>

<table class="table" width="100%">
    <tr>
        <td>Municipio</td>
        <td>Departamento</td>
        <td>Editar</td>
        <td>Eliminar</td>
        
        </tr>
    <?php foreach($dataM as $d):?>
    <tr>
        <td><?php echo $d['descripcion'];?></td>
        <td><?php echo $d['departamento'];?></td>
        
        <td>
        <?php $id= $d['id_municipio']; ?>
            <a href="<?php echo Yii::$app->getUrlManager()->createUrl("site/updatemunicipios/".$id);?>">
            Editar
            </a>
        </td>
        <td>
        <?php $id= $d['id_municipio']; ?>
            <a href="<?php echo Yii::$app->getUrlManager()->createUrl("site/deletemunicipios/".$id);?>">
            Eliminar
            </a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>