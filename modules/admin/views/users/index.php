<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';

?>

<div class="users-index">

    <h2><?= Html::encode($this->title) ?></h2>

    <div class="panel">
        <div class="panel-body">
            <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'tableOptions' => [
                    'class' => 'table table-striped table-action'
                ],
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'id',
                    'login',
                    [
                        'attribute' => 'role',
                        'filter' => $searchModel->roles,
                        'content' => function($model) {
                            return $model->roles[$model->role];
                        }
                    ],

                    [
                        'attribute' => 'status',
                        'filter' => $searchModel->statuses,
                        'content' => function($model) {
                            return $model->statuses[$model->status];
                        }
                    ],

                    ['class' => 'app\components\make\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>
