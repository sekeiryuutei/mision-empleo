<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\Documentoadjunto;

/** @var yii\web\View $this */
/** @var frontend\models\Informacionestudio $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Informacion estudios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="informacionestudio-view">

    <div class="row">
        <div class="col-md-12">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    [
                        'attribute' => 'idPersona',
                        'contentOptions' => ['data-cellvalue' => 'idPersona'],
                        'value' => function ($model) {
                                        return $model->persona->primerNombre . ' ' . $model->persona->primerApellido;
                                    },
                    ],
                    'tituloObtenido',
                    [
                        'attribute' => 'idPersona',
                        'value' => function ($model) {
                                        return $model->nivelAcademico->nombre;
                                    },
                    ],
                    'nombreInstitucion',
                    [
                        'attribute' => 'fecha',
                        'contentOptions' => ['data-cellvalue' => 'fecha'],
                        'value' => function ($model) {
                                        return $model->fecha ? $model->fecha : 'Sin culminar';
                                    },
                    ],
                    [
                        'attribute' => 'graduado',
                        'value' => function ($model) {
                                        return $model->graduado > 0 ? 'no' : 'si';
                                    },
                    ],
                ],
            ]) ?>
        </div>

        <!-- borrar si algo  -->

        <div class="col-md-6">
            <h4>Adjuntos:</h4>
            <?php
            $documentos = Documentoadjunto::findAll(['idEntidad' => $model->id, 'codigoModulo' => 'Informacionestudio']);
            foreach ($documentos as $documento) {
                echo 'Nombre: ' . $documento->src_filename . ' Descripcion: ' . $documento->descripcion . '<br>';
            }
            ?>
        </div>



    </div>

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