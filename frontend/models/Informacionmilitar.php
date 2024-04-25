<?php

namespace frontend\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

use yii\helpers\ArrayHelper;

use common\models\Persona;
use backend\models\Gradomilitar;

/**
 * This is the model class for table "informacionmilitar".
 *
 * @property int $id
 * @property int $idPersona
 * @property int $idGradoMilitar
 * @property string $ultimaUnidad
 * @property string $created_at
 * @property int $created_by
 * @property string $updated_at
 * @property int $updated_by
 *
 * @property Gradomilitar $gradomilitar
 * @property Persona $Persona
 */
class Informacionmilitar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'informacionmilitar';
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
            [['idPersona', 'idGradoMilitar', 'ultimaUnidad'], 'required', 'message' => '{attribute} Es Un Valor Obligatorio'],
            [['idPersona', 'idGradoMilitar', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['ultimaUnidad'], 'string', 'max' => 150],
            [['idPersona'], 'unique', 'message' => 'Persona ya está registrado.'],
            [['idGradoMilitar'], 'exist', 'skipOnError' => true, 'targetClass' => Gradomilitar::class, 'targetAttribute' => ['idGradoMilitar' => 'id']],
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
            'idGradoMilitar' => 'Id Grado Militar',
            'ultimaUnidad' => 'Ultima Unidad',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[GradoMilitar]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGradomilitar()
    {
        return $this->hasOne(Gradomilitar::class, ['id' => 'idGradoMilitar']);
    }

    /**
     * Gets query for [[Persona]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersona()
    {
        return $this->hasOne(Persona::class, ['id' => 'idPersona']);
    }
}
