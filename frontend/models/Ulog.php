<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "ulog".
 *
 * @property string $uid
 * @property string $pwd
 * @property string $sect
 * @property string $uname
 */
class Ulog extends \yii\db\ActiveRecord
{
    public $username;
    public $password;

    public static function tableName()
    {
        return 'ulog';
    }

    

    public function rules()
    {
        return [
            [['uid', 'pwd', 'sect'], 'string', 'max' => 50],
            [['uname'], 'string', 'max' => 150],
            [['username','password'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'uid' => 'Uid',
            'pwd' => 'Pwd',
            'sect' => 'Sect',
            'uname' => 'Uname',
        ];
    }
}
