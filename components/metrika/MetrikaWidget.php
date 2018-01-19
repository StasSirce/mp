<?php

namespace app\components\metrika;

use yii\base\Widget;
use app\components\metrika\assets\MetrikaAsset;

class MetrikaWidget extends Widget {

    public function init() {
        parent::init();
        //MetrikaAsset::register($this->view);
    }

    public function run() {
        MetrikaAsset::register($this->view);
        return $this->render("main");
    }
}