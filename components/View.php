<?php
/**
 * Created by PhpStorm.
 * User: MikeFinch
 * Date: 28.10.2016
 * Time: 20:53
 */

namespace app\components;

class View extends \yii\web\View {

    /**
     * Register new SCSS file. Convert it by converter and include pure css;
     * @param string $url
     * @param array $options
     * @param null $basePath
     */
    public function registerScssFile($url, $options = [], $basePath = null) {
        if (!$basePath) $basePath = \Yii::getAlias("@webroot");
        $converter = \Yii::$app->get("assetManager");
        $converted = $converter->converter->convert($url, $basePath);
        $this->registerCssFile($converted);
    }
}