<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\components\metrika\assets;

use yii\web\AssetBundle;

class MetrikaAsset extends AssetBundle
{
    public $sourcePath = '@app/components/metrika/assets';

    public $css = [
        'style.css',
    ];
    public $js = [
        'script.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
