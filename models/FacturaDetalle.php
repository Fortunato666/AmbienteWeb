<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "factura_detalle".
 *
 * @property integer $idfacturadetalle
 * @property integer $idfactura
 * @property integer $idproducto
 * @property integer $item
 */
class FacturaDetalle extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'factura_detalle';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idfactura', 'idproducto', 'item'], 'required'],
            [['idfactura', 'idproducto', 'item'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idfacturadetalle' => 'Idfacturadetalle',
            'idfactura' => 'Idfactura',
            'idproducto' => 'Idproducto',
            'item' => 'Item',
        ];
    }



    public static function insertar($idfactura,
                                    $idproducto,
                                    $item)
    {
        $cn = Yii::$app->db;
        $sql= "insert into  factura_detalle(idfactura,
                                           idproducto,
                                        item)
                            values('$idfactura',
                                   '$idproducto',
                                   '$item'
                                   )";

        return $cn->createCommand($sql)->execute();   
    }
}
