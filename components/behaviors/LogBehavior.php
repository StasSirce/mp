<?php


/**
 * Поведение для логирования изменений и создания моделей
 * var $this->owner app\components\Model;
 */
namespace app\components\behaviors;

use app\models\Log;
use yii\db\ActiveRecord;
use yii\base\Behavior;

class LogBehavior extends Behavior {

    public function events() {
        return [
            ActiveRecord::EVENT_AFTER_INSERT => 'createModel',
            ActiveRecord::EVENT_BEFORE_UPDATE => 'updateModel',
        ];
    }

    /**
     * Возвращает дату создания объект в указанном формате
     * @param $format
     * @return string
     *
     */
    public function getCreateDate($format) {
        $pk = $this->owner->getTableSchema()->primaryKey[0];
        $firstLog = Log::find()->where(["type" => "create", "model" =>$this->owner->tableName(), "record" => $this->owner->$pk])->one();
        return $firstLog ? \Yii::$app->formatter->asDatetime(strtotime($firstLog->date), $format) : null;
    }

    public function getLog() {
        $pk = $this->owner->getTableSchema()->primaryKey[0];
        return Log::find()->where(["model" =>$this->owner->tableName(), "record" => $this->owner->$pk])->orderBy("date DESC")->all();
    }

    public function createModel($event) {
        if ($this->owner->tableName() == "log") return false;

        $log = new Log();
        $pk = $this->owner->getTableSchema()->primaryKey[0];

        $log->setAttributes([
            "old" => "",
            "new" => json_encode($this->owner->getAttributes() , JSON_UNESCAPED_UNICODE),
            "type" => "create",
            "model" => $this->owner->tableName(),
            "record" => $this->owner->$pk,
            "user" => \Yii::$app->getUser()->isGuest? 0 : \Yii::$app->getUser()->id,
        ]);
        $log->save();
    }

    public function updateModel($event) {

        if ($this->owner->tableName() == "log") return false;

        if ($this->owner->getOldAttributes() == $this->owner->getAttributes()) return;
        $log = new Log();
        $pk = $this->owner->getTableSchema()->primaryKey[0];
        $log->setAttributes([
            "old" => json_encode($this->owner->getOldAttributes(), JSON_UNESCAPED_UNICODE),
            "new" => json_encode($this->owner->getAttributes() , JSON_UNESCAPED_UNICODE),
            "model" => $this->owner->tableName(),
            "record" => $this->owner->$pk,
            "type" => "update",
            "user" => \Yii::$app->getUser()->isGuest? 0 : \Yii::$app->getUser()->id,
        ]);
        $log->save();

    }
}