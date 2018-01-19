<?php

namespace app\models;

use Yii;
use app\components\Model;

/**
 * Модель для таблицы "video".
 *
 * @property integer $id
 * @property string $type
 * @property string $src
 * @property string $title
 * @property string $date
 * @property string $review
 * @property string $author
 */
class Video extends Model {

    /**
    * Название модели
    */
    public static $modelName = "Видео";

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'video';
    }

    public $types =[
        'text' => 'Текст',
        'video' => 'Видео'
    ];


    /**
    * @inheritdoc
    */
    public function behaviors() {
        return array_merge(parent::behaviors(), [
       ]);
    }


    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['type','src', 'title', 'date', 'review', 'author'], 'required'],
            [['type','src', 'title', 'date', 'review', 'author'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'type' => 'Тип',
            'src' => 'Ссылка',
            'title' => 'Название',
            'date' => 'Дата и время',
            'review' => 'Отзыв',
            'author' => 'Автор',
        ];
    }
}
