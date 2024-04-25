<?php
use yii\helpers\Html;
use yii\web\User;

$username = Yii::$app->user->isGuest ? 'Invitado' : Yii::$app->user->identity->username;

$rutaLogo = Yii::$app->request->baseUrl . '/img/mimision_logo.png';

$rutaInvitado = Yii::$app->request->baseUrl . '/img/anonimo_logo.png';
$rutaUsuario = Yii::$app->request->baseUrl . '/img/User_icon.png';

?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=Yii::$app->homeUrl?>" class="brand-link">
        <img src="<?= $rutaLogo ?>" alt="Ventas Proveedores" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Mi Misión</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <?php if (Yii::$app->user->isGuest) { ?>
                    <img src="<?=$rutaInvitado?>" class="img-circle circle-img elevation-2" alt="User Image">
                <?php } else { ?>
                    <img src="<?=$rutaUsuario?>" class="img-circle circle-img elevation-2" alt="User Image">
                <?php } ?>
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    <?php 
                        if (Yii::$app->user->isGuest) {
                            echo 'Invitado';
                        } else {
                            echo Yii::$app->user->identity->username;
                            $username =  Yii::$app->user->identity->username;
                        }
                    ?>
                </a>                
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [

                    [
                        'label' => 'Hoja de Vida',
                        'icon' => 'cog',
                        'badge' => '<span class="right badge badge-primary">1</span>',
                        'items' => [
                            ['label' => 'Crear Hoja de Vida', 'url' => ['/viewventapos/index'], 'icon' => 'th'],
                        ],                        
                    ],

                    [
                        'label' => 'Mi Cuenta',
                        'icon' => 'user
                        ',
                        'badge' => '<span class="right badge badge-info">1</span>',
                        'items' => [
                            ['label' => 'Iniciar Sesión', 'url' => ['/admin/user/login'], 'icon' => 'user', 'visible' => Yii::$app->user->isGuest],
                            ['label' => 'Registrarse', 'url' => ['/micuenta/persona/signup'], 'icon' => 'book', 'visible' => Yii::$app->user->isGuest],
                            ['label' => 'Actualizar Datos', 'url' => ['/micuenta/persona/view'], 'icon' => 'edit', 'visible' => !Yii::$app->user->isGuest],
                            ['label' => 'Cambiar Contraseña', 'url' => ['/admin/user/change-password'], 'icon' => 'user', 'visible' => !Yii::$app->user->isGuest],
                            //['label' => 'Inactive Page', 'iconStyle' => 'far'],
                        ],                        
                    ],

                    /*['label' => 'Simple Link', 'icon' => 'th', 'badge' => '<span class="right badge badge-danger">New</span>'],
                    ['label' => 'Yii2 PROVIDED', 'header' => true],
                    ['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'Gii',  'icon' => 'file-code', 'url' => ['/gii'], 'target' => '_blank'],
                    ['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank'],
                    ['label' => 'MULTI LEVEL EXAMPLE', 'header' => true],
                    ['label' => 'Level1'],
                    [
                        'label' => 'Level1',
                        'items' => [
                            ['label' => 'Level2', 'iconStyle' => 'far'],
                            [
                                'label' => 'Level2',
                                'iconStyle' => 'far',
                                'items' => [
                                    ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle'],
                                    ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle'],
                                    ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle']
                                ]
                            ],
                            ['label' => 'Level2', 'iconStyle' => 'far']
                        ]
                    ],
                    ['label' => 'Level1'],
                    ['label' => 'LABELS', 'header' => true],
                    ['label' => 'Important', 'iconStyle' => 'far', 'iconClassAdded' => 'text-danger'],
                    ['label' => 'Warning', 'iconClass' => 'nav-icon far fa-circle text-warning'],
                    ['label' => 'Informational', 'iconStyle' => 'far', 'iconClassAdded' => 'text-info'],
                    */
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>