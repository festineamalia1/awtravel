<?php

namespace frontend\controllers;

use Yii;
use Mpdf\Mpdf;
use app\models\TfLunas;
use app\models\TfLunasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use app\models\BankTujuan;
use yii\helpers\ArrayHelper;
use yii\validators\FileValidator;
use yii\web\UploadedFile;


/**
 * TfLunasController implements the CRUD actions for TfLunas model.
 */
class TfLunasController extends Controller
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
     * Lists all TfLunas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TfLunasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TfLunas model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id){
        $cash = (new Query());
        $cash ->select([ 'tf_lunas.cashback'])
        ->FROM('tf_lunas')
        ->andWhere('tf_lunas.id_tf_lunas=:id_a', array(':id_a'=>$id))
        ->limit(6);
        $command = $cash->createCommand();
        $cash = $command->queryAll(); 
        $dis = (new Query());
        $dis ->select([ 'tf_lunas.status'])
        ->FROM('tf_lunas')
        ->andWhere('tf_lunas.id_tf_lunas=:id_a', array(':id_a'=>$id))
        ->limit(6);
        $command = $dis->createCommand();
        $dis = $command->queryAll();
        $tot = (new Query());
        $tot ->select([ 'negara.biaya','dt_transaksi.jml_org','tf_lunas.cashback', 'tf_lunas.status'])
        ->FROM('tf_lunas')
        ->leftJoin('user','tf_lunas.id_user=user.id_user')
        ->leftJoin('dt_transaksi','user.id_user=dt_transaksi.id_user')
        ->leftJoin('negara','dt_transaksi.id_ngr=negara.id_ngr')
        ->andWhere('tf_lunas.id_tf_lunas=:id_a', array(':id_a'=>$id))
        ->limit(6);  
         $command = $tot->createCommand();
        $tot = $command->queryAll();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'dis' => $dis,
            'cash' => $cash,
            'tot' => $tot,]);}
 

        public function actionPdf(){
			$negara = (new Query());
			$negara ->select(['negara.name','negara.biaya','negara.dp', 'dt_transaksi.jml_org'])
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
			$tot ->select([ 'negara.biaya','dt_transaksi.jml_org'])
			->FROM('tf_lunas')
			->leftJoin('user','tf_lunas.id_user=user.id_user')
			->leftJoin('dt_transaksi','user.id_user=dt_transaksi.id_user')
			->leftJoin('negara','dt_transaksi.id_ngr=negara.id_ngr')
			->andWhere('tf_lunas.id_user=:id_a', array(':id_a'=>Yii::$app->user->id))
			->limit(6);  
			$command = $tot->createCommand();
			$tot = $command->queryAll();
			$total = (new Query());
			$total ->select([ 'negara.biaya','dt_transaksi.jml_org'])
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
			exit;}

     public function actionPdf2(){
        $mou = (new Query());
        $mou ->select([ 'mou.*'])
        ->FROM('mou')
        ->limit(6);
        $command = $mou->createCommand();
        $mou = $command->queryAll();
        $pst = (new Query());
        $pst ->select([ 'user.nama', 'user.alamat'])
        ->FROM('user')
        ->andWhere('user.id_user=:id_a', array(':id_a'=>Yii::$app->user->id))
        ->limit(6);
        $command = $pst->createCommand();
        $pst = $command->queryAll(); 
        $pst2 = (new Query());
        $pst2 ->select([ 'user.nama', 'user.alamat'])
        ->FROM('user')
        ->andWhere('user.id_user=:id_a', array(':id_a'=>Yii::$app->user->id))
        ->limit(6);
        $command = $pst2->createCommand();
        $pst2 = $command->queryAll();
        $mpdf=new mPDF();
        $mpdf->WriteHTML($this->renderPartial('mpdf_view2',[
        'mou' => $mou,
        'pst' => $pst,
        'pst2' => $pst2,
        ]));
        $mpdf->Output();
        exit;}
 
    /**
     * Creates a new TfLunas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate(){
        $model = new TfLunas();

       /* if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_tf_lunas]);
        }*/

         if ($model->load(Yii::$app->request->post())) {
            $foto_lunas = UploadedFile::getInstance($model, 'foto_lunas');

            $model->ft_lunas = $foto_lunas->name;

            $model->save();

            
            $foto_lunas->saveAs(Yii::getAlias('@backend/img/lunas/'). $foto_lunas->name);

            return $this->redirect(['view', 'id' => $model->id_tf_lunas]);
        }

        $bank = BankTujuan::find()->all();
		$bank = ArrayHelper::map($bank,'id_bank_tjn','nm_bank');

        return $this->render('create', [
            'model' => $model,
             'bank' => $bank,
        ]);}

    /**
     * Updates an existing TfLunas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_tf_lunas]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TfLunas model.
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
     * Finds the TfLunas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TfLunas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TfLunas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
