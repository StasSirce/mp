<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>

<?php Pjax::begin(); ?> 
<div class="meta-tags-index">

    <h2><?= Html::encode($title) ?></h2>

    <div class="panel">
        <div class="panel-body">
            <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'tableOptions' => [
                    'class' => 'table table-striped table-action'
                ],
                                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'id',
                    'name',
                    'title',
                    'value',
                    'active',
                    ['class' => 'app\components\make\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>
<?php Pjax::end(); ?>