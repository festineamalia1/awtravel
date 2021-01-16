<?php

namespace frontend\controllers;

use Yii;
use app\models\DtTransaksi;
use app\models\DtTransaksiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Negara;
use app\models\BankTujuan;
use yii\helpers\ArrayHelper;
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
   public function actionView($id){
        $data = (new Query());
		$data ->select(['negara.biaya','negara.dp', 'dt_transaksi.jml_org'])
        ->FROM('dt_transaksi')
        ->leftJoin('negara','dt_transaksi.id_ngr=negara.id_ngr')
        ->andWhere('dt_transaksi.id_det_tr=:id_a', array(':id_a'=>$id))
        ->limit(6);

		$command = $data->createCommand();
		$data = $command->queryAll();

		$banktjn = (new Query());
		$banktjn ->select(['bank_tujuan.nm_bank','bank_tujuan.nomor_rek', 'bank_tujuan.nama_rek'])
        ->FROM('dt_transaksi')
        ->leftJoin('bank_tujuan','bank_tujuan.id_bank_tjn=dt_transaksi.id_bank_tjn')
        ->andWhere('dt_transaksi.id_det_tr=:id_a', array(':id_a'=>$id))
        ->limit(6);

		$command = $banktjn->createCommand();
		$banktjn = $command->queryAll();

		$cicil = (new Query());
		$cicil ->select([ 'dt_transaksi.wkt_cicil'])
        ->FROM('dt_transaksi') 
        ->andWhere('dt_transaksi.id_det_tr=:id_a', array(':id_a'=>$id))
        ->limit(6);

		$command = $cicil->createCommand();
		$cicil = $command->queryAll();

        return $this->render('view', [
            'model' => $this->findModel($id),
            'data' => $data,
            'banktjn' => $banktjn,
            'cicil' => $cicil,]);}

    /**
     * Creates a new DtTransaksi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DtTransaksi();
        //$model->setDefaultValues();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_det_tr]);
        }

        $ngr = Negara::find()->all();
        $ngr = ArrayHelper::map($ngr,'id_ngr','name');

        $bank = BankTujuan::find()->all();
        $bank = ArrayHelper::map($bank,'id_bank_tjn','nm_bank');

        return $this->render('create', [
            'model' => $model,
             'ngr' => $ngr,
            'bank' => $bank,
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
