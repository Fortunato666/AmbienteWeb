<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "facturas".
 *
 * @property integer $idfactura
 * @property integer $idcliente
 * @property integer $total
 * @property integer $tipo_documento
 * @property integer $estatus
 */
class Facturas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'facturas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idcliente', 'total', 'tipo_documento', 'estatus'], 'required'],
            [['idcliente', 'total', 'tipo_documento', 'estatus'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idfactura' => 'Idfactura',
            'idcliente' => 'Idcliente',
            'total' => 'Total',
            'tipo_documento' => 'Tipo Documento',
            'estatus' => 'Estatus',
        ];
    }



    public static function insertar($idcliente,
                                    $total,
                                    $tipo_documento)
    {
        $cn = Yii::$app->db;
        $sql= "insert into  facturas(idcliente,total,tipo_documento,estatus)
                            values('$idcliente',
                                   '$total',
                                   '$tipo_documento',
                                   '1')";

        return $cn->createCommand($sql)->execute();   
    }


    public static function maximofacturas()
    {
        $cn = Yii::$app->db;
        $sql= "select max(idfactura) from facturas ";
        return $cn->createCommand($sql)->queryScalar();   
    }

}
