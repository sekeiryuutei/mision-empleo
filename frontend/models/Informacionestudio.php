<?php

namespace frontend\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use backend\models\Nivelestudio;
use common\models\Persona;

/**
 * This is the model class for table "informacionestudio".
 *
 * @property int $id
 * @property int $idPersona
 * @property string $tituloObtenido
 * @property int $idNivelAcademico
 * @property string $nombreInstitucion
 * @property string|null $fecha
 * @property int $graduado
 * @property int|null $idAdjunto
 * @property string $created_at
 * @property int $created_by
 * @property string $updated_at
 * @property int $updated_by
 *
 * @property Documentoadjunto $id0
 * @property Nivelestudio $idNivelAcademico0
 * @property Persona $idPersona0
 */
class Informacionestudio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'informacionestudio';
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
            [['idPersona', 'tituloObtenido', 'idNivelAcademico', 'nombreInstitucion'], 'required', 'message' => '{attribute} Es Un Valor Obligatorio'],
            [['idPersona', 'idNivelAcademico', 'graduado', 'idAdjunto', 'created_by', 'updated_by'], 'integer'],
            [['fecha', 'created_at', 'updated_at',], 'safe'],
            [['tituloObtenido', 'nombreInstitucion'], 'string', 'max' => 100],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Documentoadjunto::class, 'targetAttribute' => ['id' => 'id']],
            [['idNivelAcademico'], 'exist', 'skipOnError' => true, 'targetClass' => Nivelestudio::class, 'targetAttribute' => ['idNivelAcademico' => 'id']],
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
            'idPersona' => 'Persona',
            'tituloObtenido' => 'Titulo Obtenido',
            'idNivelAcademico' => 'Nivel Academico',
            'nombreInstitucion' => 'Nombre Institucion',
            'fecha' => 'Fecha',
            'graduado' => 'Graduado',
            'idAdjunto' => 'Adjunto',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(Documentoadjunto::class, ['id' => 'id']);
    }

    /**
     * Gets query for [[IdNivelAcademico0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNivelAcademico()
    {
        return $this->hasOne(Nivelestudio::class, ['id' => 'idNivelAcademico']);
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

    public function getDocumentoadjunto()
    {
        return $this->hasOne(Documentoadjunto::class, ['id' => 'idAdjunto']);
    }
}
