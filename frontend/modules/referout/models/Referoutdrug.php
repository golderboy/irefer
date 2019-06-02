<?php

namespace frontend\modules\referout\models;

use Yii;

/**
 * This is the model class for table "referout_drug".
 *
 * @property string $refer_no
 * @property string $hn
 * @property string $subsuffix
 * @property string $makedate
 * @property string $stockname
 * @property string $touse
 * @property string $toorder
 * @property string $memo1
 * @property string $memo2
 */
class Referoutdrug extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'referout_drug';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['makedate'], 'safe'],
            [['refer_no', 'hn', 'subsuffix'], 'string', 'max' => 50],
            [['stockname', 'touse', 'toorder', 'memo1', 'memo2'], 'string', 'max' => 500],
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
            'subsuffix' => 'Subsuffix',
            'makedate' => 'Makedate',
            'stockname' => 'Stockname',
            'touse' => 'Touse',
            'toorder' => 'Toorder',
            'memo1' => 'Memo1',
            'memo2' => 'Memo2',
        ];
    }
}
