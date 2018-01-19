<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();

echo "<?php\n";
?>

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */
/* @var $log app\models\Log */

$this->title = mb_strtolower($model->name(["ЕД", "РД"]));
?>
<h2>История изменений <?="<?="?> Html::encode($this->title) ?> #<strong><?="<?="?>$model->id?></strong></h2>

<div class="row">

    <?="<?"?> foreach($log as $change):?>
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-header <?="<?="?>$change->type !="create"? "bg-aero": "bg-blue"?>">
                    <h3><?="<?="?>$change->type=="create"? "Создано": "Изменено"?>: <strong><?="<?="?>$change->getDateFormat("d MMMM y H:mm")?></strong></h3></div>
                <div class="panel-body">

                    <?="<?"?>if ($change->type == "create"):?>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Атрибут</th>
                                <th>Значение</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?="<?"?>foreach(json_decode($change->new) as $key => $value):?>
                                <tr>
                                    <td><?="<?="?>$model->getAttributeLabel($key)?></td>
                                    <td style="word-break: break-all;"><?="<?="?>$value?></td>
                                </tr>
                            <?="<?"?>endforeach?>
                            </tbody>

                        </table>

                    <?="<?"?> else: ?>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Атрибут</th>
                                <th>Старое значение</th>
                                <th>Новое значение</th>
                            </tr>
                            </thead>
                            <tbody>
                                    <?="<?"?> $old = json_decode($change->old);
                                    foreach(json_decode($change->new) as $key => $value): ?>
                                <tr class="<?="<?="?>$value == $old->$key? "": "bg-light" ?>">
                                    <td><?="<?="?>$model->getAttributeLabel($key)?></td>
                                    <td style="word-break: break-all;"><?="<?="?>$old->$key?></td>
                                    <td style="word-break: break-all;"><?="<?="?>$value?></td>
                                </tr>
                            <?="<?"?>endforeach?>

                            </tbody>

                        </table>
                    <?="<?"?> endif;?>
                </div>
            </div>
        </div>
    <?="<?"?>endforeach;?>
</div>
