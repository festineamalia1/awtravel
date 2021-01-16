<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "negara".
 *
 * @property int $id_ngr
 * @property string $name
 * @property int $slot_awal
 * @property int $slot_max
 * @property string $wtk_berangkat
 * @property string $wkt_plg
 * @property string $deskripsi
 * @property string $musim
 * @property int $biaya
 * @property string $ft_utama
 * @property string $include
 * @property string $exclude
 * @property int $dp
 * @property int $id_iti
 *
 * @property DtTransaksi[] $dtTransaksis
 * @property Foto[] $fotos
 * @property Itinerary[] $itineraries
 */
class Negara extends \yii\db\ActiveRecord
{
    public $foto_ut;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'negara';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'slot_awal', 'slot_max', 'wtk_berangkat', 'wkt_plg', 'deskripsi', 'musim', 'biaya', 'ft_utama', 'include', 'exclude', 'dp', 'id_iti'], 'required'],
            [['foto_ut'],'file', 'extensions' => 'jpg, jpeg, png'],
            [['slot_awal', 'slot_max', 'biaya', 'dp', 'id_iti'], 'integer'],
            [['deskripsi', 'musim', 'include', 'exclude'], 'string'],
            [['name', 'wtk_berangkat', 'wkt_plg'], 'string', 'max' => 30],
            [['ft_utama'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_ngr' => 'Id Ngr',
            'name' => 'Nama Negara',
            'slot_awal' => 'Slot Awal',
            'slot_max' => 'Slot Max',
            'wtk_berangkat' => 'Waktu Berangkat',
            'wkt_plg' => 'Waktu Pulang',
            'deskripsi' => 'Deskripsi',
            'musim' => 'Musim',
            'biaya' => 'Biaya',
            'ft_utama' => 'Foto Utama',
            'foto_ut' => 'Unggah Bukti Transfer',
            'include' => 'Include',
            'exclude' => 'Exclude',
            'dp' => 'Dp',
            'id_iti' => 'Id Iti',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDtTransaksis()
    {
        return $this->hasMany(DtTransaksi::className(), ['id_ngr' => 'id_ngr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFotos()
    {
        return $this->hasMany(Foto::className(), ['id_ngr' => 'id_ngr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItineraries()
    {
        return $this->hasMany(Itinerary::className(), ['id_ngr' => 'id_ngr']);
    }
}
