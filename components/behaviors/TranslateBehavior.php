<?php


/**
 * Поведение для работы перевода контента моделей
 * var $this->owner app\components\Model;
 */
namespace app\components\behaviors;

use app\models\Contents;
use yii\db\ActiveRecord;
use yii\base\Behavior;
use Yii;
use yii\base\ErrorException;

class TranslateBehavior extends Behavior {

    /**
     * @var array Атрибуты, которые мы будем подвергать переводам
     */
    public $attributes = [];
    private $translates = [];

    public function events() {
        return [
            ActiveRecord::EVENT_AFTER_FIND => 'afterFind',
            ActiveRecord::EVENT_AFTER_UPDATE => 'afterFind',
            ActiveRecord::EVENT_BEFORE_UPDATE => 'beforeUpdate',
        ];
    }

    public function afterFind() {
        if(Yii::$app->language == Yii::$app->sourceLanguage) return;
        $this->owner->setAttributes($this->getTranslate());
    }

    public function beforeUpdate() {
        if(Yii::$app->language == Yii::$app->sourceLanguage) return;

        foreach ($this->attributes as $attribute) {
            if (isset($this->owner->$attribute)) {
                $this->owner->$attribute = $this->syncTranslate($attribute);
            } else {
                throw new ErrorException("В модели {$this->owner->className()} не найден атрибут {$attribute}");
            }
        }

    }

    /**
     * @param $attribute
     * @return array
     *
     * Возвращает условия для поиска
     */
    private function getCondition($attributes) {
        return [
            'model' => $this->owner->className(),
            'record' => $this->owner->id,
            'locale' => Yii::$app->language,
            'attribute' => $attributes
        ];
    }

    /**
     * @param $attribute
     * @return mixed
     *
     * Возвращает перевод для запрошенного атрибута или для всех сразу
     *
     */
    private function getTranslate($attribute = null) {

        if (empty($this->translates)) {
            $contents = Contents::find()->asArray()->select(["attribute","content"])->where($this->getCondition($this->attributes))->all();

            $this->translates = array_reduce($contents, function ($result, $item) {
                $result[$item['attribute']] = $item['content'];
                return $result;
            });
        }

        return $attribute? isset($this->translates[$attribute])? $this->translates[$attribute] : $this->owner->$attribute : $this->translates;
    }

    /**
     * @param $attribute
     * @return mixed
     *
     * Сохраняет перевод и возвращает правильное значение для поля
     */
    private function syncTranslate($attribute) {
        $content = Contents::find()->where($this->getCondition($attribute))->one();

        if (!$content) {
            $content = new Contents();
            $content->setAttributes($this->getCondition($attribute));
        }

        $content->content = $this->owner->$attribute;
        $content->save();

        return $this->owner->oldAttributes[$attribute];
    }

}