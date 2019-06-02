<?php

namespace frontend\modules\referout\models;

use Yii;

/**
 * This is the model class for table "loads".
 *
 * @property string $loads_id
 * @property string $loads_name
 */
class Loads extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'loads';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['loads_id', 'loads_name'], 'required'],
            [['loads_id'], 'string', 'max' => 5],
            [['loads_name'], 'string', 'max' => 50],
            [['loads_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'loads_id' => 'Loads ID',
            'loads_name' => 'Loads Name',
        ];
    }
}
