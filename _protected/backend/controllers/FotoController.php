<?php

namespace backend\controllers;

use Yii;
use app\models\Foto;
use app\models\FotoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * FotoController implements the CRUD actions for Foto model.
 */
class FotoController extends Controller
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
     * Lists all Foto models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FotoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Foto model.
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
     * Creates a new Foto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Foto();

        if ($model->load(Yii::$app->request->post())) {
            $foto = UploadedFile::getInstance($model, 'foto');

            $model->ft = $foto->name;

            $model->save();

            
            $foto->saveAs(Yii::$app->basePath.'/img/'. $foto->name);

            return $this->redirect(['view', 'id' => $model->id_foto]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Foto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $oldft = $model->ft;
            if($oldft != ""){
                //unlink(Yii::$app->basePath.'/img/' . $oldft);
                unlink(Yii::$app->basePath.'/img/' . $oldft);
            } 

           $foto = UploadedFile::getInstance($model, 'foto');

            $model->ft = $foto->name;

            $model->save();

            //$foto->saveAs(Yii::$app->basePath . '/img/' . $foto->name);
             $foto->saveAs(Yii::$app->basePath.'/img/' . $foto->name);

            return $this->redirect(['view', 'id' => $model->id_foto]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Foto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        //unlink(Yii::$app->basePath.'/img/' . $model->ft);
        unlink(Yii::$app->basePath.'/img/'. $model->ft);
// $foto->saveAs(Yii::getAlias ('@frontend/img/') . $foto->name);
        $model->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Foto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Foto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Foto::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
