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
    <input type="date" id="fecha" value="<?php echo $d['fecha'] ?>">
    <br>
    Numero de Factura:<br>
    <input type="text" id="num_factura" value="<?php echo $d['num_factura'] ?>">
    <br>
    Tipo Factura:<br>
    <select required id="tipo_factura">
        <option value="0">Credito Fiscal</option>
        <option value="1">Consumidor Final</option>
    </select>
    <br>
    <br>
    <button onclick="actualizarFactura();">Actualizar</button>
    <br>
    <br>
<?php endforeach; ?>