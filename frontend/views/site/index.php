<?php
use yii\helpers\Url;


/** @var yii\web\View $this */

$this->title = 'Mision empleo';
?>
<div class="site-index">
    <div class="p-1 mb-2 bg-transparent rounded-3">
        <div class="container-fluid py-1 text-center">
            <img class="rounded-circle" src="..\assets\img\COLP_253782_e02a0.jpg" alt="imagen" width="250">
            <h1 class="display-4">Bienvenido a Misión Empleo!</h1>
            <p class="fs-5 fw-light">
                El Sistema de Información para la gestión de empleo <strong>“Misión Empleo” </strong>, busca
                facilitar la inserción al mundo laboral, proporcionando una plataforma intuitiva y eficiente para la
                búsqueda y postulación a ofertas de empleo, así como para la gestión de perfiles profesionales, con el
                fin de impulsar su desarrollo y crecimiento profesional..
            </p>

            <p><a class="btn btn-lg btn-primary" href="<?= Url::to(['/hojavida']) ?>">Hoja de vida</a>
            </p>
        </div>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Postulaciones</h2>

                <p>
                    En Misión Empleo, te ofrecemos la oportunidad de postularte a diversas ofertas de empleo que se
                    ajusten a tu perfil y habilidades. Nuestra plataforma te permite explorar una amplia gama de
                    oportunidades laborales y presentar tu candidatura de manera rápida y sencilla. ¡Únete a nosotros y
                    da el primer paso hacia tu próximo desafío profesional!
                </p>

                <p><a class="btn btn-outline-info" href="https://www.yiiframework.com/doc/">Ver
                        &raquo;</a></p>

            </div>
            <div class="col-lg-4">
                <h2>Ofertas</h2>

                <p>
                    En Misión Empleo, trabajamos arduamente para brindarte acceso a las mejores oportunidades laborales
                    disponibles en el mercado. Nuestro objetivo es conectar a empleadores con talento como tú,
                    facilitando el proceso de búsqueda y aplicación de empleo. Explora nuestras ofertas y encuentra la
                    oportunidad perfecta para avanzar en tu carrera.
                </p>

                <p><a class="btn btn-outline-info" href="https://www.yiiframework.com/forum/">Ver&raquo;</a>
                </p>
            </div>
            <div class="col-lg-4">
                <h2>Adicional</h2>

                <p>
                    En Misión Empleo, nos preocupamos por tu desarrollo profesional y personal. Además de ofrecerte
                    acceso a ofertas de empleo, también proporcionamos recursos y herramientas adicionales para ayudarte
                    a alcanzar tus metas. Desde consejos de carrera hasta capacitaciones especializadas, estamos aquí
                    para apoyarte en cada paso del camino hacia el éxito laboral.
                </p>

                <p><a class="btn btn-outline-info" href="https://www.yiiframework.com/extensions/">Ver
                        &raquo;</a></p>
            </div>
        </div>

    </div>
</div>