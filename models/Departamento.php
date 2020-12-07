<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "departamento".
 *
 * @property int $id_departamento
 * @property string|null $descripcion
 *
 * @property Municipio[] $municipios
 */
class Departamento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'departamento';
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
            [['descripcion'], 'string', 'max' => 80],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_departamento' => 'Id Departamento',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * Gets query for [[Municipios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMunicipios()
    {
        return $this->hasMany(Municipio::className(), ['id_departamento' => 'id_departamento']);
    }

    public static function consultaDepartamentos(){
        $cn = Yii::$app->db;
        $sql = "SELECT * FROM departamento";
        return $cn->createCommand($sql)->queryAll();
    }

    public static function ConsultabyPK($pk){
        $cn = Yii::$app->db;
        $sql = "SELECT * FROM departamento WHERE id_departamento = '$pk'";
        return $cn->createCommand($sql)->queryAll();
    }

    public static function Guardar($descripcion)
    {
        $cn = Yii::$app->db;
        $sql = "insert into departamento(descripcion) values('$descripcion')";
        return $cn->createCommand($sql)->execute();
    }

    public static function actualizar($id, $descripcion){
        $cn = Yii::$app->db;
        $sql = "UPDATE departamento SET descripcion = '$descripcion' WHERE id_departamento = '$id'";
        return $cn->createCommand($sql)->execute();
    }

    public static function eliminar($id){
        $cn = Yii::$app->db;
        $sql = "DELETE FROM departamento WHERE id_departamento = '$id'";
        return $cn->createCommand($sql)->execute();
    }
}
