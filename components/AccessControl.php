<?php
/**
 * Created by PhpStorm.
 * User: ����
 * Date: 30.12.2015
 * Time: 19:49
 */
namespace app\components;
class AccessControl extends  \yii\filters\AccessControl {
    public $ruleConfig = ['class' => 'app\components\AccessRule'];
}