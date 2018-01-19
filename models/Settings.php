<?php

namespace app\models;

use Yii;
use app\components\Model;

/**
 * This is the model class for table "settings".
 *
 * @property integer $id
 * @property string $key
 * @property string $value
 * @property string $title
 */
class Settings extends Model{
    /**
     * @inheritdoc
     */

    public static function get($name) {
        return self::find()->where(['key' => $name])->one()->value;
    }

    public static function set($name, $value) {
        $model = self::find()->where(['key' => $name])->one();
        $model->value = $value;
        return $model->save();
    }

    public static function title($name) {
        return self::find()->where(['key' => $name])->one()->title;
    }


    public static function tableName() {
        return 'settings';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['key', 'value'], 'required'],
            [['key', 'value','title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'key' => 'Ключ',
            'value' => 'Значение',
            'title' => 'Заголовок',
        ];
    }
}
