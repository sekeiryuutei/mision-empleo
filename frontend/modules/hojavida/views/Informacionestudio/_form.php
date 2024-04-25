<?php

use Symfony\Contracts\Service\Attribute\Required;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Nivelestudio;
use frontend\models\Documentoadjunto;

/** @var yii\web\View $this */
/** @var frontend\models\Informacionestudio $model */
/** @var yii\widgets\ActiveForm $form */

?>

<div class="informacionestudio-form">

    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'row g-3']
    ]); ?>

    <div class="col-md-4">
        <?= $form->field($model, 'tituloObtenido')->textInput(['maxlength' => true])->label('Título obtenido') ?>
    </div>

    <div class="col-md-4">
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

    <div class="col-md-4">
        <?= $form->field($model, 'nombreInstitucion')->textInput(['maxlength' => true])->label('Nombre de la institución') ?>
    </div>

    <div class="col-md-6">
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
                    $('#fecha-field').prop('disabled', true).val(' ');
                } else {
                    console.log('si');
                    $('#fecha-field').prop('disabled', false).attr('required', true);
                }
            "
            ]
        ) ?>
    </div>

    <div class="col-md-6">
        <?= $model->graduado ?
            $form->field($model, 'fecha')->textInput(['id' => 'fecha-field', 'disabled' => true])->label('Fecha')
            :
            $form->field($model, 'fecha')->textInput(['id' => 'fecha-field', 'disabled' => false])->label('Fecha')
            ?>
    </div>

    <div class="col-md-12 row">
        <h4>Documentos</h4>
        <?php
        $documentos = Documentoadjunto::findAll(['idEntidad' => $model->id, 'codigoModulo' => 'Informacionestudio']);
        $column_size = 6; // Tamaño de cada columna
        foreach ($documentos as $documento) {
            echo '<div class="col-md-' . $column_size . ' ">';
            echo '<div class="col-md-12' . ' wrap  justify-content-sm-between mt-2">'
                . $documento->src_filename . ' ' . $documento->descripcion . '   ' .
                Html::a(
                    'Actualizar Documento',
                    ['/gestiondocumental/documentoadjunto/update', 'id' => $documento->id,],
                    ['class' => 'btn btn-primary btn-sm', 'id' => 'modalButtonUpload']
                )
                . '</div></div>';
        }
        ?>
    </div>

    <div class="form-group col-md-12">
        <?=
            $model->id ?
            Html::a(
                'Subir Documentos',
                ['/gestiondocumental/documentoadjunto/create', 'idproyecto' => 1, 'identidad' => $model->id, 'modulo' => 'Informacionestudio'],
                ['class' => 'btn btn-success btn-lg btn-create', 'id' => 'modalButtonUpload']
            )
            :
            '';
        ?>

        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success btn-lg']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>