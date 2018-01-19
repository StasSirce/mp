<?php


/**
 * Поведение для сохранения полей в json
 * var $this->owner app\components\Model;
 */
namespace app\components\behaviors;

use yii\db\ActiveRecord;
use yii\base\Behavior;

class JsonBehavior extends Behavior {

    /**
     * @var array Атрибуты, которые будут храниться в JSON
     */
    public $attributes = [];

    public function events() {
        return [
            ActiveRecord::EVENT_AFTER_FIND => 'decode',
            ActiveRecord::EVENT_AFTER_INSERT => 'decode',
            ActiveRecord::EVENT_AFTER_UPDATE => 'decode',
            ActiveRecord::EVENT_BEFORE_UPDATE => 'encode',
            ActiveRecord::EVENT_BEFORE_INSERT => 'encode',
        ];
    }

    /**
     * Укладываем данные в JSON
     */
    public function encode() {
        foreach($this->attributes as $attr) {
            if ($this->owner->$attr) {
                $this->owner->$attr = json_encode($this->owner->$attr, JSON_UNESCAPED_UNICODE);
            }

            if (!$this->owner->$attr) {
                $this->owner->$attr = "[]";
            }
        }
    }

    /**
     * Парсим данные из JSON'а
     */
    public function decode() {
        foreach($this->attributes as $attr) {
            $this->owner->$attr = json_decode($this->owner->$attr, JSON_UNESCAPED_UNICODE);
        }
    }

}