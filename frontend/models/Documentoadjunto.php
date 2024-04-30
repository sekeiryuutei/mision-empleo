<?php

namespace frontend\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

use yii\helpers\ArrayHelper;

use backend\models\Tipodocumentoadjunto;
use common\models\Persona;

/**
 * This is the model class for table "documentoadjunto".
 *
 * @property int $id
 * @property int $idProyecto
 * @property string $codigoModulo
 * @property int $idEntidad
 * @property string $descripcion
 * @property int $idTipoDocumentoAdjunto
 * @property string $src_filename
 * @property string $web_filename
 * @property string $path_filename
 * @property string|null $path_server
 * @property string|null $extension
 * @property string|null $tags
 * @property string $created_at
 * @property int $created_by
 * @property string $updated_at
 * @property int $updated_by
 */
class Documentoadjunto extends \yii\db\ActiveRecord
{
    public $image;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'documentoadjunto';
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
            [
                [
                    'codigoModulo',
                    'idEntidad',
                    'idProyecto',
                    'descripcion',
                    'idTipoDocumentoAdjunto',
                    'src_filename',
                    'web_filename',
                    'path_filename'
                ],
                'required',
                'message' => 'El Campo {attribute} Es un Valor Obligatorio'
            ],
            [['idEntidad', 'idTipoDocumentoAdjunto', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at', 'tags'], 'safe'],
            [['codigoModulo', 'extension'], 'string', 'max' => 30],

            [['image'], 'safe'],
            [['image'], 'file', 'extensions' => 'jpg, gif, png, pdf, xlsx, docx, pptx'],
            [['image'], 'file', 'maxSize' => '5000000'],

            [['descripcion', 'src_filename', 'web_filename', 'path_filename', 'path_server'], 'string', 'max' => 255],
            [['idTipoDocumentoAdjunto'], 'exist', 'skipOnError' => true, 'targetClass' => Tipodocumentoadjunto::class, 'targetAttribute' => ['idTipoDocumentoAdjunto' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idProyecto' => 'Proyecto',
            'codigoModulo' => 'Módulo',
            'idEntidad' => 'ID Entidad',
            'descripcion' => 'Descripción',
            'idTipoDocumentoAdjunto' => 'Tipo Documento',
            'src_filename' => 'Src Filename',
            'web_filename' => 'Web Filename',
            'path_filename' => 'Path Filename',
            'path_server' => 'Path Server',
            'extension' => 'Extension',
            'tags' => 'Patrones de Busqueda',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'image' => 'Seleccionar Archivo',
        ];
    }

    public function getTipodocumentoadjunto()
    {
        return $this->hasOne(Tipodocumentoadjunto::class, ['id' => 'idTipoDocumentoAdjunto']);
    }

    public static function dataEntidad($codigoModulo, $idEntidad)
    {
        $modelentidad = new Entidad();

        switch ($codigoModulo) {
            case "Persona":
                $model = Persona::findOne(['id' => $idEntidad]);
                $modelentidad->id = $idEntidad;
                $modelentidad->codigo = $model->documento . '-' . $model->id;
                $modelentidad->nombre = $model->primerNombre . ' ' . $model->segundoNombre . ' ' . $model->primerApellido . ' ' . $model->segundoApellido;
                $modelentidad->fecha = $model->created_at;
                $modelentidad->descripcion = $model->ciudadresidencia->nombre . ' - ' . $model->sexo->nombre . ' - ' . $model->nivelestudio->nombre;
                break;
            case "Informacionestudio":
                $model = Informacionestudio::findOne(['id' => $idEntidad]);
                $modelentidad->id = $idEntidad;
                $modelentidad->codigo = $model->persona->documento . '-' . $model->id;
                $modelentidad->nombre = $model->persona->primerNombre . ' ' . $model->persona->segundoNombre . ' ' . $model->persona->primerApellido . ' ' . $model->persona->segundoApellido;
                $modelentidad->fecha = $model->fecha;
                $modelentidad->descripcion = $model->tituloObtenido . ' - ' . $model->nombreInstitucion . ' - ' . $model->nivelAcademico->nombre;
                break;

        }

        return $modelentidad;
    }
}
