<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pacientes".
 *
 * @property integer $idpaciente
 * @property string $nombres
 * @property string $apellidos
 * @property string $telefono
 * @property string $direccion
 * @property string $fecha_nacimiento
 */
class Pacientes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pacientes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombres', 'apellidos', 'telefono', 'direccion', 'fecha_nacimiento'], 'required'],
            [['fecha_nacimiento'], 'safe'],
            [['nombres', 'apellidos'], 'string', 'max' => 30],
            [['telefono'], 'string', 'max' => 9],
            [['direccion'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idpaciente' => 'Idpaciente',
            'nombres' => 'Nombres',
            'apellidos' => 'Apellidos',
            'telefono' => 'Telefono',
            'direccion' => 'Direccion',
            'fecha_nacimiento' => 'Fecha Nacimiento',
        ];
    }

    public static function getPacientes()
    {
        $cn = Yii::$app->db;
        $sql= "select * from pacientes";

        
        return $cn->createCommand($sql)->queryAll();
        
    }
}
