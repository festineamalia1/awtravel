<?php
namespace backend\controllers;

use Yii;
use Mpdf\Mpdf;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\LoginForm;
use yii\db\Query;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                     [
                    'allow' => true,
                    'roles' => ['@'],
                ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
      

         $iti = (new Query());
        $iti ->select(['itinerary.hari', 'itinerary.kunjungan', 'itinerary.biaya', 'negara.name'])
        ->FROM('negara')
        ->leftJoin('itinerary','negara.id_ngr=itinerary.id_ngr')
        //->groupBy(['itinerary.id_ngr'])
        ->limit(6);

        $command = $iti->createCommand();
        $iti = $command->queryAll();

         $ngr = (new Query());
        $ngr ->select(['negara.name'])
        ->FROM('negara')
        ->leftJoin('itinerary','negara.id_ngr=itinerary.id_ngr')
       // ->andWhere('itinerary.id_iti=:id_a', array(':id_a'=>1))
        ->groupBy(['itinerary.id_ngr'])
        ->limit(6);

        $command = $ngr->createCommand();
        $ngr = $command->queryAll();

         $ngr2 = (new Query());
        $ngr2 ->select(['negara.id_ngr','negara.name','negara.wtk_berangkat','wkt_plg'])
        ->FROM('negara')
        ->limit(6);

        $command = $ngr2->createCommand();
        $ngr2 = $command->queryAll();

		$ngr3 = (new Query());
        $ngr3 ->select(['user.nama', "sum(transfer.besar) AS totf",'negara.biaya','negara.dp','dt_transaksi.status','negara.name','negara.wtk_berangkat','negara.wkt_plg'])
        ->FROM('user')
        ->leftJoin('dt_transaksi','user.id_user=dt_transaksi.id_user')
        ->leftJoin('transfer','user.id_user=transfer.id_user')
        ->leftJoin('negara','dt_transaksi.id_ngr=negara.id_ngr')
        ->andWhere('user.id_level=:id_a', array(':id_a'=>5))
       
        ->limit(6);

        $command = $ngr3->createCommand();
        $ngr3 = $command->queryAll();
		
        return $this->render('index', [
            
            'iti' => $iti,
            'ngr' => $ngr,
            'ngr2' => $ngr2,
            'ngr3' => $ngr3,
        ]);
    }

    

    public function actionLaporanpdf(){

        $ngr3 = (new Query());
        $ngr3 ->select(['user.nama', "sum(transfer.besar) AS totf",'negara.biaya','negara.dp','dt_transaksi.status','negara.name','negara.wtk_berangkat','negara.wkt_plg'])
        ->FROM('user')
        ->leftJoin('dt_transaksi','user.id_user=dt_transaksi.id_user')
        ->leftJoin('transfer','user.id_user=transfer.id_user')
        ->leftJoin('negara','dt_transaksi.id_ngr=negara.id_ngr')
        ->andWhere('user.id_level=:id_a', array(':id_a'=>5))
       
        ->limit(6);

        $command = $ngr3->createCommand();
        $ngr3 = $command->queryAll();

        $mpdf=new mPDF(['orientation' => 'L']);
        $mpdf->WriteHTML($this->renderPartial('printlaporan',[
            'ngr3' => $ngr3,
        ]));
        $mpdf->Output();
        exit;
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
