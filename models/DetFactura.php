<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "det_factura".
 *
 * @property integer $id_detalle
 * @property integer $id_factura
 * @property integer $id_producto
 * @property double $cantidad
 * @property double $precio
 * @property double $descuento
 * @property double $total
 *
 * @property Factura $idFactura
 * @property Producto $idProducto
 */
class DetFactura extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'det_factura';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_factura', 'id_producto'], 'integer'],
            [['cantidad', 'precio', 'descuento', 'total'], 'number'],
            [['id_factura'], 'exist', 'skipOnError' => true, 'targetClass' => Factura::className(), 'targetAttribute' => ['id_factura' => 'id_factura']],
            [['id_producto'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['id_producto' => 'id_producto']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_detalle' => 'Id Detalle',
            'id_factura' => 'Id Factura',
            'id_producto' => 'Id Producto',
            'cantidad' => 'Cantidad',
            'precio' => 'Precio',
            'descuento' => 'Descuento',
            'total' => 'Total',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdFactura()
    {
        return $this->hasOne(Factura::className(), ['id_factura' => 'id_factura']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProducto()
    {
        return $this->hasOne(Producto::className(), ['id_producto' => 'id_producto']);
    }

    public static function Guardar($id_factura,$id_producto,$cantidad,$precio,$descuento,$total)
    {
        $cn = Yii::$app->db2;
        $sql = "insert into det_factura (id_factura,id_producto,cantidad,precio,descuento,total) 
        values('$id_factura','$id_producto','$cantidad','$precio','$descuento','$total')";
        return $cn->createCommand($sql)->execute();
    }
}
