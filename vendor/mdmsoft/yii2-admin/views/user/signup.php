<?php

// Definir el estilo CSS directamente en la vista
$this->registerCss('
    .login-container {
        width: 500px; /* Ancho del contenedor */
        margin: 0 auto; /* Margen automático para centrar horizontalmente */
        /* text-align: center; */ 
        /* Alinear el contenido al centro */
    }

    .btn-create {
        width: 300px;
    }
    
    .centrar {
        text-align: center;
    }
');

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \mdm\admin\models\form\Signup */

$this->title = Yii::t('rbac-admin', 'Registrarse');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-container">

    <!--
    <h1><?= Html::encode($this->title) ?></h1>
    -->

    <!--
    <p>Please fill out the following fields to login:</p>
    -->

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 align="center">
                    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                        <?= $form->field($model, 'username')->label('Nombre de Usuario') ?>
                        <?= $form->field($model, 'email')->label('Correo Electrónico') ?>
                        <?= $form->field($model, 'password')->passwordInput()->label('Contraseña') ?>
                        <?= $form->field($model, 'retypePassword')->passwordInput()->label('Repetir') ?>
                        <div class="form-group">
                            <?= Html::submitButton(Yii::t('rbac-admin', 'Registrarse'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
