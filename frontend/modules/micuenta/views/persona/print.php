<?php

$this->registerCss('
    .mi-gridview {
        font-size: 12px; /* Ajusta el tamaño de la fuente según sea necesario */
        /* Otros estilos CSS según sea necesario */
    }

    .btn-create {
        width: 300px;
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

use yii\helpers\Html;
//use yii\widgets\DetailView;
use kartik\detail\DetailView;

use kartik\icons\Icon;

Icon::map($this);

use kartik\grid\GridView;

use backend\models\Tipodocumentoadjunto;


/** @var yii\web\View $this */
/** @var common\models\Persona $model */

$this->title = 'Datos Personales';
//$this->params['breadcrumbs'][] = ['label' => 'Personas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<?php
$attributes = [
    [
        'group' => true,
        'label' => 'INFORMACIÓN DATOS PERSONALES',
        'rowOptions' => ['class' => 'table-info']
    ],
    [
        'columns' => [
            [
                'attribute' => 'idTipoIdentificacion',
                'label' => 'Tipo Identificación',
                'displayOnly' => true,
                'labelColOptions' => ['style' => 'width:10%'],
                'valueColOptions' => ['style' => 'width:15%'],
                'value' => $model->tipoidentificacion->nombre,
            ],
            [
                'attribute' => 'documento',
                'label' => 'No. Identificación',
                'displayOnly' => true,
                'labelColOptions' => ['style' => 'width:10%'],
                'valueColOptions' => ['style' => 'width:15%'],
                'value' => $model->documento,
            ],

            [
                'attribute' => 'nombreCompleto',
                'label' => 'Nombre',
                'displayOnly' => true,
                'labelColOptions' => ['style' => 'width:5%'],
                'valueColOptions' => ['style' => 'width:30%'],
                'value' => $model->primerNombre . ' ' . $model->segundoNombre . ' ' . $model->primerApellido . ' ' . $model->segundoApellido,
            ],

            [
                'attribute' => 'idSexo',
                'label' => 'Sexo',
                'displayOnly' => true,
                'labelColOptions' => ['style' => 'width:5%'],
                'valueColOptions' => ['style' => 'width:10%'],
                'value' => $model->sexo->nombre,
            ],

        ],
    ],

    [
        'columns' => [
            [
                'attribute' => 'fechaNacimiento',
                'label' => 'Fecha Nacimiento',
                'displayOnly' => true,
                'labelColOptions' => ['style' => 'width:10%'],
                'valueColOptions' => ['style' => 'width:15%'],
                'value' => $model->fechaNacimiento,
            ],
            [
                'attribute' => 'idEstadoCivil',
                'label' => 'Estado Civil',
                'displayOnly' => true,
                'labelColOptions' => ['style' => 'width:10%'],
                'valueColOptions' => ['style' => 'width:15%'],
                'value' => $model->estadocivil->nombre,
            ],

            [
                'attribute' => 'idNivelEstudio',
                'label' => 'Nivel Estudio',
                'displayOnly' => true,
                'labelColOptions' => ['style' => 'width:10%'],
                'valueColOptions' => ['style' => 'width:15%'],
                'value' => $model->nivelestudio->nombre,
            ],
            [
                'attribute' => 'idEstado',
                'label' => 'Estado',
                'displayOnly' => true,
                'labelColOptions' => ['style' => 'width:10%'],
                'valueColOptions' => ['style' => 'width:15%'],
                'value' => $model->estadopersona->nombre,
            ],

        ],
    ],

    [
        'group' => true,
        'label' => 'INFORMACIÓN UBICACIÓN',
        'rowOptions' => ['class' => 'table-info']
    ],
    [
        'columns' => [
            [
                'attribute' => 'idCiudadResidencia',
                'label' => 'Ciudad Residencia',
                'displayOnly' => true,
                'labelColOptions' => ['style' => 'width:10%'],
                'valueColOptions' => ['style' => 'width:15%'],
                'value' => $model->ciudadresidencia->nombre,
            ],
            [
                'attribute' => 'direccionResidencia',
                'label' => 'Dirección Residencia',
                'displayOnly' => true,
                'labelColOptions' => ['style' => 'width:15%'],
                'valueColOptions' => ['style' => 'width:30%'],
                'value' => $model->direccionResidencia,
            ],

            [
                'attribute' => 'telefonoContacto',
                'label' => 'Teléfono Contacto',
                'displayOnly' => true,
                'labelColOptions' => ['style' => 'width:10%'],
                'valueColOptions' => ['style' => 'width:20%'],
                'value' => $model->indTelefonoContacto . ' - ' . $model->telefonoContacto,
            ],
        ],
    ],

    [
        'group' => true,
        'label' => 'INFORMACIÓN MILITAR',
        'rowOptions' => ['class' => 'table-info']
    ],
    [
        'columns' => [
            [
                'attribute' => 'idGradoMilitar',
                'label' => 'Grado Militar',
                'displayOnly' => true,
                'labelColOptions' => ['style' => 'width:10%'],
                'valueColOptions' => ['style' => 'width:15%'],
                'value' => $model->informacionmilitar ? $model->informacionmilitar->gradomilitar->nombre : '-',
            ],
            [
                'attribute' => 'ultimaUnidad',
                'label' => 'Última Unidad',
                'displayOnly' => true,
                'labelColOptions' => ['style' => 'width:15%'],
                'valueColOptions' => ['style' => 'width:40%'],
                'value' => $model->informacionmilitar ? $model->informacionmilitar->ultimaUnidad : ' - ',
            ],
        ],
    ],

    [
        'group' => true,
        'label' => 'INFORMACIÓN CUENTA',
        'rowOptions' => ['class' => 'table-info']
    ],
    [
        'columns' => [
            [
                'attribute' => 'username',
                'label' => 'Nombre Usuario',
                'displayOnly' => true,
                'labelColOptions' => ['style' => 'width:10%'],
                'valueColOptions' => ['style' => 'width:15%'],
                'value' => $model->username,
            ],
            [
                'attribute' => 'correoElectronico',
                'label' => 'Correo Electrónico',
                'displayOnly' => true,
                'labelColOptions' => ['style' => 'width:15%'],
                'valueColOptions' => ['style' => 'width:40%'],
                'value' => $model->correoElectronico,
            ],
        ],
    ],
];
?>
<h3>Hoja de vida</h3>

<?= Html::tag('hr', '', ['class' => 'horizontal-line']) ?>

<div class="card">
    <div class="card-body">
        <?=
            DetailView::widget([
                'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
                'options' => ['style' => 'font-size:14px;'],
                'model' => $model,
                'attributes' => $attributes,
                'mode' => DetailView::MODE_VIEW,
                'bordered' => true,
                'striped' => true,
                'condensed' => true,
                'responsive' => true,
                'hover' => true,
                'hAlign' => 'left',
                'vAlign' => 'top',
            ]);
        ?>

        <!-- Información Laboral -->
        <?php if (!empty($informacionLaboralModel)): ?>
            <?php
            // Definir el grupo de sección fuera del bucle
            $attributeslaboralModel = [
                [
                    'group' => true,
                    'label' => 'INFORMACIÓN LABORAL',
                    'rowOptions' => ['class' => 'table-info']
                ],
            ];
            ?>
            <?php foreach ($informacionLaboralModel as $laboralModel): ?>
                <?php
                // Agregar los atributos específicos de cada modelo dentro del bucle
                $attributeslaboralModel[] = [
                    'columns' => [
                        [
                            'attribute' => 'nombreEmpresa',
                            'label' => 'Nombre de la empresa',
                            'displayOnly' => true,
                            'labelColOptions' => ['style' => 'width:15%'],
                            'valueColOptions' => ['style' => 'width:35%'],
                            'value' => $laboralModel->nombreEmpresa,
                        ],
                        [
                            'attribute' => 'nombreCargo',
                            'label' => 'Nombre del cargo',
                            'displayOnly' => true,
                            'labelColOptions' => ['style' => 'width:15%'],
                            'valueColOptions' => ['style' => 'width:35%'],
                            'value' => $laboralModel->nombreCargo,
                        ],
                    ],
                ];
                $attributeslaboralModel[] = [
                    'columns' => [
                        [
                            'attribute' => 'fechaDesde',
                            'label' => 'Inicio',
                            'displayOnly' => true,
                            'labelColOptions' => ['style' => 'width:15%'],
                            'valueColOptions' => ['style' => 'width:35%'],
                            'value' => $laboralModel->fechaDesde,
                        ],
                        [
                            'attribute' => 'fechaHasta',
                            'label' => 'Finalizo',
                            'displayOnly' => true,
                            'labelColOptions' => ['style' => 'width:15%'],
                            'valueColOptions' => ['style' => 'width:35%'],
                            'value' => $laboralModel->fechaHasta,
                        ],
                    ],
                ];
                ?>
            <?php endforeach; ?>

            <?= DetailView::widget([
                'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
                'options' => ['style' => 'font-size:8px;'],
                'model' => $laboralModel,
                'attributes' => $attributeslaboralModel,
                'mode' => DetailView::MODE_VIEW,
                'bordered' => true,
                'striped' => true,
                'condensed' => true,
                'responsive' => true,
                'hover' => true,
                'hAlign' => 'left',
                'vAlign' => 'top',
            ]); ?>

        <?php else: ?>
            <p>No se encontró información laboral.</p>
        <?php endif; ?>

        <!-- Información de Estudio -->

        <?php if (!empty($informacionEstudioModel)): ?>
            <?php
            // Definir el grupo de sección fuera del bucle
            $attributesEstudioModel = [
                [
                    'group' => true,
                    'label' => 'INFORMACIÓN ESTUDIOS',
                    'rowOptions' => ['class' => 'table-info']
                ],
            ];
            ?>
            <?php foreach ($informacionEstudioModel as $estudioModel): ?>
                <?php
                // Definir los atributos específicos de cada modelo dentro del bucle
                $attributesEstudioModel[] = [
                    'columns' => [
                        [
                            'attribute' => 'tituloObtenido',
                            'label' => 'Título',
                            'displayOnly' => true,
                            'labelColOptions' => ['style' => 'width:5%'],
                            'valueColOptions' => ['style' => 'width:35%'],
                            'value' => $estudioModel->tituloObtenido,
                        ],
                        [
                            'attribute' => 'nombreInstitucion',
                            'label' => 'Nombre de la institución',
                            'displayOnly' => true,
                            'labelColOptions' => ['style' => 'width:20%'],
                            'valueColOptions' => ['style' => 'width:40%'],
                            'value' => $estudioModel->nombreInstitucion,
                        ],
                    ],
                ];
                $attributesEstudioModel[] = [
                    'columns' => [
                        [
                            'attribute' => 'idNivelAcademico',
                            'label' => 'Nivel academico',
                            'displayOnly' => true,
                            'labelColOptions' => ['style' => 'width:15%'],
                            'valueColOptions' => ['style' => 'width:25%'],
                            'value' => $estudioModel->nivelAcademico->nombre,
                        ],
                        [
                            'attribute' => 'Graduado',
                            'label' => 'Graduado',
                            'displayOnly' => true,
                            'labelColOptions' => ['style' => 'width:10%'],
                            'valueColOptions' => ['style' => 'width:10%'],
                            'value' => $estudioModel->graduado ? 'Sí' : 'No',
                        ],
                        [
                            'attribute' => 'fecha',
                            'label' => 'fecha de grado',
                            'displayOnly' => true,
                            'labelColOptions' => ['style' => 'width:17%'],
                            'valueColOptions' => ['style' => 'width:43%'],
                            'value' => $estudioModel->fecha  ? $estudioModel->fecha : 'Sin culminar',
                        ],
                    ],
                ];
                ?>
            <?php endforeach; ?>

            <?= DetailView::widget([
                'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
                'options' => ['style' => 'font-size:8px;'],
                'model' => $estudioModel, // Puedes usar $estudioModel o cualquier otro modelo relacionado
                'attributes' => $attributesEstudioModel,
                // 'attributes' => [
        
                //     'idNivelAcademico',
                //     [
                //         'label' => 'idNivelAcademico',
                //         'value' => $estudioModel->nivelAcademico->nombre, // Suponiendo que 'graduado' es un campo booleano
                //     ],
                //     [
                //         'label' => 'Graduado',
                //         'value' => $estudioModel->graduado ? 'Sí' : 'No', // Suponiendo que 'graduado' es un campo booleano
                //     ],
                //     'fecha',
                // ],
                'mode' => DetailView::MODE_VIEW,
                'bordered' => true,
                'striped' => true,
                'condensed' => true,
                'responsive' => true,
                'hover' => true,
                'hAlign' => 'left',
                'vAlign' => 'top',
            ]); ?>

        <?php else: ?>
            <p>No se encontró información de estudio.</p>
        <?php endif; ?>


    </div>
</div>

</div>

<!-- <div class="card-header text-center titulo-seccion-FAA">
    <strong>
        <h5>RELACIÓN DOCUMENTOS SOPORTE</h5>
    </strong>
</div>

<div class="gestiondocumental-view">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
    
        'summary' => "Mostrando {begin} - {end} de {totalCount} Registro(s)",
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
        'options' => ['style' => 'font-size:12px;'],

        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
    
            //'id',
            //'codigoModulo',
            [
                'attribute' => 'codigoModulo',
                'options' => ['width' => '10%'],
                'vAlign' => 'middle',
                'hAlign' => 'left',
            ],

            [
                'attribute' => 'idTipoDocumentoAdjunto',
                'options' => ['width' => '15%'],
                'value' => function ($data) {
            return $data->tipodocumentoadjunto->nombre;
        },
                'filter' => Tipodocumentoadjunto::getListaData(),
                'vAlign' => 'middle',
                'hAlign' => 'left',
            ],

            //'idEntidad',
            [
                'attribute' => 'descripcion',
                'format' => 'html',
                'options' => ['width' => '25%'],
                'vAlign' => 'middle',
                'hAlign' => 'left',
                'value' => function ($model) {
            if ($model->descripcion) {
                return "<span style='font-family: Dejavu Sans, monospace'>"
                    . Yii::$app->formatter->asNtext($model->descripcion) . '</span>';
            }

            return '-';
        }
            ],

            [
                'attribute' => 'web_filename',
                'format' => 'raw',
                'options' => ['width' => '20%'],
                'label' => 'Archivo',
                'vAlign' => 'middle',
                'hAlign' => 'left',
                'value' => function ($model) {
            if ($model->web_filename != '') {
                return Html::a(
                    $model->web_filename,                     //link text
                    ['/gestiondocumental/documentoadjunto/view', 'id' => $model->id], //link url to some route
                    [                                 // link options
                        'title' => 'Visualizar Archivo',
                        'target' => '_blank'
                    ]
                );
            }

            return ' - ';
        },
            ],

            [
                'attribute' => 'tags',
                'format' => 'html',
                'options' => ['width' => '30%'],
                'vAlign' => 'middle',
                'hAlign' => 'left',
                'value' => function ($model) {
            if ($model->tags) {
                return "<span style='font-family: Dejavu Sans, monospace'>"
                    . Yii::$app->formatter->asNtext($model->tags) . '</span>';
            }

            return '-';
        }
            ],

            //'src_filename',
            //'fechaCrea',
            //'usuarioCrea',
            //'fechaModifica',
            //'usuarioModifica',
            //'path_filename',
            //'path_server',
            //'extension',
    
        ],
    ]); ?>
</div> -->