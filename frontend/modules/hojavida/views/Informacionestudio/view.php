<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\Documentoadjunto;

/** @var yii\web\View $this */
/** @var frontend\models\Informacionestudio $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Informacionestudios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="informacionestudio-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Estas seguro de eliminar?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

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
            [
                'attribute' => 'idAdjunto',
                'format' => 'raw',
                'value' => function ($model) {
                $documentos = Documentoadjunto::findAll(['idEntidad' => $model->id, 'codigoModulo' => 'Informacionestudio']);
                $output = '';
                foreach ($documentos as $documento) {
                    $output .= $documento->src_filename . ' ' . $documento->descripcion 
                    // . ' ' .
                    // Html::a(
                    //     'Actualizar Documentos',
                    //     ['/gestiondocumental/documentoadjunto/update',  'id' => $documento->id,],
                    //     ['class' => 'btn btn-success btn-sm btn-create', 'id' => 'modalButtonUpload']
                    // )
                    . '<br>';
                }
                return $output;
            },
            ],
        ],
    ]) ?>

</div>