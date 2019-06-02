<?php

namespace frontend\modules\referout\models;

use Yii;

/**
 * This is the model class for table "strength".
 *
 * @property string $strength_id
 * @property string $strength_name
 */
class Strength extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'strength';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['strength_id', 'strength_name'], 'required'],
            [['strength_id'], 'string', 'max' => 5],
            [['strength_name'], 'string', 'max' => 50],
            [['strength_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'strength_id' => 'Strength ID',
            'strength_name' => 'Strength Name',
        ];
    }
}
