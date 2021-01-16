<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dt_transaksi".
 *
 * @property int $id_det_tr
 * @property string $tgl
 * @property int $jml_org
 * @property string $wkt_cicil
 * @property string $status
 * @property int $id_ngr
 * @property int $id_bank_tjn
 * @property int $id_user
 *
 * @property Negara $ngr
 * @property BankTujuan $bankTjn
 * @property User $user
 */
class DtTransaksi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dt_transaksi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tgl'], 'safe'],
            [['jml_org', 'wkt_cicil', 'id_ngr', 'id_bank_tjn'], 'required'],
            ['id_user', 'default', 'value'=> Yii::$app->user->id],
            ['status', 'default', 'value'=> 'belum lunas'],
            [['jml_org', 'id_ngr', 'id_bank_tjn', 'id_user'], 'integer'],
            [['wkt_cicil', 'status'], 'string'],
            [['id_ngr'], 'exist', 'skipOnError' => true, 'targetClass' => Negara::className(), 'targetAttribute' => ['id_ngr' => 'id_ngr']],
            [['id_bank_tjn'], 'exist', 'skipOnError' => true, 'targetClass' => BankTujuan::className(), 'targetAttribute' => ['id_bank_tjn' => 'id_bank_tjn']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id_user']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_det_tr' => 'Id Det Tr',
            'tgl' => 'Tgl',
            'jml_org' => 'Jumlah Orang',
            'wkt_cicil' => 'Waktu Cicil',
            'status' => 'Status',
            'id_ngr' => 'Negara',
            'id_bank_tjn' => 'Bank Tujuan',
            'id_user' => 'Id User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNgr()
    {
        return $this->hasOne(Negara::className(), ['id_ngr' => 'id_ngr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBankTjn()
    {
        return $this->hasOne(BankTujuan::className(), ['id_bank_tjn' => 'id_bank_tjn']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id_user' => 'id_user']);
    }
}
