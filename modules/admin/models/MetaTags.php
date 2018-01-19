<?php

namespace app\modules\admin\models;

use Yii;

/**
 * Модель для таблицы "meta_tags".
 *
 * @property integer $id
 * @property string $name
 * @property string $title
 * @property string $value
 * @property string $active
 */
class MetaTags extends \app\components\Model {

    /**
    * Название модели
    */
    public static $modelName = "Мета-тег";

    public function getStatuses() {
        return [
            0 => "Неактивен",
            1 => "Активен",
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'meta_tags';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'title', 'value', 'active'], 'required'],
            [['active'], 'string'],
            [['name', 'title'], 'string', 'max' => 255],
            [['value'], 'string', 'max' => 55]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'title' => 'Подпись',
            'value' => 'Значение',
            'active' => 'Статус',
        ];
    }
}
