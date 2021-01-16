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
 * @property int $id_inex
 * @property int $id_dp
 * @property int $id_iti
 *
 * @property DtTransaksi[] $dtTransaksis
 * @property Foto[] $fotos
 * @property Inex $inex
 * @property Dp $dp
 * @property Itinerary $iti
 */
class Negara extends \yii\db\ActiveRecord
{
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
            [['slot_awal', 'slot_max', 'biaya', 'dp', 'id_iti'], 'integer'],
            [['deskripsi', 'musim'], 'string'],
            [['name', 'wtk_berangkat', 'wkt_plg', 'include', 'exclude'], 'string', 'max' => 30],
            [['ft_utama'], 'string', 'max' => 50],
           
            
            [['id_iti'], 'exist', 'skipOnError' => true, 'targetClass' => Itinerary::className(), 'targetAttribute' => ['id_iti' => 'id_iti']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_ngr' => 'Id Ngr',
            'name' => 'Name',
            'slot_awal' => 'Slot Awal',
            'slot_max' => 'Slot Max',
            'wtk_berangkat' => 'Wtk Berangkat',
            'wkt_plg' => 'Wkt Plg',
            'deskripsi' => 'Deskripsi',
            'musim' => 'Musim',
            'biaya' => 'Biaya',
            'ft_utama' => 'Ft Utama',
            'include'=>'Include',
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
   

    /**
     * @return \yii\db\ActiveQuery
     */
    

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItis()
    {
        return $this->hasMany(Itinerary::className(), ['id_ngr' => 'id_ngr']);
    }
}
