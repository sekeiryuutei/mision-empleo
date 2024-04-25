<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\search\PersonaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="persona-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'idTipoIdentificacion') ?>

    <?= $form->field($model, 'documento') ?>

    <?= $form->field($model, 'primerNombre') ?>

    <?= $form->field($model, 'segundoNombre') ?>

    <?php // echo $form->field($model, 'primerApellido') ?>

    <?php // echo $form->field($model, 'segundoApellido') ?>

    <?php // echo $form->field($model, 'idSexo') ?>

    <?php // echo $form->field($model, 'idNivelEstudio') ?>

    <?php // echo $form->field($model, 'idEstadoCivil') ?>

    <?php // echo $form->field($model, 'idCiudadResidencia') ?>

    <?php // echo $form->field($model, 'direccionResidencia') ?>

    <?php // echo $form->field($model, 'indTelefonoContacto') ?>

    <?php // echo $form->field($model, 'telefonoContacto') ?>

    <?php // echo $form->field($model, 'correoElectronico') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
