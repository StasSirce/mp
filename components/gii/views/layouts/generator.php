<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $generators \yii\gii\Generator[] */
/* @var $activeGenerator \yii\gii\Generator */
/* @var $content string */

$generators = Yii::$app->controller->module->generators;
$activeGenerator = Yii::$app->controller->generator;
?>
<?php $this->beginContent('@app/components/gii/views/layouts/main.php'); ?>
<div class="row">
    <div class="col-md-3 col-sm-4">


        <div class="btn-group btn-group-vertical m-r-0 width-100p">
            <?php
            foreach ($generators as $id => $generator) {
                $label = Html::encode($generator->getName());
                echo Html::a($label, ['default/view', 'id' => $id], [
                    'class' => 'btn btn-lg '.($generator === $activeGenerator ?'btn-primary':'btn-white'),
                ]);
            }
            ?>
        </div>
    </div>
    <div class="col-md-9 col-sm-8">
        <?= $content ?>
    </div>
</div>
<?php $this->endContent(); ?>
