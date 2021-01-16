<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "berita".
 *
 * @property int $id_berita
 * @property string $judul
 * @property string $tgl
 * @property string $berita
 * @property int $id_admin
 *
 * @property Admin $admin
 */
class Berita extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'berita';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['judul', 'tgl', 'berita', 'id_admin'], 'required'],
            [['tgl'], 'safe'],
            [['berita'], 'string'],
            [['id_admin'], 'integer'],
            [['judul'], 'string', 'max' => 50],
            [['id_admin'], 'exist', 'skipOnError' => true, 'targetClass' => Admin::className(), 'targetAttribute' => ['id_admin' => 'id_admin']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_berita' => 'Id Berita',
            'judul' => 'Judul',
            'tgl' => 'Tgl',
            'berita' => 'Berita',
            'id_admin' => 'Id Admin',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdmin()
    {
        return $this->hasOne(Admin::className(), ['id_admin' => 'id_admin']);
    }
}
