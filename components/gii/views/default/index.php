<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $generators \yii\gii\Generator[] */
/* @var $content string */

$generators = Yii::$app->controller->module->generators;
$this->title = 'Генератор кода Gii';
?>
<div class="default-index">
    <div class="page-header m-t-0">
        <h1>Генератор кода <strong>Gii</strong></h1>
    </div>

    <p class="lead">Используйте один из представленных ниже генераторов:</p>

    <div class="row">
        <?php foreach ($generators as $id => $generator): ?>
        <div class="generator col-lg-4">
            <div class="panel">
                <div class="panel-header"><h3><?= Html::encode($generator->getName()) ?></h3></div>
                <div class="panel-body"> <p><?= $generator->getDescription() ?></p></div>
                <div class="panel-footer"> <?= Html::a('Начать »', ['default/view', 'id' => $id], ['class' => 'btn btn-primary']) ?></div>
            </div>

        </div>
        <?php endforeach; ?>
    </div>


</div>
