<?php echo Yii::$app->controller->renderPartial('_url'); ?>
<h2>Ingreso de Facturas</h2>
<br>
<form>
    <tr>
        <td>Seleccione Cliente</td>
        <br>
        <td>
            <select id="id_cliente">
                <?php foreach ($dataC as $c): ?>
                <option value="<?php echo $c['id_cliente'] ?>"><?php echo $c['nombre_cliente']; ?></option>
                <?php endforeach; ?>

            </select>
        </td>
    </tr>
    <br><br>
    Fecha:<br>
    <input type="date" required id="fecha" placeholder="Ingrese fecha">
    <br>
    <br>
    N# de Factura<br>
    <input type="text" required id="num_factura" placeholder="Ingrese num. factura">
    <br>
    <input type="text" hidden id="iva" value="0">
    <br>
    <br>

    <tr>
        <td>tipo factura</td>
        <td><select id="tipo_factura">
                <option value="0">Credito Fiscal</option>
                <option value="1">Consumidor Final</option>
            </select></td>
    </tr>
    <br><br>
    <button class="btn" onclick="mttoFactura();">Guardar</button>
</form>
<br><br><br>

<table class="table" width="100%">
    <tr>
        <td>Cliente</td>
        <td>Fecha</td>
        <td># Factura</td>
        <td>Iva</td>
        <td>Tipo de Factura</td>
        <td>Editar</td>
        <td>Eliminar</td>
        
    </tr>
    <?php foreach ($dataF as $d) : ?>
        <tr>
            <td><?php echo $d['nombre_cliente']; ?></td>
            <td><?php echo $d['fecha']; ?></td>
            <td><?php echo $d['num_factura']; ?></td>
            <td><?php echo $d['iva']; ?></td>
            <td><?php echo $d['tipo_factura']; ?></td>

            <td>
                <?php $id = $d['id_factura']; ?>
                <a href="<?php echo Yii::$app->getUrlManager()->createUrl("site/updatefactura/" . $id); ?>">
                    Editar
                </a>
            </td>
            <td>
                <?php $id = $d['id_factura']; ?>
                <a href="<?php echo Yii::$app->getUrlManager()->createUrl("site/deletefactura/" . $id); ?>">
                    Eliminar
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>