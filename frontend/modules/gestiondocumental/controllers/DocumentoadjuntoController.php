<?php

namespace frontend\modules\gestiondocumental\controllers;

use Yii;
use frontend\models\Documentoadjunto;
use frontend\models\search\DocumentoadjuntoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * DocumentoadjuntoController implements the CRUD actions for Documentoadjunto model.
 */
class DocumentoadjuntoController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Documentoadjunto models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DocumentoadjuntoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Documentoadjunto model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $ruta = Yii::$app->params['domainName'] . $model->path_server . $model->web_filename;

        return $this->redirect($ruta);
    }

    /**
     * Creates a new Documentoadjunto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($idproyecto, $identidad, $modulo)
    {
        $model = new Documentoadjunto();
        $model->codigoModulo = $modulo;
        $model->idEntidad = $identidad;
        $model->idProyecto = $idproyecto;

        $barra = '\\';
        if (PHP_OS == 'Linux') {
            $barra = '//';
            $ruta_SO = \Yii::$app->params['rutadctos_LINUX'] . $barra;
        } else {
            $ruta_SO = \Yii::$app->params['rutadctos_WIN'] . $barra;
        }

        $ruta_documentos = $modulo . $barra;
        $ruta = $ruta_SO . $barra . $ruta_documentos;

        $modelentidad = Documentoadjunto::dataEntidad($modulo, $identidad);

        //Valida Directorio Asociado
        if (!file_exists($ruta)) {
            mkdir($ruta, 0777, true);
        }

        $model->tags = $modelentidad->codigo . ' - ' . $modelentidad->descripcion;

        $model->src_filename = 'nombre_archivo_fuente';
        $model->path_filename = $ruta_SO;
        $model->path_server = $ruta_documentos;
        $model->web_filename = $modelentidad->codigo;

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                $tipodocumento = $model->tipodocumentoadjunto->titulo;
                $image = UploadedFile::getInstance($model, 'image');

                if (!is_null($image)) {
                    $model->src_filename = $image->name;

                    $tmp = explode('.', $image->name);
                    $ext = end($tmp);

                    $model->extension = $ext;
                    $model->web_filename = $model->web_filename . '_' . $tipodocumento . ".{$ext}";

                    $path = $ruta_SO . $ruta_documentos . $model->web_filename;
                    try {
                        $image->saveAs($path);
                    } catch (\Exception $e) {
                        var_dump($e->getMessage());
                        die("Error ....");
                    }
                }

                $model->path_server = str_replace('\\', '/', $model->path_server);

                if ($model->save()) {
                    Yii::$app->session->setFlash('success', 'Registro Actualizado con Éxito');

                    switch ($model->codigoModulo) {
                        case 'Persona':
                            return $this->redirect(['/micuenta/persona/view']);
                            break;
                        case 'Informacionestudio':
                            return $this->redirect([
                                '/hojavida/informacionestudio/view',
                                'id' => $model->idEntidad
                            ]);
                            break;
                    }

                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'modelentidad' => $modelentidad,
            'modulo' => $modulo
        ]);
    }

    /**
     * Updates an existing Documentoadjunto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Documentoadjunto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Documentoadjunto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Documentoadjunto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Documentoadjunto::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
