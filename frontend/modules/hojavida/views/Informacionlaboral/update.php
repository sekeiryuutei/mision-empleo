<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Informacionlaboral $model */

$this->title = 'Actualizar Experiencia: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Experiencia laboral', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="informacionlaboral-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>