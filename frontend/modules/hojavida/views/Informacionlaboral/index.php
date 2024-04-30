<?php

// Definir el estilo CSS directamente en la vista
$this->registerCss('
    .mi-gridview {
        font-size: 16px; /* Ajusta el tamaño de la fuente según sea necesario */
        /* Otros estilos CSS según sea necesario */
    }

    .btn-create {
        width: 300px;
    }
    
    .titulo {
        color: black;
        font-weight: bold;
    }

    .titulonombre {
        color: black;
        font-weight: bold;
        font-size: 40px;
    }

    .centrar {
        text-align: center;
    }

    .izquierda {
        text-align: left;
    }

    .derecha {
        text-align: right;
    }

    .horizontal-line {
        border: none;
        border-top: 1px solid #ccc; /* Color y grosor de la línea */
        margin: 10px 0; /* Espacio alrededor de la línea */
    }

    .titulo-seccion-FAA {
        background-color: #FFC658;
        border: none;
    }
');

$this->registerJsFile(
    Yii::$app->request->baseUrl . '/js/mainDataModal.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);

use frontend\models\Informacionlaboral;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;

use yii\bootstrap4\Modal;

/** @var yii\web\View $this */
/** @var frontend\models\search\InformacionlaboralSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Experiencia laboral';
$this->params['breadcrumbs'][] = ['label' => 'hoja de vida', 'url' => ['/hojavida', 'id' => $dataProvider->getModels()[0]->id]];
$this->params['breadcrumbs'][] = $this->title;

?>

<?php
Modal::begin([
    'title' => '<h4>Datos Básicos Experiencia Laboral</h4>',
    'id' => 'modaldata',
    'size' => 'modal-lg',
    'options' => [
        'tabindex' => false  // Importante para que funcione el Select
    ]
]);

echo "<div id='modalContentData'></div>";

Modal::end();
?>

<div class="informacionlaboral-index">

    <div class="row">
        <div class="col-lg-12 centrar">
            <?php $url = Url::to(['create']); ?>

            <?= Html::button(
                'Adicionar experiencia',
                ['value' => $url, 'class' => 'btn btn-success btn-lg btn-create', 'id' => 'modalButtonCreate']
            )
                ?>
        </div>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,

        'summary' => 'Mostrando {begin} - {end} de {totalCount} resultados',
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
        'options' => [
            'class' => 'mi-gridview gridview-responsive',
        ],

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nombreEmpresa',
            'nombreCargo',
            'fechaDesde',
            'fechaHasta',
            [
                'class' => ActionColumn::className(),
                'header' => 'Acción',
                'headerOptions' => ['width' => '15%'],
                'template' => '{update} {delete}',
                'contentOptions' => ['data-cellvalue' => 'Acciones',],
                'buttons' => [

                    'view' => function ($url, $model) {
            return Html::a(
                '<i class="fa fa-eye"></i>',
                ['view', 'id' => $model->id],
                [
                    'title' => 'Ver',
                    'class' => 'btn btn-default btn_view',
                ]
            );
        },


                    'update' => function ($url, $model) {
            $t = Url::to([
                'update',
                'id' => $model->id
            ]);

            return Html::button('<i class="fa fa-edit"></i>', [
                'value' => $t,
                'title' => 'Actualizar Datos Experiencia Laboral',
                'class' => 'btn btn-default btn_update',
            ]);
        },

                    'delete' => function ($url, $model) {
            return Html::a(
                '<i class="fa fa-trash"></i>',
                ['delete', 'id' => $model->id],
                [
                    'class' => 'btn btn-default',
                    'title' => 'Eliminar',
                    'data' => [
                        'confirm' => 'Esta seguro de eliminar este registro? ',
                        'method' => 'post',
                    ]
                ]
            );
        },
                ],
            ],
        ],
    ]); ?>


</div>