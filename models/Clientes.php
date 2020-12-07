<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clientes".
 *
 * @property int $id_cliente
 * @property string|null $nombre_cliente
 * @property string $apellido_cliente
 * @property string|null $direccion
 * @property int|null $id_municipio
 *
 * @property Municipio $municipio
 * @property Factura[] $facturas
 */
class Clientes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clientes';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['apellido_cliente'], 'required'],
            [['id_municipio'], 'integer'],
            [['nombre_cliente'], 'string', 'max' => 80],
            [['apellido_cliente'], 'string', 'max' => 50],
            [['direccion'], 'string', 'max' => 150],
            [['id_municipio'], 'exist', 'skipOnError' => true, 'targetClass' => Municipio::className(), 'targetAttribute' => ['id_municipio' => 'id_municipio']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_cliente' => 'Id Cliente',
            'nombre_cliente' => 'Nombre Cliente',
            'apellido_cliente' => 'Apellido Cliente',
            'direccion' => 'Direccion',
            'id_municipio' => 'Id Municipio',
        ];
    }

    /**
     * Gets query for [[Municipio]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMunicipio()
    {
        return $this->hasOne(Municipio::className(), ['id_municipio' => 'id_municipio']);
    }

    /**
     * Gets query for [[Facturas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFacturas()
    {
        return $this->hasMany(Factura::className(), ['id_cliente' => 'id_cliente']);
    }

    public static function comboClientes(){
        $cn = Yii::$app->db;
        $sql = "SELECT id_cliente,CONCAT_WS(' ', nombre_cliente, '' , apellido_cliente) AS nombre_cliente FROM clientes";
        return $cn->createCommand($sql)->queryAll();
    }

    public static function consultaClientes(){
        $cn = Yii::$app->db;
        $sql = "SELECT a.id_cliente, a.nombre_cliente, a.apellido_cliente, a.direccion, b.id_municipio, b.descripcion AS municipio FROM clientes a INNER JOIN municipio b ON a.id_municipio = b.id_municipio";
        return $cn->createCommand($sql)->queryAll();
    }

    public static function ConsultabyPK($pk){
        $cn = Yii::$app->db;
        $sql = "SELECT a.id_cliente, a.nombre_cliente, a.apellido_cliente, a.direccion, b.id_municipio, b.descripcion AS municipio FROM clientes a INNER JOIN municipio b ON a.id_municipio = b.id_municipio WHERE a.id_cliente = '$pk'";
        return $cn->createCommand($sql)->queryAll();
    }

    public static function Guardar($nombre_cliente,$apellido_cliente,$direccion,$id_municipio)
    {
        $cn = Yii::$app->db;
        $sql = "insert into clientes(nombre_cliente,apellido_cliente,direccion,id_municipio) values('$nombre_cliente', '$apellido_cliente', '$direccion', '$id_municipio')";
        return $cn->createCommand($sql)->execute();
    }
    
    public static function actualizar($id,$nombre_cliente,$apellido_cliente,$direccion,$id_municipio){
        $cn = Yii::$app->db;
        $sql = "UPDATE clientes SET nombre_cliente = '$nombre_cliente', apellido_cliente= '$apellido_cliente',
                direccion = '$direccion', id_municipio = '$id_municipio' WHERE id_cliente = '$id'";
        return $cn->createCommand($sql)->execute();
    }

    public static function eliminar($id){
        $cn = Yii::$app->db;
        $sql = "DELETE FROM clientes WHERE id_cliente = '$id'";
        return $cn->createCommand($sql)->execute();
    }
}
