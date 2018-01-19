<?php
/* @var $this yii\web\View */
/* @var $generator yii\gii\Generator */
/* @var $results string */
/* @var $hasError boolean */
?>
<div class="default-view-results">
    <?php
    if ($hasError) {
        echo '<div class="alert alert-danger">Что-то пошло не так при генерации. Проверьте сообщения об ошибках.</div>';
    } else {
        echo '<div class="alert alert-success">' . $generator->successMessage() . '</div>';
    }
    ?>
    <pre><?= nl2br($results) ?></pre>
</div>
