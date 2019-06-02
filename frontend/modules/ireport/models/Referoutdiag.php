<?php

namespace frontend\modules\ireport\models;

use Yii;

/**
 * This is the model class for table "referout_diag".
 *
 * @property int $rec_no
 * @property string $refer_no
 * @property string $icd10
 * @property string $diagtype_id
 */
class Referoutdiag extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'referout_diag';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rec_no', 'refer_no', 'icd10'], 'required'],
            [['rec_no'], 'integer'],
            [['refer_no'], 'string', 'max' => 20],
            [['icd10'], 'string', 'max' => 7],
            [['diagtype_id'], 'string', 'max' => 1],
            [['rec_no', 'refer_no'], 'unique', 'targetAttribute' => ['rec_no', 'refer_no']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'rec_no' => 'Rec No',
            'refer_no' => 'Refer No',
            'icd10' => 'Icd10',
            'diagtype_id' => 'Diagtype ID',
        ];
    }
}
