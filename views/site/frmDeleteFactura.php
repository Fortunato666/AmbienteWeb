<?php

namespace app\models;

use Yii;

echo Yii::$app->controller->renderPartial('_url');
?>
<h1>Actualizar Cliente</h1>
<?php foreach ($dataF as $d) : ?>
    <input type="text" id="id_factura" value="<?php echo $d['id_factura'] ?>" hidden>
    <br>
    Fecha:<br>
    <input type="date" id="fecha" value="<?php echo $d['fecha'] ?>" disabled>
    <br>
    Numero de Factura:<br>
    <input type="text" id="num_factura" value="<?php echo $d['num_factura'] ?>" disabled>
    <br>
    Tipo Factura:<br>
    <select required id="tipo_factura" disabled>
        <option value="0"><?php echo $d['tipo_factura'] ?></option>
    </select>
    <br>
    <br>
    <button onclick="eliminarFactura();">Eliminar</button>
    <br>
    <br>
<?php endforeach; ?>