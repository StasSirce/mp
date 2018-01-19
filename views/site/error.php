<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
$this->context->layout = "//auth";
?>
<div class="site-error">
    <div class="container">
        <h1 class="c-white t-center m-t-100 m-b-20"><?= Html::encode($this->title) ?></h1>

        <h2 class="c-white t-center"><?= nl2br(Html::encode($message)) ?></h2>
    </div>



</div>
