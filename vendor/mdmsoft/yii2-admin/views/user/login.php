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
//use yii\bootstrap\ActiveForm;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \mdm\admin\models\form\Login */

$this->title = Yii::t('rbac-admin', 'Iniciar Sesión');
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
                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                        <?= $form->field($model, 'username')->label('Nombre Usuario') ?>
                        <?= $form->field($model, 'password')->passwordInput()->label('Contraseña') ?>

                        <!--
                        <?= $form->field($model, 'rememberMe')->checkbox() ?>
                        -->

                        <!--
                        <div style="color:#999;margin:1em 0">
                            If you forgot your password you can <?= Html::a('reset it', ['user/request-password-reset']) ?>.
                            For new user you can <?= Html::a('signup', ['user/signup']) ?>.
                        </div>
                        -->

                        <div class="col-lg-12 align="center">
                            <div class="form-group" align="center">
                                <?= Html::submitButton('Ingresar', ['class' => 'btn btn-primary btn-lg btn-create', 'name' => 'login-button']) ?>
                            </div>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
