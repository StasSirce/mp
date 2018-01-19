<?php

namespace app\controllers;

use app\models\Users;
use Yii;
use app\components\AccessControl;
use yii\web\Controller;
use app\models\LoginForm;
use yii\filters\VerbFilter;
use yii\helpers\Url;


class AuthController extends Controller {

    public $layout = "//auth";

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionLogin() {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {

            if (strlen(Yii::$app->getUser()->getReturnUrl()) === 1) {
                if (isset(Users::$modules[Yii::$app->getUser()->role])) {
                    return Yii::$app->getResponse()->redirect(Url::toRoute(Users::$modules[Yii::$app->getUser()->role]));
                }

                return Yii::$app->getResponse()->redirect(Yii::$app->getUser()->afterLoginUrl());
            }
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

}
