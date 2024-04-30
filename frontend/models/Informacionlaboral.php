<?php

namespace frontend\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use common\models\Persona;

/**
 * This is the model class for table "informacionlaboral".
 *
 * @property int $id
 * @property int $idPersona
 * @property string $nombreEmpresa
 * @property string $nombreCargo
 * @property string $fechaDesde
 * @property string|null $fechaHasta
 * @property string $created_at
 * @property int $created_by
 * @property string|null $updated_at
 * @property int|null $updated_by
 *
 * @property Persona $idPersona0
 */
class Informacionlaboral extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'informacionlaboral';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
                'value' => function ($event) {
                    return Yii::$app->user->id;
                },
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idPersona', 'nombreEmpresa', 'nombreCargo', 'fechaDesde',], 'required', 'message' => '{attribute} Es Un Valor Obligatorio',],
            [['idPersona', 'created_by', 'updated_by'], 'integer'],
            [['fechaDesde', 'fechaHasta', 'created_at', 'updated_at'], 'safe'],
            [['nombreEmpresa', 'nombreCargo'], 'string', 'max' => 150],
            [['idPersona'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::class, 'targetAttribute' => ['idPersona' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idPersona' => 'Id Persona',
            'nombreEmpresa' => 'Nombre Empresa',
            'nombreCargo' => 'Nombre Cargo',
            'fechaDesde' => 'Fecha Desde',
            'fechaHasta' => 'Fecha Hasta',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[IdPersona0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersona()
    {
        return $this->hasOne(Persona::class, ['id' => 'idPersona']);
    }
}
