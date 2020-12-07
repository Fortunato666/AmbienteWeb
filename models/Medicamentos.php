<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "medicamentos".
 *
 * @property integer $idmedicamneto
 * @property string $nombre
 * @property double $precio
 * @property integer $estatus
 */
class Medicamentos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'medicamentos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'precio', 'estatus'], 'required'],
            [['precio'], 'number'],
            [['estatus'], 'integer'],
            [['nombre'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idmedicamneto' => 'Idmedicamneto',
            'nombre' => 'Nombre',
            'precio' => 'Precio',
            'estatus' => 'Estatus',
        ];
    }

    public static function getMedicamentos()
    {
        $cn = Yii::$app->db;
        $sql= "select * from medicamentos";
        return $cn->createCommand($sql)->queryAll();   
    }


    public static function insertar($nombre,
                                    $precio,
                                    $estatus)
    {
        $cn = Yii::$app->db;
        $sql= "insert into  medicamentos(nombre,precio,estatus)
                            values('$nombre',
                                   '$precio',
                                   '$estatus')";

        return $cn->createCommand($sql)->execute();   
    }


    public static function deletem($idmedicamneto)
    {
        $cn  = Yii::$app->db;
        $sql = "delete from medicamentos where idmedicamneto = '$idmedicamneto' ";
        return $cn->createCommand($sql)->execute();  
    }

    


}
