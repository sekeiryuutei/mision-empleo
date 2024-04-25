<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\search\DocumentoadjuntoSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="documentoadjunto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'idProyecto') ?>

    <?= $form->field($model, 'codigoModulo') ?>

    <?= $form->field($model, 'idEntidad') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?php // echo $form->field($model, 'idTipoDocumentoAdjunto') ?>

    <?php // echo $form->field($model, 'src_filename') ?>

    <?php // echo $form->field($model, 'web_filename') ?>

    <?php // echo $form->field($model, 'path_filename') ?>

    <?php // echo $form->field($model, 'path_server') ?>

    <?php // echo $form->field($model, 'extension') ?>

    <?php // echo $form->field($model, 'tags') ?>

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
