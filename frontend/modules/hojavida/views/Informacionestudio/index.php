<?php

use frontend\models\Informacionestudio;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use backend\models\Nivelestudio;
use frontend\models\Documentoadjunto;
use common\models\Persona;

/** @var yii\web\View $this */
/** @var frontend\models\search\InformacionestudioSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Lista de estudios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="informacionestudio-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Adicionar estudio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => 'Mostrando {begin} - {end} de {totalCount} resultados',
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
        'options' => [
            'class' => 'mi-gridview gridview-responsive',
        ],
        'tableOptions' => ['class' => 'table table-bordered table-striped'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',

            [
                'attribute' => 'idPersona',
                // 'filter' => Persona::getListaData(),
                'contentOptions' => ['data-cellvalue' => 'idPersona'],
                'value' => function ($model) {
                        return $model->persona->primerNombre . ' ' . $model->persona->primerApellido;
                    },
            ],
            'tituloObtenido',
            [
                'attribute' => 'idNivelAcademico',
                'filter' => Nivelestudio::getListaData(),
                'contentOptions' => ['data-cellvalue' => 'NivelAcademico'],
                'value' => function ($model) {
                        return $model->nivelAcademico->nombre;
                    },
            ],
            'nombreInstitucion',
            //'fecha',
            //'graduado',
            //'idAdjunto',
            //'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Informacionestudio $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
            ],
       
        ],
    ]); ?>


</div>