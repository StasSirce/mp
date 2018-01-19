<?php

namespace app\controllers;

use Yii;
use app\components\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\Order;
use app\models\PriceForm;
use app\models\Video;
use app\models\Settings;

class SiteController extends Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['admin'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],

        ];
    }

    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',

            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            'metrika' => [
                'class' => 'app\components\metrika\MetrikaAction',
                'token' => Settings::get("yandex_token"),
                'counter' => Settings::get("yandex_counter")
            ],
        ];
    }

    public function actionIndex($video=null) {
        $model = new PriceForm();
        $order = Order::find();
        $videoList = null;

        if($video) {
            //todo найти все отзывы не с этим $video в id

            $video = Video::find()->where(['id' => $video])->orderBy('id DESC')->one();

        }

        if(!$video && Video::find()->count()){
           $video = Video::find()->where(['type' => 'video'])->orderBy('id DESC')->one();
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->contact("stassirce@gmail.com");
        }

        if (Yii::$app->request->isPjax) {
            return $this->renderPartial("index",[
                'model' => $model,
                'order' => $order->all(),
                'video' => $video,
                'video_list' => Video::find()->all()
            ]);
        }

        //todo not in yii2 условие

        return $this->render('index',[
            'model' => $model,
            'order' => $order->all(),
            'video' => $video,
            'video_list' => Video::find()->all()
        ]);
    }

    public function actionLike($id){
        $model = Order::find()->where(['id' => $id])->one();

        $model->likes++;
        $model->save();

    }

    public function actionAdmin() {
        return Yii::$app->runAction('admin/default/index', []);
    }


}
