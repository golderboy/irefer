<?php

namespace frontend\modules\referout\models;

use Yii;

/**
 * This is the model class for table "typept".
 *
 * @property string $typept_id
 * @property string $typept_name
 */
class Typept extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'typept';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['typept_id', 'typept_name'], 'required'],
            [['typept_id'], 'string', 'max' => 5],
            [['typept_name'], 'string', 'max' => 50],
            [['typept_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'typept_id' => 'Typept ID',
            'typept_name' => 'Typept Name',
        ];
    }
}
