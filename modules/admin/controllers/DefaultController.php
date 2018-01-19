<?php

namespace app\modules\admin\controllers;
use app\components\Controller;
use app\components\AccessControl;

class DefaultController extends Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),

                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => [
                           "admin",
                        ],
                    ],
                ],
            ],

        ];
    }

    public function actionIndex() {
        return $this->render("index");
    }
}