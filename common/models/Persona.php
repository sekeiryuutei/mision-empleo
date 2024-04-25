<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

use yii\helpers\ArrayHelper;

use backend\models\Tipodocumentoidentificacion;
use backend\models\Sexo;
use backend\models\Estadocivil;
use backend\models\Ciudad;
use backend\models\Nivelestudio;
use backend\models\Estadopersona;
use frontend\models\Informacionmilitar;

/**
 * This is the model class for table "persona".
 *
 * @property int $id
 * @property int $idTipoIdentificacion
 * @property float $documento
 * @property string $primerNombre
 * @property string|null $segundoNombre
 * @property string $primerApellido
 * @property string|null $segundoApellido
 * @property int $idSexo
 * @property int|null $idEstadoCivil
 * @property int $idCiudadResidencia
 * @property string $direccionResidencia
 * @property int $indTelefonoContacto
 * @property float $telefonoContacto
 * @property string|null $correoElectronico
 * @property string $created_at
 * @property int $created_by
 * @property string $updated_at
 * @property int $updated_by
 *
 * @property Ciudad $ciudadresidencia
 * @property Estadocivil $estadocivil
 * @property Sexo $sexo
 * @property Tipodocumentoidentificacion $tipoidentificacion
 * @property Nivelestudio $nivelestudio
 */
class Persona extends \yii\db\ActiveRecord
{
    public $password;
    public $retypePassword;
    public $idGradoMilitar;
    public $ultimaUnidad;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'persona';
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
            [['idTipoIdentificacion', 'documento', 'primerNombre', 'primerApellido', 
            'idSexo', 'idCiudadResidencia', 'direccionResidencia', 'indTelefonoContacto', 
            'telefonoContacto', 'idEstadoCivil', 'idNivelEstudio', 'fechaNacimiento'], 
            'required', 'message' => '{attribute} Es Un Valor Obligatorio'],
            [['idTipoIdentificacion', 'idSexo', 'idEstadoCivil', 'idCiudadResidencia', 
            'indTelefonoContacto', 'created_by', 'updated_by', 'idGradoMilitar'], 'integer'],
            [['documento', 'telefonoContacto'], 'number'],
            [['created_at', 'updated_at', 'fechaNacimiento', 'ultimaUnidad'], 'safe'],
            [['primerNombre', 'segundoNombre', 'primerApellido', 'segundoApellido'], 'string', 'max' => 15],
            [['direccionResidencia', 'correoElectronico'], 'string', 'max' => 150],
            [['documento'], 'unique', 'message' => 'Documento ya está registrado.'],

            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required', 'message' => '{attribute} Es Un Valor Obligatorio'],
            ['username', 'unique', 'message' => 'Usuario YA Esta Registrado.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['correoElectronico', 'filter', 'filter' => 'trim'],
            ['correoElectronico', 'required', 'message' => '{attribute} Es Un Valor Obligatorio'],
            ['correoElectronico', 'email'],
            ['correoElectronico', 'unique', 'message' => 'Correo Electrónico YA Esta Registrado.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['retypePassword', 'required'],
            ['retypePassword', 'compare', 'compareAttribute' => 'password', 'message' => 'Las Contraseñas NO son Iguales'],

            [['idCiudadResidencia'], 'exist', 'skipOnError' => true, 'targetClass' => Ciudad::class, 'targetAttribute' => ['idCiudadResidencia' => 'id']],
            [['idEstadoCivil'], 'exist', 'skipOnError' => true, 'targetClass' => Estadocivil::class, 'targetAttribute' => ['idEstadoCivil' => 'id']],
            [['idNivelEstudio'], 'exist', 'skipOnError' => true, 'targetClass' => Nivelestudio::class, 'targetAttribute' => ['idNivelEstudio' => 'id']],
            [['idSexo'], 'exist', 'skipOnError' => true, 'targetClass' => Sexo::class, 'targetAttribute' => ['idSexo' => 'id']],
            [['idTipoIdentificacion'], 'exist', 'skipOnError' => true, 'targetClass' => Tipodocumentoidentificacion::class, 'targetAttribute' => ['idTipoIdentificacion' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idTipoIdentificacion' => 'Tipo Identificación',
            'documento' => 'Documento',
            'primerNombre' => 'Primer Nombre',
            'segundoNombre' => 'Segundo Nombre',
            'primerApellido' => 'Primer Apellido',
            'segundoApellido' => 'Segundo Apellido',
            'fechaNacimiento' => 'Fecha Nacimiento',
            'idSexo' => 'Sexo',
            'idEstadoCivil' => 'Estado Civil',
            'idCiudadResidencia' => 'Ciudad Residencia',
            'direccionResidencia' => 'Dirección Residencia',
            'indTelefonoContacto' => 'Prefijo',
            'telefonoContacto' => 'Teléfono Contacto',
            'correoElectronico' => 'Correo Electrónico',
            'idEstadoCivil' => 'Estado Civil', 
            'idNivelEstudio' => 'Nivel Educativo',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'idGradoMilitar' => 'Grado Militar',
            'ultimaUnidad' => 'Última Unidad'
        ];
    }

    /**
     * Gets query for [[Ciudadresidencia]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCiudadresidencia()
    {
        return $this->hasOne(Ciudad::class, ['id' => 'idCiudadResidencia']);
    }

    /**
     * Gets query for [[Estadocivil]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstadocivil()
    {
        return $this->hasOne(Estadocivil::class, ['id' => 'idEstadoCivil']);
    }

    public function getEstadopersona()
    {
        return $this->hasOne(Estadopersona::class, ['id' => 'idEstado']);
    }

    /**
     * Gets query for [[Sexo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSexo()
    {
        return $this->hasOne(Sexo::class, ['id' => 'idSexo']);
    }

    /**
     * Gets query for [[Tipoidentificacion]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTipoidentificacion()
    {
        return $this->hasOne(Tipodocumentoidentificacion::class, ['id' => 'idTipoIdentificacion']);
    }

    public function getNivelestudio()
    {
        return $this->hasOne(Nivelestudio::class, ['id' => 'idNivelEstudio']);
    }

    public function getInformacionmilitar()
    {
        return $this->hasOne(Informacionmilitar::class, ['idPersona' => 'id']);
    }

    public function signup()
    {
        $class = Yii::$app->getUser()->identityClass ? : 'mdm\admin\models\User';
        $user = new $class();
        $user->username = $this->username;
        $user->email = $this->correoElectronico;
        $user->status = 10;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        if ($user->save()) {
            return $user;
        }

        return null;
    }
}
