<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/** @var yii\web\View $this */
/** @var frontend\models\Informacionlaboral $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="informacionlaboral-form">
    <?php $form = ActiveForm::begin([
        'id' => 'modal-form-informacionlaboral',
        'enableAjaxValidation' => true,
    ]); ?>

    <div class="form-group row">
        <div class="row">
            <?= $form->field($model, 'nombreEmpresa', ['options' => ['class' => 'col-sm-12']])->textInput(['maxlength' => true])->label('Nombre de la Empresa') ?>
        </div>

        <div class="row">
            <?= $form->field($model, 'nombreCargo', ['options' => ['class' => 'col-sm-12']])->textInput(['maxlength' => true])->label('Nombre del Cargo') ?>
        </div>
    </div>

    <div class="form-group row">
        <?= $form->field($model, 'fechaDesde', ['options' => ['class' => 'col-sm-6']])->widget(DatePicker::className(), [
            'name' => 'fecha',
            'language' => 'es',
            'options' => ['placeholder' => 'Fecha Inicio...',],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
                'todayHighlight' => true
            ]
        ]) ?>

        <?= $form->field($model, 'fechaHasta', ['options' => ['class' => 'col-sm-6']])->widget(DatePicker::className(), [
            'name' => 'fecha',
            'language' => 'es',
            'options' => ['placeholder' => 'Fecha Final...',],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
                'todayHighlight' => true
            ]
        ]) ?>
    </div>

    <div class="form-group centrar">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success btn-lg btn-create']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>