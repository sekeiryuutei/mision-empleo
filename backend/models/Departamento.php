<?php

namespace backend\models;

use Yii;

use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "departamento".
 *
 * @property int $id
 * @property string $codigoDANE
 * @property string $nombre
 *
 * @property Ciudad[] $ciudads
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
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codigoDANE', 'nombre'], 'required', 'message' => '{attribute} Es Un Valor Obligatorio'],
            [['codigoDANE'], 'string', 'max' => 2],
            [['nombre'], 'string', 'max' => 90],
            [['codigoDANE'], 'unique', 'message' => 'Código ya está registrado.'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'codigoDANE' => 'Código DANE',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * Gets query for [[Ciudads]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCiudads()
    {
        return $this->hasMany(Ciudad::class, ['idDepartamento' => 'id']);
    }

    public static  function  getListaData(){
        $data = Departamento::find()
                        ->select(['id', 'nombre'])
                        ->orderBy('nombre')->asArray()->all();
    	$listadata = ArrayHelper::map($data, 'id', 'nombre');
    	return $listadata;
    }
}
