<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Informacionlaboral $model */

$this->title = 'Agregar experiencia';
$this->params['breadcrumbs'][] = ['label' => 'Informacionlaborals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="informacionlaboral-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
