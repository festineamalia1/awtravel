<?php

namespace backend\controllers;

use Yii;
use app\models\DtTransaksi;
use app\models\DtTransaksiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Pusher\Pusher;
use yii\db\Query;

/**
 * DtTransaksiController implements the CRUD actions for DtTransaksi model.
 */
class DtTransaksiController extends Controller
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
     * Lists all DtTransaksi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DtTransaksiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DtTransaksi model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
           $dis = (new Query());
        $dis ->select([ 'dt_transaksi.status'])
        ->FROM('dt_transaksi')
        ->andWhere('dt_transaksi.id_det_tr=:id_a', array(':id_a'=>$id))
        ->limit(6);
        $command = $dis->createCommand();
        $dis = $command->queryAll();

        return $this->render('view', [
            'model' => $this->findModel($id),
            'dis' => $dis,
        ]);
    }

     public function actionPush(){  
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true);
        $pusher = new Pusher(
            'f5878d67d87c61bdfc03',
            '078b6cddcc4b2ada7240',
            '750509',
            $options);
        $data['message'] = 'Pembayaran Paket wisata anda telah dinyatakan lunas';
    /*if (isset($_POST['submit'])) {
            $data = array();
            $data['user'] =  $_POST['nama'];
            $data['message'] = $_POST['message'];
        
       
        }*/
        $pusher->trigger('my-channel', 'my-event', $data);
       //return $this->redirect('push');
        return $this->redirect(['index']);
    }

     public function actionPush2(){  


        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true);
        $pusher = new Pusher(
            'f5878d67d87c61bdfc03',
            '078b6cddcc4b2ada7240',
            '750509',
            $options);

        //$data['title'] = 'pemberithauan';
        $data['message'] = 'Maaf pembayaran paket wisata anda belum dinyatakan lunas';
    /*if (isset($_POST['submit'])) {
            $data = array();
            $data['user'] =  $_POST['nama'];
            $data['message'] = $_POST['message'];
        
       
        }*/
        $pusher->trigger('my-channel', 'my-event', $data);
        return $this->redirect(['index']);       
    }

    /**
     * Creates a new DtTransaksi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DtTransaksi();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_det_tr]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing DtTransaksi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_det_tr]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing DtTransaksi model.
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
     * Finds the DtTransaksi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DtTransaksi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DtTransaksi::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
