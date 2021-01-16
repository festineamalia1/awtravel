<?php

namespace backend\controllers;

use Yii;
use app\models\Negara;
use app\models\NegaraSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * NegaraController implements the CRUD actions for Negara model.
 */
class NegaraController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Negara models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NegaraSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Negara model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Negara model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Negara();


         if ($model->load(Yii::$app->request->post())) {
            $foto_ut = UploadedFile::getInstance($model, 'foto_ut');

            $model->ft_utama = $foto_ut->name;

            $model->save();

            $foto_ut->saveAs(Yii::$app->basePath.'/img/'. $foto_ut->name);

            return $this->redirect(['view', 'id' => $model->id_ngr]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Negara model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

       if ($model->load(Yii::$app->request->post()) && $model->save()) {

           
            return $this->redirect(['view', 'id' => $model->id_ngr]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Negara model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        unlink(Yii::$app->basePath.'/img/'. $model->ft_utama);
        return $this->redirect(['index']);}

    /**
     * Finds the Negara model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Negara the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Negara::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
