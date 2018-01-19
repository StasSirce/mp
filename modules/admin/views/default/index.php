<?php

/* @var $this yii\web\View */

use app\components\metrika\MetrikaWidget;
?>

<h2><strong>Панель </strong> администратора</h2>

<div class="row">
    <div class="col-md-12 col-lg-6">
        <div class="panel">
            <div class="panel-header ">
                <div class="row">
                    <div class="col-md-12"><h3><i class="icon-graph"></i>Посещаемость сайта</h3></div>
                </div>

            </div>
            <div class="panel-content">
                <?= MetrikaWidget::widget();?>
            </div>
        </div>
    </div>

    <div class="col-md-12 col-lg-6">

    </div>
</div>

<script>

</script>