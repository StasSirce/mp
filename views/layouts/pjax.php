<?
use yii\helpers\Html;
?>

<head>
    <title><?= Html::encode(isset($this->context->module->controllers[$this->context->id]) ? $this->context->module->controllers[$this->context->id]["title"] : "")?></title>
    <?$this->beginPage() ?>
    <?$this->endBody() ?>
</head>

<?$this->beginBody() ?>
<?=$content ?>
<?$this->endPage() ?>

