<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Video */

$this->title = $model->name(["ЕД", "ИМ"]);
?>
<div class="video-view">

    <h2><?= Html::encode($this->title) ?> #<strong><?=$model->id?></strong></h2>

    <div class="panel">
        <div class="panel-body">
            <div class="pull-right t-right">
                Дата создания: <strong><?=  $model->getCreateDate("d MMMM y H:mm");?></strong> <br>
                <a href="<?= Url::toRoute(['log', 'id' => $model->id])?>">История изменений</a>
            </div>

            <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
            <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                'confirm' => 'Вы действительно хотите удалить этот элемент',
                'method' => 'post',
                'pjax' => '0',
                ],
            ]) ?>

            <?= DetailView::widget([
                'model' => $model,
                'options' => ['class' => "table table-striped"],
                'attributes' => [
                    'id',
                    [
                        'attribute' => 'type',
                        'value' => function($model) {
                            return $model->types[$model->type];
                        }
                    ],
                    'src',
                    'title',
                    'date',
                    'review',
                    'author',
                ],
            ]) ?>
        </div>
    </div>
</div>
