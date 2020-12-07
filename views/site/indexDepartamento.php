<?php

namespace app\models;

use Yii;

echo Yii::$app->controller->renderPartial('_url');
?>
<h2>Ingreso de Departamentos</h2>
<br>
<form>
    Nombre Departamento<br>
    <input type="text" required id="descripcion" placeholder="Ingrese nombre departamento">
    <br>
    <br>
    <button class="btn" onclick="mttoDepartamentos();">Guardar</button>
</form>
<br><br><br>

<table class="table" width="100%">
    <tr>
        <td>Descripcion</td>
        <td>Editar</td>
        <td>Eliminar</td>
        
    </tr>
    <?php foreach ($dataD as $d) : ?>
        <tr>
            <td><?php echo $d['descripcion']; ?></td>
            <td>
                <?php $id = $d['id_departamento']; ?>
                <a href="<?php echo Yii::$app->getUrlManager()->createUrl("site/updatedepartamento/" . $id); ?>">
                    Editar
                </a>
            </td>
            <td>
                <?php $id = $d['id_departamento']; ?>
                <a href="<?php echo Yii::$app->getUrlManager()->createUrl("site/deletedepartamento/" . $id); ?>">
                    Eliminar
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>