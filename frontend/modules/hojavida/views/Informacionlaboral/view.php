<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\models\Informacionlaboral $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Experiencia laboral', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="informacionlaboral-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nombreEmpresa',
            'nombreCargo',
            'fechaDesde',
            'fechaHasta',
        ],
    ]) ?>

    <div class="row">
        <div class="col-md-12">
            <p>
                <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Estás seguro de eliminar?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>
        </div>
    </div>

</div>