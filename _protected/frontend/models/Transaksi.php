<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transaksi".
 *
 * @property int $id_tr
 * @property string $tgl_tr
 * @property string $status
 * @property int $id_det_tr
 * @property int $id_peserta
 *
 * @property DtTransaksi $detTr
 * @property Peserta $peserta
 */
class Transaksi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaksi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tgl_tr', 'status', 'id_det_tr', 'id_peserta'], 'required'],
            [['tgl_tr'], 'safe'],
            [['status'], 'string'],
            [['id_det_tr', 'id_peserta'], 'integer'],
            [['id_det_tr'], 'exist', 'skipOnError' => true, 'targetClass' => DtTransaksi::className(), 'targetAttribute' => ['id_det_tr' => 'id_det_tr']],
            [['id_peserta'], 'exist', 'skipOnError' => true, 'targetClass' => Peserta::className(), 'targetAttribute' => ['id_peserta' => 'id_peserta']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_tr' => 'Id Tr',
            'tgl_tr' => 'Tgl Tr',
            'status' => 'Status',
            'id_det_tr' => 'Id Det Tr',
            'id_peserta' => 'Id Peserta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetTr()
    {
        return $this->hasOne(DtTransaksi::className(), ['id_det_tr' => 'id_det_tr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeserta()
    {
        return $this->hasOne(Peserta::className(), ['id_peserta' => 'id_peserta']);
    }
}
