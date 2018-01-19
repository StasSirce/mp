<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "log".
 *
 * @property integer $id
 * @property string $type
 * @property string $old
 * @property string $new
 * @property string $date
 * @property integer $user
 * @property string $model
 * @property integer $record
 */
class Log extends \app\components\Model
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'new', 'user', 'model', 'record'], 'required', 'on' => 'create'],
            [['type', 'old', 'new', 'user', 'model', 'record'], 'required', 'on' => 'update'],
            [['type', 'old', 'new'], 'string'],
            [['date'], 'safe'],
            [['user', 'record'], 'integer'],
            [['model'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Тип записи',
            'old' => 'Старые поля',
            'new' => 'Новые поля',
            'date' => 'Дата создания',
            'user' => 'Пользователь',
            'model' => 'Модель',
            'record' => 'Запись',
        ];
    }

    public function getDateFormat($format) {
        return Yii::$app->getFormatter()->asDatetime(strtotime($this->date), $format);
    }
}
