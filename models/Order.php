<?php

namespace app\models;

use Yii;
use app\components\Model;
use app\components\behaviors\FileBehavior;
/**
 * Модель для таблицы "order".
 *
 * @property integer $id
 * @property string $title
 * @property string $photo
 * @property string $description
 * @property string $photo_title
 * @property string $taste
 * @property string $pack
 * @property string $pack2
 * @property string $color
 * @property string $likes
 * @property string $background
 */
class Order extends Model {

    /**
    * Название модели
    */
    public static $modelName = "Заказы";

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'order';
    }

    /**
    * @inheritdoc
    */
    public function behaviors() {
        return array_merge(parent::behaviors(), [
           'file' => [
                'class' => FileBehavior::className(),
                'attributes' => [
                    'photo' => ['type' => 'image'],
                    'pack' => ['type' => 'image'],
                    'pack2' => ['type' => 'image'],
                    'photo_title' => ['type' => 'image'],
                    'background' => ['type' => 'image'],
                ]
            ]
       ]);
    }


    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['title', 'description', 'taste','color','likes'], 'required'],
            [['description'], 'string'],
            [['title', 'taste','color'], 'string', 'max' => 255],
            [['photo', 'pack','pack2','photo_title','background'], 'image','extensions' => ['jpg','jpeg','png']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'photo' => 'Фото',
            'description' => 'Описание',
            'photo_title' => 'Фото Названия',
            'taste' => 'Вкус',
            'pack' => 'Упаковка',
            'pack2' => 'Упаковка 2',
            'color' => 'Цвет',
            'likes' => 'Лайк',
            'background' => 'Фон'
        ];
    }
}
