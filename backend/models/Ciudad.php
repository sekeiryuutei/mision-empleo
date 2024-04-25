<?php

namespace backend\models;

use Yii;

use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "ciudad".
 *
 * @property int $id
 * @property string $codigoDane
 * @property string $nombre
 * @property int $idDepartamento
 *
 * @property Departamento $idDepartamento0
 * @property Persona[] $personas
 */
class Ciudad extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ciudad';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codigoDane', 'nombre', 'idDepartamento'], 'required'],
            [['idDepartamento'], 'integer'],
            [['codigoDane'], 'string', 'max' => 5],
            [['nombre'], 'string', 'max' => 120],
            [['codigoDane'], 'unique'],
            [['idDepartamento'], 'exist', 'skipOnError' => true, 'targetClass' => Departamento::class, 'targetAttribute' => ['idDepartamento' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'codigoDane' => 'Codigo Dane',
            'nombre' => 'Nombre',
            'idDepartamento' => 'Id Departamento',
        ];
    }

    /**
     * Gets query for [[IdDepartamento0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdDepartamento0()
    {
        return $this->hasOne(Departamento::class, ['id' => 'idDepartamento']);
    }

    /**
     * Gets query for [[Personas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Persona::class, ['idCiudadResidencia' => 'id']);
    }

    public static  function  getListaData(){

        $data = Ciudad::find()
                ->select(['mu.id', "CONCAT_WS(' - ',de.nombre, mu.nombre) AS nombre"])
                ->alias('mu')
                ->join('INNER JOIN','departamento de', 'mu.idDepartamento = de.id')
                ->orderBy('de.nombre, mu.nombre')->asArray()->all();
    	$listadata = ArrayHelper::map($data, 'id', 'nombre');
    	return $listadata;
    }
}
