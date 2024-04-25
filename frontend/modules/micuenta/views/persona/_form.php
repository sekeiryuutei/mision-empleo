<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Persona $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="persona-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idTipoIdentificacion')->textInput() ?>

    <?= $form->field($model, 'documento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'primerNombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'segundoNombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'primerApellido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'segundoApellido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idSexo')->textInput() ?>

    <?= $form->field($model, 'idEstadoCivil')->textInput() ?>

    <?= $form->field($model, 'idCiudadResidencia')->textInput() ?>

    <?= $form->field($model, 'direccionResidencia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'indTelefonoContacto')->textInput() ?>

    <?= $form->field($model, 'telefonoContacto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'correoElectronico')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
