<?php

use yii\helpers\Html;
use yii\gii\CodeFile;

/* @var $this \yii\web\View */
/* @var $generator \yii\gii\Generator */
/* @var $files CodeFile[] */
/* @var $answers array */
/* @var $id string panel ID */

?>
<div class="default-view-files">
    <div id="action-toggle" class="icheck-inline pull-right">
        <label class="active" title="Filter files that are created">
            <input type="checkbox" data-color-on='blue' data-checkbox="icheckbox_square-blue" value="<?= CodeFile::OP_CREATE ?>" checked> Новый
        </label>
        <label class=" active" title="Filter files that are unchanged.">
            <input type="checkbox" data-checkbox="icheckbox_square-orange" value="<?= CodeFile::OP_SKIP ?>" checked> Без изменений
        </label>
        <label class=" active" title="Filter files that are overwritten">
            <input type="checkbox" data-checkbox="icheckbox_square-red" value="<?= CodeFile::OP_OVERWRITE ?>" checked> Перезапись
        </label>
    </div>

    <p>Нажмите на <code>Генерировать</code> чтобы сгенерировать следующие файлы:</p>

    <table class="table table-bordered table-striped table-condensed">
        <thead>
            <tr>
                <th class="file">Файл</th>
                <th class="action">Действие</th>
                <?php
                $fileChangeExists = false;
                foreach ($files as $file) {
                    if ($file->operation !== CodeFile::OP_SKIP) {
                        $fileChangeExists = true;
                        echo '<th><input type="checkbox" id="check-all"></th>';
                        break;
                    }
                }
                ?>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($files as $file): ?>
            <?php
            if ($file->operation === CodeFile::OP_OVERWRITE) {
                $trClass = 'warning';
            } elseif ($file->operation === CodeFile::OP_SKIP) {
                $trClass = 'active';
            } elseif ($file->operation === CodeFile::OP_CREATE) {
                $trClass = 'success';
            } else {
                $trClass = '';
            }
            ?>
            <tr class="<?= "$file->operation $trClass" ?>">
                <td class="file">
                    <?= Html::a(Html::encode($file->getRelativePath()), ['preview', 'id' => $id, 'file' => $file->id], ['class' => 'preview-code', 'data-title' => $file->getRelativePath()]) ?>
                    <?php if ($file->operation === CodeFile::OP_OVERWRITE): ?>
                        <?= Html::a('diff', ['diff', 'id' => $id, 'file' => $file->id], ['class' => 'diff-code label label-warning', 'data-title' => $file->getRelativePath()]) ?>
                    <?php endif; ?>
                </td>
                <td class="action">
                    <?php
                    if ($file->operation === CodeFile::OP_SKIP) {
                        echo 'исходный';
                    } else {
                        echo $file->operation == "create"? "новый" : "перезапись";
                    }
                    ?>
                </td>
                <?php if ($fileChangeExists): ?>
                <td class="check">
                    <?php
                    if ($file->operation === CodeFile::OP_SKIP) {
                        echo '&nbsp;';
                    } else {
                        echo Html::checkBox("answers[{$file->id}]", isset($answers) ? isset($answers[$file->id]) : ($file->operation === CodeFile::OP_CREATE));
                    }
                    ?>
                </td>
                <?php endif; ?>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


    <div class="modal fade" id="preview-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <div class="btn-group pull-left">
                        <a class="modal-previous btn btn-xs btn-default" href="#" title="Previous File (Left Arrow)"><span class="glyphicon glyphicon-arrow-left"></span></a>
                        <a class="modal-next btn btn-xs btn-default" href="#" title="Next File (Right Arrow)"><span class="glyphicon glyphicon-arrow-right"></span></a>
                        <a class="modal-refresh btn btn-xs btn-default" href="#" title="Refresh File (R)"><span class="glyphicon glyphicon-refresh"></span></a>
                        <a class="modal-checkbox btn btn-xs btn-default" href="#" title="Check This File (Space)"><span class="glyphicon"></span></a>
                        &nbsp;
                    </div>
                    <strong class="modal-title pull-left">Modal title</strong>
                    <div class="clearfix"></div>
                </div>
                <div class="modal-body">
                    <p>Please wait ...</p>
                </div>
            </div>
        </div>
    </div>
</div>
