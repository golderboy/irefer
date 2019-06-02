<?php

namespace frontend\modules\ireport\models;

use Yii;

/**
 * This is the model class for table "referout_xray".
 *
 * @property string $refer_no
 * @property string $hn
 * @property string $xrayroom
 * @property string $reqno
 * @property string $resvalue
 * @property string $resdate
 */
class ReferoutXray extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'referout_xray';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['resdate'], 'safe'],
            [['refer_no', 'hn', 'reqno'], 'string', 'max' => 50],
            [['xrayroom'], 'string', 'max' => 500],
            [['resvalue'], 'string', 'max' => 3000],
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
            'xrayroom' => 'Xrayroom',
            'reqno' => 'Reqno',
            'resvalue' => 'Resvalue',
            'resdate' => 'Resdate',
        ];
    }
}
