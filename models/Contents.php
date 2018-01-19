<?php

namespace app\models;

use Yii;
use app\components\Model;

/**
 * Модель для таблицы "contents".
 *
 * @property integer $id
 * @property string $model
 * @property integer $record
 * @property string $attribute
 * @property string $locale
 * @property string $content
 */
class Contents extends Model {

    /**
    * Название модели
    */
    public static $modelName = "Перевод";

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'contents';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['model', 'record', 'attribute', 'locale', 'content'], 'required'],
            [['record'], 'integer'],
            [['content'], 'string'],
            [['model', 'attribute'], 'string', 'max' => 25],
            [['locale'], 'string', 'max' => 5]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'model' => 'Модель',
            'record' => 'Запись',
            'attribute' => 'Атрибут',
            'locale' => 'Язык',
            'content' => 'Содержимое',
        ];
    }
}
