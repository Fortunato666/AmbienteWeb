<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "municipio".
 *
 * @property int $id_municipio
 * @property string|null $descripcion
 * @property int|null $id_departamento
 *
 * @property Clientes[] $clientes
 * @property Departamento $departamento
 */
class Municipio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'municipio';
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
            [['id_departamento'], 'integer'],
            [['descripcion'], 'string', 'max' => 80],
            [['id_departamento'], 'exist', 'skipOnError' => true, 'targetClass' => Departamento::className(), 'targetAttribute' => ['id_departamento' => 'id_departamento']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_municipio' => 'Id Municipio',
            'descripcion' => 'Descripcion',
            'id_departamento' => 'Id Departamento',
        ];
    }

    /**
     * Gets query for [[Clientes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClientes()
    {
        return $this->hasMany(Clientes::className(), ['id_municipio' => 'id_municipio']);
    }

    /**
     * Gets query for [[Departamento]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartamento()
    {
        return $this->hasOne(Departamento::className(), ['id_departamento' => 'id_departamento']);
    }

    public static function consultaMunicipios(){
        $cn = Yii::$app->db;
        $sql = "SELECT a.id_municipio, a.descripcion, b.id_departamento, b.descripcion AS departamento FROM municipio a INNER JOIN departamento b ON a.id_departamento = b.id_departamento";
        return $cn->createCommand($sql)->queryAll();
    }

    public static function ConsultabyPK($pk){
        $cn = Yii::$app->db;
        $sql = "SELECT a.id_municipio, a.descripcion, b.id_departamento, b.descripcion AS departamento FROM municipio a INNER JOIN departamento b ON a.id_departamento = b.id_departamento WHERE a.id_municipio = '$pk'";
        return $cn->createCommand($sql)->queryAll();
    }

    public static function Guardar($descripcion,$id_departamento)
    {
        $cn = Yii::$app->db;
        $sql = "insert into municipio(descripcion,id_departamento) values('$descripcion', '$id_departamento')";
        return $cn->createCommand($sql)->execute();
    }

    public static function actualizar($id, $descripcion, $id_departamento){
        $cn = Yii::$app->db;
        $sql = "UPDATE municipio SET descripcion = '$descripcion', id_departamento= '$id_departamento' WHERE id_municipio = '$id'";
        return $cn->createCommand($sql)->execute();
    }

    public static function eliminar($id){
        $cn = Yii::$app->db;
        $sql = "DELETE FROM municipio WHERE id_municipio = '$id'";
        return $cn->createCommand($sql)->execute();
    }
}
