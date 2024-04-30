<?php

// Definir el estilo CSS directamente en la vista
$this->registerCss('
    .btn-create {
        width: 300px;
    }
    
    .centrar {
        text-align: center;
    }
');

use Symfony\Contracts\Service\Attribute\Required;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Nivelestudio;
use frontend\models\Documentoadjunto;
use kartik\date\DatePicker;

/** @var yii\web\View $this */
/** @var frontend\models\Informacionestudio $model */
/** @var yii\widgets\ActiveForm $form */

?>

<div class="informacionestudio-form">

    <?php $form = ActiveForm::begin([
        'id' => 'modal-form-informacionestudio',
        'enableAjaxValidation' => true,
        'options' => ['class' => 'row g-3']
    ]); ?>

    <div class="row">
        <div class="col-md-12 fw-bold">
            <?= $form->field($model, 'tituloObtenido')->textInput(['maxlength' => true])->label('Título obtenido') ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 fw-bold">
            <?= $form->field($model, 'nombreInstitucion')->textInput(['maxlength' => true])->label('Nombre de la institución') ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 fw-bold">
            <?= $form->field($model, 'idNivelAcademico')->dropDownList(
                Nivelestudio::getListaData(),
                [
                    'prompt' => ' Nivel Académico ... ',
                    'id' => 'id-nivel-academico',
                    'required' => true
                ]
            )
                ?>
        </div>

        <div class="col-md-3 fw-bold">
            <?= $form->field($model, 'graduado')->dropDownList(
                [
                    '0' => 'Sí',
                    '1' => 'No',
                ],
                [
                    'prompt' => 'Graduado ... ',
                    'id' => 'id-graduado',
                    'required' => true,
                    'onchange' => "
                if ($(this).val() == '1') {
                    console.log('no'); 
                    var clearButton = document.querySelector('.kv-date-remove');
                    clearButton.click();
                    $('#informacionestudio-fecha').prop('disabled', true);
                } else {
                    var fechaOriginal = new Date('$model->fecha');
                    $('#informacionestudio-fecha').prop('disabled', false);
                    if(fechaOriginal){
                        var fechaISO = fechaOriginal.toISOString().split('T')[0];
                        console.log('si', fechaISO); 
                        $('#informacionestudio-fecha').val(fechaISO);
                    }
                }
            "
                ]
            ) ?>
        </div>

        <div class="col-md-5 fw-bold">
            <?=
                $form->field($model, 'fecha')->textInput(['id' => 'fecha-field'])->label('Fecha')
                    ->widget(DatePicker::className(), [
                        'name' => 'fecha',
                        'language' => 'es',
                        'options' => [
                            'placeholder' => 'Seleccionar Fecha ...',
                            'disabled' => true,
                        ],
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd',
                            'todayHighlight' => true
                        ]
                    ])
                ?>
        </div>
    </div>

    <!-- <div class="col-md-12">
        <label class="fw-bold">Documentos</label>
        <div class="row">
            <?php
            $documentos = Documentoadjunto::findAll(['idEntidad' => $model->id, 'codigoModulo' => 'Informacionestudio']);
            $column_size = 6; // Tamaño de cada columna
            foreach ($documentos as $documento) {
                echo '<div class="col-md-' . $column_size . ' mt-2 d-flex">';
                echo '<div class="col-md-8">';
                echo $documento->src_filename . ' ' . $documento->descripcion;
                echo '</div>';
                echo '<div class="col-md-4">';
                echo Html::a(
                    'Actualizar Documento',
                    ['/gestiondocumental/documentoadjunto/update', 'id' => $documento->id,],
                    ['class' => 'btn btn-primary btn-sm bg-primary', 'id' => 'modalButtonUpload']
                );
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>

    </div> -->

    <div class="form-group col-md-12">
        <!-- <?=
            $model->id ?
            Html::a(
                'Subir Documento',
                ['/gestiondocumental/documentoadjunto/create', 'idproyecto' => 1, 'identidad' => $model->id, 'modulo' => 'Informacionestudio'],
                ['class' => 'btn btn-success btn-lg btn-create', 'id' => 'modalButtonUpload']
            )
            :
            '';
        ?> -->

        <div class="form-group centrar">
            <?= Html::submitButton('Guardar', ['class' => 'btn btn-success btn-lg btn-create']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>