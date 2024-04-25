<?php

$this->registerCss('

    .btn-create {
        width: 300px;
    }

    .centrar {
        text-align: center;
    }

    /* styles.css */

    /* Cambiar el tamaño de la letra para todo el formulario */
    form {
        font-size: 12px; /* Cambia el tamaño de la letra a 16px */
    }
    
    /* Cambiar el tamaño de la letra para etiquetas de campo */
    label {
        font-size: 12px; /* Cambia el tamaño de la letra a 14px */
    }
    
    /* Cambiar el tamaño de la letra para los inputs de texto */
    input[type="text"] {
        font-size: 12px; /* Cambia el tamaño de la letra a 12px */
    }
    
    /* Cambiar el tamaño de la letra para los botones */
    button {
        font-size: 12px; /* Cambia el tamaño de la letra a 16px */
    }

    .titulo-seccion-FAA {
        background-color: #FFC658;
        border: none;
    }    
    
    
');


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;

use backend\models\Tipodocumentoidentificacion;
use backend\models\Sexo;
use backend\models\Estadocivil;
use backend\models\Ciudad;
use backend\models\Nivelestudio;
use backend\models\Gradomilitar;

/** @var yii\web\View $this */
/** @var common\models\Persona $model */
/** @var yii\widgets\ActiveForm $form */
?>

<?php $form = ActiveForm::begin(); ?>

<div class="card">
     
    <div class="card-header text-center titulo-seccion-FAA">
        <strong><h5>INFORMACIÓN DATOS PERSONALES</h5></strong>
    </div>

    <div class="card-body">

        <div class="row">
            <div class="col-lg-4">    
                <?= $form->field($model, 'idTipoIdentificacion')->dropDownList(
                                                    TipoDocumentoIdentificacion::getListaData(), 
                                                    [   'prompt' => ' Seleccionar Tipo Documento ... ' ,
                                                        'autofocus' => 'autofocus']);
                ?> 
            </div>

            <div class="col-lg-4">        
                <?= $form->field($model, 'documento',['inputOptions' => 
                                                            [   'class' => 'form-control',
                                                            ]
                                                    ])->textInput() 
                ?>
            </div> 
                
            <div class="col-lg-4">
                <?=
                    $form->field($model, 'idSexo', ['inputOptions' =>
                        ['class' => 'form-control']
                    ])->dropDownList(Sexo::getListaData(), ['prompt' => ' Seleccionar Sexo ... '])->label('Sexo');
                ?>         
            </div>  
                
        </div>

        <div class="row">          
            <div class="col-lg-3"> 
                <?= $form->field($model, 'primerNombre')->textInput(['maxlength' => true]) ?>
            </div>  

            <div class="col-lg-3">
                <?= $form->field($model, 'segundoNombre')->textInput(['maxlength' => true]) ?>
            </div>  

            <div class="col-lg-3">  
                <?= $form->field($model, 'primerApellido')->textInput(['maxlength' => true]) ?>
            </div>  

            <div class="col-lg-3">  
                <?= $form->field($model, 'segundoApellido')->textInput(['maxlength' => true]) ?>
            </div>                              
        </div>

        <div class="row">
            <div class="col-lg-4">
                <?= $form->field($model, 'fechaNacimiento')->widget(DatePicker::className(),[
                        'name' => 'fechaNacimiento', 
                        'language'=>'es',
                        'options' => ['placeholder' => 'Seleccionar Fecha Nacimiento ...'],
                        'pluginOptions' => [
                            'autoclose'=>true,
                            'format' => 'yyyy-mm-dd',
                            'todayHighlight' => true
                        ]
                ]) ?>            
            </div>

            <div class="col-lg-4">
                <?=
                    $form->field($model, 'idEstadoCivil', ['inputOptions' =>
                        ['class' => 'form-control']
                    ])->dropDownList(Estadocivil::getListaData(), ['prompt' => ' Seleccionar Estado Civil ... '])->label('Estado Civil');
                ?>         
            </div>

            <div class="col-lg-4">
                <?=
                    $form->field($model, 'idNivelEstudio', ['inputOptions' =>
                        ['class' => 'form-control']
                    ])->dropDownList(Nivelestudio::getListaData(), ['prompt' => ' Seleccionar Nivel Educativo ... '])->label('Nivel Educativo');
                ?>         
            </div>
        </div>
    </div>
</div>

<div class="card">

    <div class="card-header text-center titulo-seccion-FAA">
        <strong><h5>INFORMACIÓN UBICACIÓN</h5></strong>
    </div>

    <div class="card-body">

        <div class="row">
            <div class="col-lg-4">
                <?= $form->field($model, 'idCiudadResidencia')->widget(Select2::classname(), [
                        'data' => Ciudad::getListaData(),
                        'options' => [
                            'placeholder' => 'Ciudad Residencia ...', 
                            'multiple' => false,
                            'id' => 'id-ciudad-residencia',
                        ],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);    
                ?>
            </div>

            <div class="col-lg-8">
                <?= $form->field($model, 'direccionResidencia')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <div class="row">
            
            <div class="col-lg-3">
                <?= $form->field($model, 'indTelefonoContacto')->widget(\yii\widgets\MaskedInput::className(), [
                        'mask' => '999',
                ])->textInput(['id' => 'indtelefonocontacto', 'required' => true]) ?>
            </div>
            
            <div class="col-lg-3">
                <?= $form->field($model, 'telefonoContacto')->widget(\yii\widgets\MaskedInput::className(), [
                        'mask' => '9999999999',
                ])->textInput(['id' => 'telefonoontacto']) ?>
            </div>

        </div>
    </div>
</div>

<div class="card">

    <div class="card-header text-center titulo-seccion-FAA">
        <strong><h5>INFORMACIÓN MILITAR</h5></strong>
    </div>

    <div class="card-body">

        <div class="row">
            <div class="col-lg-3">
                <?=
                    $form->field($model, 'idGradoMilitar', ['inputOptions' =>
                        ['class' => 'form-control']
                    ])->dropDownList(Gradomilitar::getListaData(), ['prompt' => ' Seleccionar Grado Militar ... ', 'required' => true])->label('Grado Militar');
                ?>
            </div>

            <div class="col-lg-9">
                <?= $form->field($model, 'ultimaUnidad')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="form-group centrar">
            <?= Html::submitButton('Registrar', ['class' => 'btn btn-success btn-lg btn-create']) ?>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>

</div>
