<?php
use yii\helpers\Url;

/** @var yii\web\View $this */

$this->title = 'Hoja de vida';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">
    <div class="p-0 mb-0 bg-transparent rounded-3">
        <div class="container-fluid py-0 text-center">
            <img class="rounded-3" src="..\assets\img\COLP_253782_e02a0.jpg" alt="imagen" width="250">
            <p class="mt-0 fs-5 fw-light">
                En esta seccion podras editar o modificar informacion personal.
            </p>
        </div>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Datos personales basicos</h2>

                <p>
                    En esta sección, puedes mantener tus datos personales actualizados para garantizar que los
                    empleadores tengan la información correcta sobre ti. Desde tu nombre y dirección hasta tu
                    información de contacto, es importante que estos detalles estén siempre al día para facilitar la
                    comunicación y el proceso de contratación.
                </p>

                <p>
                    <a class="btn btn-outline-secondary" href="<?= Url::to(['/micuenta/persona/update']) ?>/">
                        Actualizar &raquo;
                    </a>
                </p>
            </div>
            <div class="col-lg-4">
                <h2>Estudios</h2>
                <p>
                    Agrega nuevos estudios o actualiza los actuales para reflejar tu nivel de educación y formación
                    académica. Esta sección te permite destacar tus logros educativos y mostrar a los empleadores tu
                    compromiso con el aprendizaje y el desarrollo profesional.
                </p>

                <p>
                    <a class="btn btn-outline-secondary" href="<?= Url::to(['/hojavida/informacionestudio']) ?>/">
                        Actualizar &raquo;
                    </a>
                </p>
            </div>

            <div class="col-lg-4">
                <h2>Experiencia</h2>

                <p>
                    Aquí puedes agregar nuevas experiencias laborales o actualizar las existentes para demostrar tu
                    historial laboral y tus habilidades en acción. Cada experiencia puede ser una oportunidad para
                    resaltar tus responsabilidades, logros y contribuciones a los equipos y proyectos en los que has
                    trabajado.
                </p>

                <p>
                    <a class="btn btn-outline-secondary" href="https://www.yiiframework.com/extensions/">
                        Actualizar &raquo;
                    </a>
                </p>
            </div>

            <div class="col-lg-4">
                <h2>Habilidades</h2>

                <p>
                    Añadir habilidades relevantes puede mejorar tu perfil y hacerlo más atractivo para los empleadores.
                    Ya sea que se trate de habilidades técnicas específicas o habilidades blandas como la comunicación o
                    el trabajo en equipo, esta sección te permite resaltar tus fortalezas y competencias clave.
                </p>

                <p>
                    <a class="btn btn-outline-secondary" href="https://www.yiiframework.com/extensions/">
                        Actualizar &raquo;
                    </a>
                </p>
            </div>

            <div class="col-lg-4">
                <h2>Lenguajes</h2>

                <p>
                    Agregar los lenguajes que dominas puede ser un factor diferenciador en tu perfil. Ya sea que se
                    trate de lenguajes de programación, idiomas extranjeros o habilidades lingüísticas adicionales, esta
                    sección te permite demostrar tu capacidad para comunicarte y trabajar en entornos multiculturales.
                </p>

                <p>
                    <a class="btn btn-outline-secondary" href="https://www.yiiframework.com/extensions/">
                        Actualizar &raquo;
                    </a>
                </p>
            </div>


        </div>

    </div>
</div>