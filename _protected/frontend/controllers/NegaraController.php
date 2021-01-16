<?php

namespace frontend\controllers;

use Yii;
use app\models\Negara;
use app\models\NegaraSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\db\Query;

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
public function actionMenu(){
       

        return $this->render('menu');}

    public function actionIndex(){
        $searchModel = new NegaraSearch();
        $q = $searchModel->search(Yii::$app->request->queryParams);
        $count = $q->count();
         $pagination = new Pagination(['totalCount' => $count,'pageSize'=>3]);
        $model = $q->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();

        $data = (new Query());
        $data ->select(['foto.ft','foto.name'])
        ->FROM('negara')
        ->leftJoin('foto','negara.id_ngr=foto.id_ngr')
        ->limit(6);

        $command = $data->createCommand();
        $data = $command->queryAll();

         $lunas = (new Query());
        $lunas ->select([ 'tf_lunas.id_tf_lunas'])
        ->FROM('tf_lunas')
       ->andWhere('tf_lunas.id_user=:id_a', array(':id_a'=>Yii::$app->user->id))
        ->limit(6);
        $command = $lunas->createCommand();
        $lunas = $command->queryAll(); 

        return $this->render('index', [
            'searchModel' => $searchModel,
            'model' => $model,
            'pagination' => $pagination,
            'data' => $data,
            'lunas' => $lunas,
        ]);}

    /**
     * Displays a single Negara model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id){
        $data = (new Query());
        $data ->select(['foto.ft','foto.name'])
        ->FROM('negara')
        ->leftJoin('foto','negara.id_ngr=foto.id_ngr')
        ->andWhere('foto.id_ngr=:id_a', array(':id_a'=>$id))
        ->limit(6);
        $command = $data->createCommand();
        $data = $command->queryAll();

        $day = (new Query());
        $day ->select(['itinerary.hari', 'itinerary.kunjungan'])
        ->FROM('negara')
        ->leftJoin('itinerary','negara.id_ngr=itinerary.id_ngr')
        ->andWhere('itinerary.id_ngr=:id_a', array(':id_a'=>$id))
        ->limit(6);
        $command = $day->createCommand();
        $day = $command->queryAll();

        

        return $this->render('view', [
            'model' => $this->findModel($id),
            'data'=>$data,
            'day'=>$day,]);
    }

    /**
     * Creates a new Negara model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Negara();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
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
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

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
