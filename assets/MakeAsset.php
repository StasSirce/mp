<?php

namespace app\assets;

use yii\web\AssetBundle;


class MakeAsset extends AssetBundle
{
    public $sourcePath = '@app/components/make/assets';
    public $css = [
        'global/css/layout.css',
        'global/css/style.css',
        'global/css/theme.css',
        'global/css/ui.css',
    ];
    public $js = [

        'global/js/application.js',
        'global/js/plugins.js',
        'global/js/sidebar_hover.js',
        'global/js/layout.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
