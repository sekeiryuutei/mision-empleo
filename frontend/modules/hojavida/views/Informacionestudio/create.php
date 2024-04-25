<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Informacionestudio $model */

$this->title = 'Adicionar Informacion de estudio';
$this->params['breadcrumbs'][] = ['label' => 'Informacionestudios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="informacionestudio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
