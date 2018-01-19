<?php
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

$asset = yii\gii\GiiAsset::register($this);
use app\assets\MakeAsset;

use yii\helpers\Url;

MakeAsset::register($this);
?>

<?php $this->beginPage()
?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <script src="/vendors/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <script src="/js/jquery.js"></script>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <link rel="icon" href="/images/favicon.ico">
    <?php $this->head() ?>
</head>

<?php $this->beginBody();?>

<body class="fixed-topbar sidebar-hover theme-sdtl color-default bg-light-dark">
<section>

    <div class="main-content ">
        <div class="topbar">
            <div class="container">
                <div class="header-left">
                    <h1><a href="/gii"><img src="/images/admin/logo.png" class="h-25" alt=""> </a></h1>
                </div>
                <div class="header-right">
                    <ul class="header-menu nav navbar-nav">
                        <li id="quickview-toggle"><a href="<?=Url::toRoute("/")?>"><span class="c-dark no-pjax">На сайт</span></a></li>
                    </ul>
                </div>
            </div>

        </div>

        <div class="page-content m-t-50" style="min-height: calc(100vh - 70px);" >
            <div class="container">
                <?= $content ?>
            </div>

        </div>
    </div>
</section>



<?php $this->endBody() ?>

<a href="#" class="scrollup"><i class="fa fa-angle-up"></i></a>
<script src="/vendors/plugins/jquery/jquery-migrate-1.2.1.min.js"></script>
<script src="/vendors/plugins/gsap/main-gsap.min.js"></script> <!-- HTML Animations -->
<script src="/vendors/plugins/jquery-ui/jquery-ui-1.11.2.min.js"></script>
<script src="/vendors/plugins/jquery-block-ui/jquery.blockUI.min.js"></script> <!-- simulate synchronous behavior when using AJAX -->
<script src="/vendors/plugins/bootbox/bootbox.min.js"></script>
<script src="/js/pjax.js"></script>
<script src="/js/queryParser.js"></script>
<script src="/vendors/plugins/mcustom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script> <!-- Custom Scrollbar sidebar -->
<script src="/vendors/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="/vendors/plugins/bootstrap-dropdown/bootstrap-hover-dropdown.min.js"></script> <!-- Show Dropdown on Mouseover -->
<script src="/vendors/plugins/bootstrap-progressbar/bootstrap-progressbar.min.js"></script> <!-- Animated Progress Bar -->
<script src="/vendors/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="/vendors/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.ru.min.js"></script>
<script src="/vendors/plugins/switchery/switchery.min.js"></script> <!-- IOS Switch -->
<script src="/vendors/plugins/charts-sparkline/sparkline.min.js"></script> <!-- Charts Sparkline -->
<script src="/vendors/plugins/retina/retina.min.js"></script>  <!-- Retina Display -->
<script src="/vendors/plugins/jquery-cookies/jquery.cookies.js"></script> <!-- Jquery Cookies, for theme -->
<script src="/vendors/plugins/bootstrap/js/jasny-bootstrap.min.js"></script> <!-- File Upload and Input Masks -->
<script src="/vendors/plugins/select2/select2.min.js"></script> <!-- Select Inputs -->
<script src="/vendors/plugins/bootstrap-tags-input/bootstrap-tagsinput.min.js"></script> <!-- Select Inputs -->
<script src="/vendors/plugins/bootstrap-loading/lada.min.js"></script> <!-- Buttons Loading State -->
<script src="/vendors/plugins/timepicker/jquery-ui-timepicker-addon.min.js"></script> <!-- Time Picker -->
<script src="/vendors/plugins/multidatepicker/multidatespicker.min.js"></script> <!-- Multi dates Picker -->
<script src="/vendors/plugins/colorpicker/spectrum.min.js"></script> <!-- Color Picker -->
<script src="/vendors/plugins/touchspin/jquery.bootstrap-touchspin.min.js"></script> <!-- A mobile and touch friendly input spinner component for Bootstrap -->
<script src="/vendors/plugins/autosize/autosize.min.js"></script> <!-- Textarea autoresize -->
<script src="/vendors/plugins/icheck/icheck.min.js"></script> <!-- Icheck -->
<script src="/vendors/plugins/bootstrap-editable/js/bootstrap-editable.min.js"></script> <!-- Inline Edition X-editable -->
<script src="/vendors/plugins/bootstrap-context-menu/bootstrap-contextmenu.min.js"></script> <!-- File Upload and Input Masks -->
<script src="/vendors/plugins/prettify/prettify.min.js"></script> <!-- Show html code -->
<script src="/vendors/plugins/slick/slick.min.js"></script> <!-- Slider -->
<script src="/vendors/plugins/countup/countUp.min.js"></script> <!-- Animated Counter Number -->
<script src="/vendors/plugins/noty/jquery.noty.packaged.min.js"></script>  <!-- Notifications -->
<script src="/vendors/plugins/backstretch/backstretch.min.js"></script> <!-- Background Image -->
<script src="/vendors/plugins/charts-chartjs/Chart.min.js"></script>  <!-- ChartJS Chart -->
<script src="/vendors/plugins/bootstrap-slider/bootstrap-slider.js"></script> <!-- Bootstrap Input Slider -->
<script src="/vendors/plugins/visible/jquery.visible.min.js"></script> <!-- Visible in Viewport -->

</body>
</html>

<?php $this->endPage() ?>

<!--
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?php
NavBar::begin([
    'brandLabel' => Html::img($asset->baseUrl . '/logo.png'),
    'brandUrl' => ['default/index'],
    'options' => ['class' => 'navbar-inverse navbar-fixed-top'],
]);
echo Nav::widget([
    'options' => ['class' => 'nav navbar-nav navbar-right'],
    'items' => [
        ['label' => 'Home', 'url' => ['default/index']],
        ['label' => 'Help', 'url' => 'http://www.yiiframework.com/doc-2.0/guide-tool-gii.html'],
        ['label' => 'Application', 'url' => Yii::$app->homeUrl],
    ],
]);
NavBar::end();
?>

<div class="container">
    <?= $content ?>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">A Product of <a href="http://www.yiisoft.com/">Yii Software LLC</a></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

-->
