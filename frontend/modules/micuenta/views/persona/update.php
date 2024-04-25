<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Persona $model */

$this->title = 'Actualizar Datos: ' . $model->documento;
$this->params['breadcrumbs'][] = ['label' => 'Persona', 'url' => ['view']];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="persona-update">

    <?= $this->render('_form_update', [
        'model' => $model,
    ]) ?>

</div>
