<?php

namespace app\components\make\grid;

use Yii;
use Closure;
use yii\helpers\Html;
use yii\helpers\Url;

class ActionColumn extends \yii\grid\ActionColumn {

    public $template = '<div class="btn-group">{view}{update}{delete}</div>';

    public $contentOptions = ["style" => "width: 140px;"];
    public $header = "Управление";
    public function init() {
        parent::init();
    }

    protected function initDefaultButtons() {
        if (!isset($this->buttons['view'])) {
            $this->buttons['view'] = function ($url, $model, $key) {
                $options = array_merge([
                    'title' => Yii::t('yii', 'View'),
                    'aria-label' => Yii::t('yii', 'View'),
                    'data-pjax' => '0',
                    'class' => 'btn btn-primary btn-sm'
                ], $this->buttonOptions);
                return Html::a('<i class="glyphicon glyphicon-eye-open t-3 p-r-0"></i>', $url, $options);
            };
        }
        if (!isset($this->buttons['update'])) {
            $this->buttons['update'] = function ($url, $model, $key) {
                $options = array_merge([
                    'title' => Yii::t('yii', 'Update'),
                    'aria-label' => Yii::t('yii', 'Update'),
                    'data-pjax' => '0',
                    'class' => 'btn btn-warning btn-sm'
                ], $this->buttonOptions);
                return Html::a('<i class="glyphicon glyphicon-pencil t-3 p-r-0"></i>', $url, $options);
            };
        }
        if (!isset($this->buttons['delete'])) {
            $this->buttons['delete'] = function ($url, $model, $key) {
                $options = array_merge([
                    'title' => Yii::t('yii', 'Delete'),
                    'aria-label' => Yii::t('yii', 'Delete'),
                    'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                    'data-method' => 'post',
                    'data-pjax' => '0',
                    'class' => 'btn btn-danger btn-sm'
                ], $this->buttonOptions);
                return Html::a('<i class="glyphicon glyphicon-trash t-3 p-r-0"></i>', $url, $options);
            };
        }
    }

}