<?php

namespace frontend\modules\referout\models;

use Yii;

/**
 * This is the model class for table "referout_lab".
 *
 * @property string $refer_no
 * @property string $hn
 * @property string $labroom
 * @property string $reqno
 * @property string $labname
 * @property string $resvalue
 * @property string $norvalue
 * @property string $resdate
 */
class Referoutlab extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'referout_lab';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['resdate'], 'safe'],
            [['refer_no', 'hn'], 'string', 'max' => 50],
            [['labroom'], 'string', 'max' => 500],
            [['reqno', 'norvalue'], 'string', 'max' => 100],
            [['labname'], 'string', 'max' => 2000],
            [['resvalue'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'refer_no' => 'Refer No',
            'hn' => 'Hn',
            'labroom' => 'Labroom',
            'reqno' => 'Reqno',
            'labname' => 'Labname',
            'resvalue' => 'Resvalue',
            'norvalue' => 'Norvalue',
            'resdate' => 'Resdate',
        ];
    }
}
