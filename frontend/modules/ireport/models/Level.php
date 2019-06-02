<?php

namespace frontend\modules\ireport\models;

use Yii;

/**
 * This is the model class for table "level".
 *
 * @property string $level_id
 * @property string $level_name
 * @property string $level_memo
 * @property string $level_type
 */
class Level extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'level';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['level_id', 'level_type'], 'string', 'max' => 50],
            [['level_name'], 'string', 'max' => 500],
            [['level_memo'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'level_id' => 'Level ID',
            'level_name' => 'Level Name',
            'level_memo' => 'Level Memo',
            'level_type' => 'Level Type',
        ];
    }
}
