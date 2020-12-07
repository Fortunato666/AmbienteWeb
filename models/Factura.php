<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "factura".
 *
 * @property integer $id_factura
 * @property integer $id_cliente
 * @property string $fecha
 * @property integer $num_factura
 * @property double $iva
 * @property integer $tipo_factura
 *
 * @property DetFactura[] $detFacturas
 * @property Clientes $idCliente
 */
class Factura extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'factura';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_cliente', 'num_factura', 'tipo_factura'], 'integer'],
            [['fecha'], 'safe'],
            [['iva'], 'number'],
            [['id_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => Clientes::className(), 'targetAttribute' => ['id_cliente' => 'id_cliente']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_factura' => 'Id Factura',
            'id_cliente' => 'Id Cliente',
            'fecha' => 'Fecha',
            'num_factura' => 'Num Factura',
            'iva' => 'Iva',
            'tipo_factura' => 'Tipo Factura',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetFacturas()
    {
        return $this->hasMany(DetFactura::className(), ['id_factura' => 'id_factura']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCliente()
    {
        return $this->hasOne(Clientes::className(), ['id_cliente' => 'id_cliente']);
    }

    public static function comboFactura($id_factura){
        $cn = Yii::$app->db;
        $sql = "SELECT CASE WHEN tipo_factura = 0 THEN 'Credito Fiscal' ELSE 'Consumidor Final' END AS tipo_factura 
        FROM factura WHERE id_factura = '$id_factura'";
        return $cn->createCommand($sql)->queryAll();
    }

    public static function consultaFactura(){
        $cn = Yii::$app->db2;
        $sql = "SELECT a.*,CONCAT_WS(' ', b.nombre_cliente, '' , b.apellido_cliente) AS nombre_cliente, 
        (CASE WHEN a.tipo_factura = 0 THEN 'Credito Fiscal' ELSE 'Consumidor Final' END) AS tipo_factura 
        FROM factura a INNER JOIN clientes b ON a.id_cliente = b.id_cliente WHERE aplicado = 0";
        return $cn->createCommand($sql)->queryAll();
    }

    public static function ConsultabyPK($pk){
        $cn = Yii::$app->db2;
        $sql = "SELECT a.*,CONCAT_WS(' ', b.nombre_cliente, '' , b.apellido_cliente) AS nombre_cliente, 
        (CASE WHEN a.tipo_factura = 0 THEN 'Credito Fiscal' ELSE 'Consumidor Final' END) AS tipo_factura 
        FROM factura a INNER JOIN clientes b ON a.id_cliente = b.id_cliente
        WHERE id_factura = '$pk'";
        return $cn->createCommand($sql)->queryAll();
    }

    public static function Guardar($id_cliente,$fecha,$num_factura,$iva,$tipo_factura)
    {
        $cn = Yii::$app->db2;
        $sql = "insert into factura (id_cliente,fecha,num_factura,iva,tipo_factura) 
        values('$id_cliente','$fecha','$num_factura','$iva','$tipo_factura')";
        return $cn->createCommand($sql)->execute();
    }

    public static function actualizar($id_factura,$fecha,$num_factura,$tipo_factura){
        $cn = Yii::$app->db2;
        $sql = "UPDATE factura SET fecha = '$fecha', num_factura = '$num_factura', 
        tipo_factura = '$tipo_factura' WHERE id_factura = '$id_factura'";
        return $cn->createCommand($sql)->execute();
    }

    public static function actualizar_iva($iva,$id_factura){
        $cn = Yii::$app->db2;
        $sql = "UPDATE factura SET aplicado = 1, iva = '$iva' WHERE id_factura = '$id_factura'";
        return $cn->createCommand($sql)->execute();
    }
    
    public static function eliminar($id){
        $cn = Yii::$app->db2;
        $sql = "DELETE FROM factura WHERE id_factura = '$id'";
        return $cn->createCommand($sql)->execute();
    }
}
