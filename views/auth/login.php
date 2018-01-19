<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = "Вход";

?>
<div class="container" id="login-block">
    <div class="col-xs-12 t-center m-t-100 m-b-20">
        <a href="<?=Url::toRoute("/")?>"><img src="/images/enso-logo.png" style="max-width: 60px;" alt=""> </a>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="bg-white">
                <div class="form-signin p-30">
                    <h3>Вход в систему</h3>

                    <?php $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'options' => ['class' => 'form-horizontal'],
                        'fieldConfig' => [
                            'template' => '{input}',
                            //'labelOptions' => ['class' => 'col-lg- control-label'],
                            'errorOptions' => [
                                'class' => 'help-block help-block-error m-t-0'
                            ]
                        ],
                    ]); ?>

                        <?= $form->field($model, 'login', [
                            'template' => "<div class='append-icon'> {input}<i class='icon-user'></i>{error}</div>",
                            'options' => [
                                'class' => ''
                            ]
                        ])->textInput([
                            'placeholder' => 'Логин',
                            'class' => 'form-control form-white m-b-0',

                        ]) ?>

                        <?= $form->field($model, 'password', [
                            'template' => "<div class='append-icon'> {input}<i class='icon-lock'></i>{error}</div>",
                            'options' => [
                                'class' => ''
                            ]
                        ])->passwordInput([

                            'placeholder' => 'Пароль',
                            'class' => 'form-control form-white'
                        ]) ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($model, 'rememberMe', [
                                    'options' => [
                                        'data-checkbox' => "icheckbox_square-blue"
                                    ]

                                ])->checkbox([
                                    'template' => "<div class='m-t-15'><label>{input} {label}</label></div>",
                                    'data-checkbox' => "icheckbox_square-blue",
                                    'label' => 'Запомнить меня'
                                ]) ?>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="col-lg-offset-1 col-lg-11">
                                        <?= Html::submitButton('Войти', ['class' => 'btn btn-primary pull-right m-t-10 m-r-0', 'name' => 'login-button']) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>



    </div>
</div>





