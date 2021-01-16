<?php

namespace frontend\controllers;

use Yii;
use app\models\TfDp;
use app\models\TfDpSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\BankTujuan;
use yii\helpers\ArrayHelper;
use yii\validators\FileValidator;
use yii\web\UploadedFile;
use yii\db\Query;
use Mpdf\Mpdf;

/**
 * TfDpController implements the CRUD actions for TfDp model.
 */
class TfDpController extends Controller
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
     * Lists all TfDp models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TfDpSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
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
            'nama' => $nama,
            'tot' => $tot,
            'banktjn' => $banktjn,
            'negara' => $negara,
            'total' => $total,]));
            $mpdf->Output();
            exit;
        }
    /**
     * Displays a single TfDp model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $dis = (new Query());
        $dis ->select([ 'tf_dp.status'])
        ->FROM('tf_dp')
        ->andWhere('tf_dp.id_tfdp=:id_a', array(':id_a'=>$id))
        ->limit(6);
        $command = $dis->createCommand();
        $dis = $command->queryAll();

        $tot = (new Query());
        $tot ->select([ 'negara.biaya','negara.dp','dt_transaksi.jml_org', 'tf_dp.status'])
        ->FROM('tf_dp')
        ->leftJoin('user','tf_dp.id_user=user.id_user')
        ->leftJoin('dt_transaksi','user.id_user=dt_transaksi.id_user')
        ->leftJoin('negara','dt_transaksi.id_ngr=negara.id_ngr')
        ->andWhere('tf_dp.id_user=:id_a', array(':id_a'=>Yii::$app->user->id))
        ->limit(6);  

        $command = $tot->createCommand();
        $tot = $command->queryAll();
        return $this->render('view', [
            'model' => $this->findModel($id),
             'dis' => $dis,
            'tot' => $tot,
        ]);}

    /**
     * Creates a new TfDp model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TfDp();
         if ($model->load(Yii::$app->request->post())) {
            $foto_dp = UploadedFile::getInstance($model, 'foto_dp');

            $model->ft_dp = $foto_dp->name;

            $model->save();

            
            $foto_dp->saveAs(Yii::getAlias('@backend/img/DP/'). $foto_dp->name);

             return $this->redirect(['view', 'id' => $model->id_tfdp]);
        }
        $bank = BankTujuan::find()->all();
        $bank = ArrayHelper::map($bank,'id_bank_tjn','nm_bank');

        return $this->render('create', [
            'model' => $model,
             'bank' => $bank,
        ]);
    }

    /**
     * Updates an existing TfDp model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_tfdp]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TfDp model.
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
     * Finds the TfDp model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TfDp the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TfDp::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
