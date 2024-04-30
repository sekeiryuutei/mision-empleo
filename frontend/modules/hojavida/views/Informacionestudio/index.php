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

$this->registerJsFile(Yii::$app->request->baseUrl.'/js/mainDataModal.js',
['depends' => [\yii\web\JqueryAsset::className()]]
);

use frontend\models\Informacionestudio;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;
use backend\models\Nivelestudio;
use frontend\models\Documentoadjunto;
use common\models\Persona;

use yii\bootstrap4\Modal;

/** @var yii\web\View $this */
/** @var frontend\models\search\InformacionestudioSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Lista de estudios';
$this->params['breadcrumbs'][] = ['label' => 'hoja de vida', 'url' => ['/hojavida', 'id' => $dataProvider->getModels()[0]->id]];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
    Modal::begin([                
        'title'=>'<h4>Datos Básicos Estudio</h4>',
        'id'=>'modaldata',
        'size'=>'modal-lg',
        'options' => [
            'tabindex' => false  // Importante para que funcione el Select
        ]
    ]);
        
    echo "<div id='modalContentData'></div>";
        
    Modal::end(); 
?>

<div class="informacionestudio-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <div class="row">
        <div class="col-lg-12 centrar">
            <?php $url = Url::to(['create']); ?>

            <?= Html::button('Adicionar estudio', 
                        ['value'=>  $url, 'class' => 'btn btn-success btn-lg btn-create', 'id'=>'modalButtonCreate']) 
            ?>
        </div>
    </div>

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

            // 'id',
    
            // [
            //     'attribute' => 'idPersona',
            //     // 'filter' => '$persona->id',
            //     'contentOptions' => ['data-cellvalue' => 'idPersona' , 'disabled' => true],
            //     'value' => function ($model) {
            //             return $model->persona->primerNombre . ' ' . $model->persona->primerApellido;
            //         },
            // ],
    

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

            [
                'attribute' => 'fecha',
                'contentOptions' => ['data-cellvalue' => 'fecha'],
                'value' => function ($model) {
                        return $model->fecha ? $model->fecha : 'Sin grado';
                    },
            ],

            [
                'attribute' => 'web_filename',
                'format' => 'raw',
                'options' => ['width' => '20%'],
                'label' => 'Archivo',
                'vAlign'=>'middle',
                'hAlign'=>'left',                
                'value' => function ($model) {   
                    if ($model->documentoadjunto!=''){
                        return Html::a(
                            $model->documentoadjunto->web_filename,                     //link text
                            ['/gestiondocumental/documentoadjunto/view','id'=>$model->idAdjunto], //link url to some route
                            [                                 // link options
                                'title'=>'Visualizar Archivo',
                                'target'=>'_blank'
                            ]
                        );
                    }

                    return ' - ';
                },
            ],
            // 'graduado',
            //'idAdjunto',
            //'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',
    
            [
                'class' => ActionColumn::className(),
                'header' => 'Acción',
                'headerOptions' => ['width' => '18%'],
                'template' => ' {update} {delete} {upload}',
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
                            $t = Url::to([  'update', 
                                            'id' => $model->id
                                        ]);
    
                            return Html::button('<i class="fa fa-edit"></i>',[
                                        'value'=> $t,
                                        'title' => 'Actualizar Datos Estudio',
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

                    'upload' => function ($url, $model) {
                            return Html::a(
                                '<i class="fa fa-upload"></i>',
                                ['/gestiondocumental/documentoadjunto/create', 'idproyecto' => 1, 
                                'identidad' => $model->id, 'modulo' => 'Informacionestudio'],
                                [
                                    'class' => 'btn btn-default btn_upload',
                                    'title' => 'Subir documento',
                                ]


                            );
                        },
                ],
            ],

        ],
    ]); ?>


</div>