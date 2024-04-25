<?php
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
/* @var $model \mdm\admin\models\form\ChangePassword */

$this->title = Yii::t('rbac-admin', 'Change Password');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-container">

    <!--
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to change password:</p>
    -->

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 centrar">
                    <?php $form = ActiveForm::begin(['id' => 'form-change']); ?>
                        <?= $form->field($model, 'oldPassword')->passwordInput() ?>
                        <?= $form->field($model, 'newPassword')->passwordInput() ?>
                        <?= $form->field($model, 'retypePassword')->passwordInput() ?>
                        <div class="form-group">
                            <?= Html::submitButton(Yii::t('rbac-admin', 'Change'), ['class' => 'btn btn-primary btn-lg btn-create', 'name' => 'change-button']) ?>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
