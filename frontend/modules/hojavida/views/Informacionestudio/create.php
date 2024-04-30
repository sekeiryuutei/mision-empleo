<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Informacionestudio $model */

$this->title = 'Adicionar Informacion de estudio';
$this->params['breadcrumbs'][] = ['label' => 'Informacion estudios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="informacionestudio-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
