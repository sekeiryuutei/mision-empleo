<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Informacionestudio $model */

$this->title = 'Actualizar estudio: ' . $model->tituloObtenido;
$this->params['breadcrumbs'][] = ['label' => 'Informacion estudios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="informacionestudio-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
