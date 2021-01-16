<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_level".
 *
 * @property int $id_level
 * @property string $level
 *
 * @property User[] $users
 */
class TbLevel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_level';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['level'], 'required'],
            [['level'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_level' => 'Id Level',
            'level' => 'Level',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id_level' => 'id_level']);
    }
}
