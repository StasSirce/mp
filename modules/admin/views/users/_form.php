<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form"  >

    <?php $form = ActiveForm::begin(['options' => ['class' => 'pjax-form']]); ?>
    <?= $form->field($model, 'login')->textInput(['maxlength' => true, "autocomplete"=> "false"]) ?>
    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true, "autocomplete" => "new-password", "value" => ""]) ?>
    <?= $form->field($model, 'photo')->fileInput() ?>
    <?= $form->field($model, 'role')->dropDownList([ 'admin' => 'Администратор', 'user' => 'Пользователь', ], ['prompt' => '']) ?>
    <?= $form->field($model, 'status')->checkbox() ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
