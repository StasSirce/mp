<?php


/**
 * Базовый класс модели. Наследуется всеми моделями приложения
 */
namespace app\components;
use yii\base\NotSupportedException;
use Yii;
use yii\db\ActiveRecord;
use yii\base\Security;
use app\components\behaviors\LogBehavior;
use app\components\behaviors\FileBehavior;

class Model extends ActiveRecord {

    public function behaviors() {
        return [
            'log' => LogBehavior::className(),
            'file' => FileBehavior::className()
        ];
    }

    const SCENARIO_CREATE = "create";
    const SCENARIO_UPDATE = "update";

    /**
     * Возвращает имя текущекей модели с нужными речевыми настройками
     * @param array $params
     * @return string
     * @var $modelName string
     */
    public static function name($params = ["ЕД"]) {
        if (!empty(static::$modelName)) {
            $form = Yii::$app->morphy->castFormByGramInfo(mb_strtoupper(static::$modelName), null,$params, false);

            return $form? ucfirst($form[0]["form"]) : ucfirst(static::$modelName);
        } else {
            $match = [];
            preg_match("#\\\([^\\\]+)$#",get_called_class(), $match);
            return !empty($match[1]) ? $match[1] : get_called_class();

        }
    }

    /**
     * @param $key
     * @param $value
     * @param array $condition
     * @return array
     * @throws \yii\base\InvalidConfigException
     */
    public static function getArray($key, $value, $condition = []) {

        /** @var $model \app\components\Model */
        $model = Yii::createObject(static::className())->find()->where($condition)->all();
        $records = [];

        if (!count($model)) return $records;

        if ($model[0]->hasAttribute($value)) {
            foreach($model as $info) {
                $records[$info->$key] = $info->$value;
            }
        } else {
            foreach($model as $info) {
                $replaces = [];
                foreach ($info->attributes() as $attr) {
                    if (is_array($info->$attr)) continue;
                    $replaces["searches"][]= ":".$attr;
                    $replaces["values"][]= $info->$attr;
                }
                $records[$info->$key] = str_replace($replaces['searches'], $replaces['values'],$value);
            }
        }

        return $records;
    }

    /**
     * Возвращает дату в приятном формате
     * @param $date
     * @param string $format
     * @return string
     */
    public static function d($date, $format = "d MMMM y") {
        return Yii::$app->formatter->asDatetime($date, $format);
    }


}