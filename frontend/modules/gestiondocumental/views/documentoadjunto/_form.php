<?php


$this->registerCss('
    .mi-gridview {
        font-size: 11px; /* Ajusta el tamaño de la fuente según sea necesario */
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
');

use yii\helpers\Html;
use kartik\file\FileInput;
use yii\widgets\ActiveForm;

use backend\models\Tipodocumentoadjunto;

/** @var yii\web\View $this */
/** @var frontend\models\Documentoadjunto $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="card">

    <?php $form = ActiveForm::begin([
          'options'=>['enctype'=>'multipart/form-data']]); ?>

    <div class="card-body">

        <div class="row">
            <div class="col-lg-4">    
                <?= $form->field($model, 'idTipoDocumentoAdjunto')->dropDownList(
                            Tipodocumentoadjunto::getListaData(), 
                            ['prompt' => ' Seleccionar Tipo Documento ... ',])->label('Tipo Documento');
                ?> 
            </div>

            <div class="col-lg-8">
                <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                
                <?php

                if ($model->isNewRecord) {
                    $initialpreview = false;
                    $initialcaption = '';
                    $ruta = '';
                } else {
                    $ruta = Yii::$app->params['domainName'] . $model->path_server . $model->web_filename;
                    $file = $model->path_filename . $model->path_server . $model->web_filename;

                    $initialcaption = $model->web_filename;
                    $initialpreview = $ruta;
                    //$initialpreview = [Html::img( $ruta , ['class'=>'file-preview-image'])];
                }

                $dataImg[0] = [];
                if ($model->extension){
                    $list_ext = array("pdf", 'docx');
                    if (in_array($model->extension, $list_ext)){
                        $dataImg[0] = [
                            'type' => $model->extension,
                        ];
                    }
                }

                ?>

                <?= $form->field($model, 'image')->widget(FileInput::classname(), [
                                                'options' => ['accept' => '*', 'multiple' => false,],
                                                'language' => 'es' ,
                                                'pluginOptions'=>[
                                                    //'allowedFileExtensions'=>['jpg','gif','png'],
                                                    'showPreview' => true,
                                                    'showCaption' => true,
                                                    'showRemove' => true,
                                                    'showUpload' => false,
                                                    'initialPreview'=>$initialpreview,
                                                    'initialPreviewConfig' => $dataImg,
                                                    'initialCaption' => $initialcaption,
                                                    'initialPreviewAsData'=>true,
                                                    'overwriteInitial'=>true,
                                                    //'browseLabel' =>  'Seleccionar Audio'
                                                ],
                            ]);   
                ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 centrar">
            <div class="form-group centrar">
                <?= Html::submitButton('Registrar', ['class' => 'btn btn-success btn-lg btn-create']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
