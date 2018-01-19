<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\gii\components\ActiveField;
use yii\gii\CodeFile;

/* @var $this yii\web\View */
/* @var $generator yii\gii\Generator */
/* @var $id string panel ID */
/* @var $form yii\widgets\ActiveForm */
/* @var $results string */
/* @var $hasError boolean */
/* @var $files CodeFile[] */
/* @var $answers array */

$this->title = $generator->getName();
$templates = [];
foreach ($generator->templates as $name => $path) {
    $templates[$name] = "$name ($path)";
}
?>

<div class="header">
    <h2><?= Html::encode($this->title) ?></h2>

</div>

<div class="panel default-view">

    <div class="panel-body">

        <p><?= $generator->getDescription() ?></p>

        <?php $form = ActiveForm::begin([
            'id' => "$id-generator",
            'successCssClass' => '',
            'fieldConfig' => ['class' => ActiveField::className()],
        ]); ?>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <?= $this->renderFile($generator->formView(), [
                    'generator' => $generator,
                    'form' => $form,
                ]) ?>
                <?= $form->field($generator, 'template')->sticky()
                    ->label('Шаблон кода')
                    ->dropDownList($templates)->hint('
                        Выберите один из шаблонов для генерации кода.
                ') ?>
                <div class="form-group">
                    <?= Html::submitButton('Предпросмотр', ['name' => 'preview', 'class' => 'btn btn-primary']) ?>

                    <?php if (isset($files)): ?>
                        <?= Html::submitButton('Генерировать', ['name' => 'generate', 'class' => 'btn btn-success']) ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <?php
        if (isset($results)) {
            echo $this->render('view/results', [
                'generator' => $generator,
                'results' => $results,
                'hasError' => $hasError,
            ]);
        } elseif (isset($files)) {
            echo $this->render('view/files', [
                'id' => $id,
                'generator' => $generator,
                'files' => $files,
                'answers' => $answers,
            ]);
        }
        ?>
        <?php ActiveForm::end(); ?>

    </div>
    <div class="panel-footer">

    </div>
</div>

