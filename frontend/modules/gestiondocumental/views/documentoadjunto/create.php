<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Documentoadjunto $model */

$this->title = 'Subir Soporte';

switch ($modulo) {
    case 'Persona':
        $this->params['breadcrumbs'][] = ['label' => 'Datos Personales', 'url' => ['/micuenta/persona/view']];
        break;
    case 'Informacionestudio':
        $this->params['breadcrumbs'][] = ['label' => 'Documentos de grado', $model->idEntidad, 'url' => ['/hojavida/informacionestudio/view', 'id' => $model->idEntidad]];
        break;
}


$this->params['breadcrumbs'][] = $this->title;
?>
<div class="documentoadjunto-create">

    <?= $this->render('_form', [
        'model' => $model,
        'modelentidad' => $modelentidad,
        'modulo' => $modulo
    ]) ?>

</div>