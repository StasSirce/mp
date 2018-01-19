<?php

namespace app\components;

use Yii;
use yii\web;



class User extends \yii\web\User{
    public $role;

    protected function sendIdentityCookie($identity, $duration) {
        $cookie = new \yii\web\Cookie($this->identityCookie);
        $cookie->value = json_encode([
            $identity->getId(),
            $identity->getAuthKey(),
            $duration,
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        $cookie->expire = time() + $duration;

        Yii::$app->getResponse()->getCookies()->add($cookie);
    }

    public function setIdentity($identity){
        parent::setIdentity($identity);

        if ($identity) {
            $this->role = $identity->role;
        } else {
            $this->role = "guest";
        }
    }

}