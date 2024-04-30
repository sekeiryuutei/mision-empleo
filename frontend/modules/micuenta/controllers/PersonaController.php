<?php

namespace frontend\modules\micuenta\controllers;

use frontend\models\Informacionestudio;
use frontend\models\Informacionlaboral;
use Yii;
use common\models\Persona;
use common\models\search\PersonaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;

use mdm\admin\models\User;
use frontend\models\search\DocumentoadjuntoSearch;
use frontend\models\Informacionmilitar;

/**
 * PersonaController implements the CRUD actions for Persona model.
 */
class PersonaController extends Controller
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
     * Lists all Persona models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $username = Yii::$app->user->identity->username;

        $model = Persona::findOne(['username' => $username]);

        if ($model) {
            $searchModel = new PersonaSearch();
            $dataProvider = $searchModel->search($this->request->queryParams, $model->id);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Displays a single Persona model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView()
    {
        $username = Yii::$app->user->identity->username;

        $model = Persona::findOne(['username' => $username]);

        $idproyecto = 1;
        $identidad = $model->id;
        $modulo = 'Persona';

        $searchModel = new DocumentoadjuntoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams, $idproyecto, $identidad, $modulo);

        return $this->render('view', [
            'model' => $this->findModel($model->id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Persona model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Persona();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionSignup()
    {
        $model = new Persona();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                if ($model->validate()) {

                    $idgradomilitar = $model->idGradoMilitar;
                    $ultimaunidad = $model->ultimaUnidad;

                    $user = $model->signup();
                    if ($user) {

                        $ok = Yii::$app->getUser()->login($user, 0);
                        $model->save();

                        $modelmilitar = Informacionmilitar::findOne(['idPersona' => $model->id]);
                        if ($modelmilitar == null) {
                            $modelmilitar = new Informacionmilitar();
                            $modelmilitar->idPersona = $model->id;
                        }
                        $modelmilitar->idGradoMilitar = $idgradomilitar;
                        $modelmilitar->ultimaUnidad = $ultimaunidad;
                        $modelmilitar->save();
                    }
                    return $this->redirect(['view']);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('_form_signup', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Persona model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate()
    {
        $username = Yii::$app->user->identity->username;

        $model = Persona::findOne(['username' => $username]);

        $model->password = "12345678";
        $model->retypePassword = "12345678";

        $modelmilitar = Informacionmilitar::findOne(['idPersona' => $model->id]);
        if ($modelmilitar != null) {
            $model->idGradoMilitar = $modelmilitar->idGradoMilitar;
            $model->ultimaUnidad = $modelmilitar->ultimaUnidad;
        }

        if ($this->request->isPost && $model->load($this->request->post())) {

            $idgradomilitar = $model->idGradoMilitar;
            $ultimaunidad = $model->ultimaUnidad;
            $model->save();

            $modelmilitar = Informacionmilitar::findOne(['idPersona' => $model->id]);
            if ($modelmilitar == null) {
                $modelmilitar = new Informacionmilitar();
                $modelmilitar->idPersona = $model->id;
            }
            $modelmilitar->idGradoMilitar = $idgradomilitar;
            $modelmilitar->ultimaUnidad = $ultimaunidad;
            $modelmilitar->save();

            return $this->redirect(['view']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Persona model.
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
     * Finds the Persona model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Persona the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Persona::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionGenerarPdf($id)
    {
        $model = Persona::findOne(['id' => $id]); // Asegúrate de tener esta función en tu controlador para encontrar el modelo por su ID.

        $searchModel = new DocumentoadjuntoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, 1, $model->id, 'Persona');

        // Buscar información laboral del usuario
        $informacionLaboralModel = Informacionlaboral::findAll(['idPersona' => $model->id]);

        // Buscar información de estudio del usuario
        $informacionEstudioModel = Informacionestudio::findAll(['idPersona' => $model->id]);


        $content = $this->renderPartial('print', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'informacionLaboralModel' => $informacionLaboralModel,
            'informacionEstudioModel' => $informacionEstudioModel,
        ]);

        $pdf = new Pdf([
            'content' => $content,
            'options' => [
                'title' => 'Hoja de vida-' . $model->primerNombre, // Título del documento PDF
            ],
        ]);

        return $pdf->render();
        // return   $this->render('print', [
        //     'model' => $model,
        //     'searchModel' => $searchModel,
        //     'dataProvider' => $dataProvider,
        //     'informacionLaboralModel' => $informacionLaboralModel,
        //     'informacionEstudioModel' => $informacionEstudioModel,
        // ]);
    }

}
