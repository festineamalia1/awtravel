<?php

namespace frontend\controllers;

use Yii;
use Mpdf\Mpdf;
use app\models\Transfer;
use app\models\TransferSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use app\models\BankTujuan;
use yii\helpers\ArrayHelper;
use yii\validators\FileValidator;
use yii\web\UploadedFile;

/**
 * TransferController implements the CRUD actions for Transfer model.
 */
class TransferController extends Controller
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
     * Lists all Transfer models.
     * @return mixed
     */

    public function actionPdf(){
            $negara = (new Query());
            $negara ->select(['negara.name','negara.dp', 'dt_transaksi.jml_org'])
            ->FROM('dt_transaksi')
            ->leftJoin('negara','dt_transaksi.id_ngr=negara.id_ngr')
            ->andWhere('dt_transaksi.id_user=:id_a', array(':id_a'=>Yii::$app->user->id))
            ->limit(6);
            $command = $negara->createCommand();
            $negara = $command->queryAll();

            $nama = (new Query());
            $nama ->select([ 'nama'])
            ->FROM('user')
            ->andWhere('id_user=:id_a', array(':id_a'=>Yii::$app->user->id))
            ->limit(6);
            $command = $nama->createCommand();
            $nama = $command->queryAll(); 

            $tot = (new Query());
            $tot ->select([ 'negara.dp','dt_transaksi.jml_org'])
            ->FROM('tf_lunas')
            ->leftJoin('user','tf_lunas.id_user=user.id_user')
            ->leftJoin('dt_transaksi','user.id_user=dt_transaksi.id_user')
            ->leftJoin('negara','dt_transaksi.id_ngr=negara.id_ngr')
            ->andWhere('tf_lunas.id_user=:id_a', array(':id_a'=>Yii::$app->user->id))
            ->limit(6);  
            $command = $tot->createCommand();
            $tot = $command->queryAll();

            $total = (new Query());
            $total ->select([ 'negara.dp','dt_transaksi.jml_org'])
            ->FROM('tf_lunas')
            ->leftJoin('user','tf_lunas.id_user=user.id_user')
            ->leftJoin('dt_transaksi','user.id_user=dt_transaksi.id_user')
            ->leftJoin('negara','dt_transaksi.id_ngr=negara.id_ngr')
            ->andWhere('tf_lunas.id_user=:id_a', array(':id_a'=>Yii::$app->user->id))
            ->limit(6);  
            $command = $total->createCommand();
            $total = $command->queryAll();

            $cicil = (new Query());
            $cicil ->select([ 'transfer.cicilan_ke','transfer.besar'])
            ->FROM('transfer')
            ->andWhere('transfer.id_user=:id_a', array(':id_a'=>Yii::$app->user->id))
            ->limit(6);  
            $command = $cicil->createCommand();
            $cicil = $command->queryAll();

            $tcicil = (new Query());
            $tcicil ->select([ "sum(transfer.besar) AS totf"])
            ->FROM('transfer')
            ->andWhere('transfer.id_user=:id_a', array(':id_a'=>Yii::$app->user->id))
            ->limit(6);  
            $command = $tcicil->createCommand();
            $tcicil = $command->queryAll();          

            $banktjn = (new Query());
            $banktjn ->select(['bank_tujuan.nm_bank','bank_tujuan.nomor_rek', 'bank_tujuan.nama_rek'])
            ->FROM('dt_transaksi')
            ->leftJoin('bank_tujuan','bank_tujuan.id_bank_tjn=dt_transaksi.id_bank_tjn')
            ->andWhere('dt_transaksi.id_user=:id_a', array(':id_a'=>Yii::$app->user->id))
            ->limit(6);
            $command = $banktjn->createCommand();
            $banktjn = $command->queryAll();

            $mpdf=new mPDF();
            $mpdf->WriteHTML($this->renderPartial('mpdf_view',[
            'cicil' => $cicil,
            'tcicil' => $tcicil,
            'nama' => $nama,
            'tot' => $tot,
            'banktjn' => $banktjn,
            'negara' => $negara,
            'total' => $total,]));
            $mpdf->Output();
            exit;
        }
    public function actionTab()
    {
     

        return $this->render('tab');
    }
    public function actionIndex()
    {
        $searchModel = new TransferSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Transfer model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id){
        $data = (new Query());
        $data ->select([ 'transfer.*'])
        ->FROM('transfer')
        ->andWhere('transfer.id_user=:id_a', array(':id_a'=>Yii::$app->user->id))
        ->limit(6);
        $command = $data->createCommand();
        $data = $command->queryAll();
        $status = (new Query());
        $status ->select([ 'dt_transaksi.status'])
        ->FROM('dt_transaksi')
        ->andWhere('dt_transaksi.id_user=:id_a', array(':id_a'=>Yii::$app->user->id))
        ->limit(6);
        $command = $status->createCommand();
        $status = $command->queryAll();

         $tot = (new Query());
        $tot ->select([ 'negara.biaya','negara.dp','dt_transaksi.jml_org','dt_transaksi.status','sum(transfer.besar) AS total'])
        ->FROM('dt_transaksi')
        ->leftJoin('negara','dt_transaksi.id_ngr=negara.id_ngr')
         ->leftJoin('user','dt_transaksi.id_user=user.id_user')
        ->leftJoin('transfer','user.id_user=transfer.id_user')
        ->andWhere('dt_transaksi.id_user=:id_a', array(':id_a'=>Yii::$app->user->id))
        ->limit(6);  
        $command = $tot->createCommand();
        $tot = $command->queryAll();

         $tot2 = (new Query());
        $tot2 ->select([ 'negara.biaya','negara.dp','dt_transaksi.jml_org'])
        ->FROM('dt_transaksi')
        ->leftJoin('negara','dt_transaksi.id_ngr=negara.id_ngr')
        ->andWhere('dt_transaksi.id_user=:id_a', array(':id_a'=>Yii::$app->user->id))
        ->limit(6);  
        $command = $tot2->createCommand();
        $tot2 = $command->queryAll();

        $totci = (new Query());
        $totci ->select([ "sum(transfer.besar) AS total"])
        ->FROM('transfer')
        ->andWhere('transfer.id_user=:id_a', array(':id_a'=>Yii::$app->user->id))
        ->limit(6);
        $command = $totci->createCommand();
        $totci = $command->queryAll();

         $totci2 = (new Query());
        $totci2 ->select([ "sum(transfer.besar) AS total2"])
        ->FROM('transfer')
        ->andWhere('transfer.id_user=:id_a', array(':id_a'=>Yii::$app->user->id))
        ->limit(6);
        $command = $totci2->createCommand();
        $totci2 = $command->queryAll();

        $totdp = (new Query());
        $totdp ->select([ 'negara.biaya','negara.dp','dt_transaksi.jml_org', 'tf_dp.status'])
        ->FROM('tf_dp')
        ->leftJoin('user','tf_dp.id_user=user.id_user')
        ->leftJoin('dt_transaksi','user.id_user=dt_transaksi.id_user')
        ->leftJoin('negara','dt_transaksi.id_ngr=negara.id_ngr')
        ->andWhere('tf_dp.id_user=:id_a', array(':id_a'=>Yii::$app->user->id))
        ->limit(6);  

        $command = $totdp->createCommand();
        $totdp = $command->queryAll();

        return $this->render('view', [
            'model' => $this->findModel($id),
            'data' => $data,
            'status' => $status,
            'tot' => $tot,
            'tot2' => $tot2,
            'totdp' => $totdp,
            'totci' => $totci,
            'totci2' => $totci2,
        ]);}

    /**
     * Creates a new Transfer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate(){
        $model = new Transfer();
            if ($model->load(Yii::$app->request->post())) {
            $foto_trans = UploadedFile::getInstance($model, 'foto_trans');
            $model->ft_trans = $foto_trans->name;
            $model->save();
            $foto_trans->saveAs(Yii::getAlias('@backend/img/transfer/'). $foto_trans->name);
            return $this->redirect(['view', 'id' => $model->id_transfer]);
        }
        $bank = BankTujuan::find()->all();
        $bank = ArrayHelper::map($bank,'id_bank_tjn','nm_bank');

        return $this->render('create', [
            'model' => $model,
            'bank' => $bank,]);}

    /**
     * Updates an existing Transfer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_transfer]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Transfer model.
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
     * Finds the Transfer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Transfer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Transfer::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
