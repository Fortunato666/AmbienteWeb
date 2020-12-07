<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "producto".
 *
 * @property int $id_producto
 * @property string|null $nombre_producto
 * @property float|null $precio
 * @property int $debaja
 *
 * @property DetFactura[] $detFacturas
 */
class Producto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'producto';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db2');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['precio'], 'number'],
            [['debaja'], 'required'],
            [['debaja'], 'integer'],
            [['nombre_producto'], 'string', 'max' => 80],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_producto' => 'Id Producto',
            'nombre_producto' => 'Nombre Producto',
            'precio' => 'Precio',
            'debaja' => 'Debaja',
        ];
    }

    /**
     * Gets query for [[DetFacturas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetFacturas()
    {
        return $this->hasMany(DetFactura::className(), ['id_producto' => 'id_producto']);
    }

    public static function consultaProductos(){
        $cn = Yii::$app->db2;
        $sql = "SELECT id_producto,nombre_producto,precio,(CASE WHEN debaja = 1 THEN 'Activo'
        ELSE 'Deshabilitado' END) AS debaja FROM producto
        WHERE debaja = 1";
        return $cn->createCommand($sql)->queryAll();
    }

    public static function ConsultabyPK($pk){
        $cn = Yii::$app->db2;
        $sql = "SELECT id_producto,nombre_producto,precio,(CASE WHEN debaja = 1 THEN 'Activo'
        ELSE 'Deshabilitado' END) AS debaja FROM producto
        WHERE id_producto = '$pk'";
        return $cn->createCommand($sql)->queryAll();
    }

    public static function Guardar($nombre_producto,$precio,$debaja)
    {
        $cn = Yii::$app->db2;
        $sql = "insert into producto (nombre_producto,precio,debaja) values('$nombre_producto','$precio','$debaja')";
        return $cn->createCommand($sql)->execute();
    }

    public static function actualizar($id,$nombre_producto, $precio){
        $cn = Yii::$app->db2;
        $sql = "UPDATE producto SET nombre_producto = '$nombre_producto', precio = '$precio' WHERE id_producto = '$id'";
        return $cn->createCommand($sql)->execute();
    }

    public static function eliminar($id){
        $cn = Yii::$app->db2;
        $sql = "UPDATE producto SET debaja = '0' WHERE id_producto = '$id'";
        return $cn->createCommand($sql)->execute();
    }
}
