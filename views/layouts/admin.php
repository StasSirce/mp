<?php


/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\assets\AppAsset;
use app\assets\MakeAsset;
use yii\widgets\ActiveFormAsset;
use yii\grid\GridViewAsset;
use app\modules\admin\assets\AdminAsset;


AppAsset::register($this);
MakeAsset::register($this);
AdminAsset::register($this);
GridViewAsset::register($this);
ActiveFormAsset::register($this);

?>
<?php $this->beginPage()
?>

    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <title><?= Html::encode(isset($this->context->module->controllers[$this->context->id]) ? $this->context->module->controllers[$this->context->id]["title"] : "")?></title>
        <script src="/vendors/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <script src="/js/jquery.js"></script>

        <link rel="icon" href="/images/favicon.ico">
        <?php $this->head() ?>
    </head>

    <?php $this->beginBody();?>

    <!-- BEGIN BODY -->
    <body class="fixed-topbar fixed-sidebar theme-sdtl color-default bg-light-dark">
    <!--[if lt IE 7]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <section>
        <!-- BEGIN SIDEBAR -->
        <div class="sidebar">
            <div class="logopanel">
                <h1><a href="/" class="no-pjax"><img src="/images/admin/logo.png" class="h-30" alt=""> <span class="w-500"><?=Yii::$app->name?></span></a></h1>
            </div>
            <div class="sidebar-inner">
                <div class="menu-title">Меню</div>
                <ul class="nav nav-sidebar">

                    <? foreach ($this->context->module->menu as $name => $menuItem):?>

                        <? if (is_array($menuItem)): // Если у нас категория ?>
                            <li class="nav-parent <?=in_array($this->context->id, $menuItem['items'])? "nav-active active": ""?>">
                                <a href="#"><i class="<?=$menuItem["icon"]?>"></i><span><?=$menuItem["title"]?></span> <span class="fa arrow"></span></a>
                                <ul class="children collapse" style="<?=in_array($this->context->id, $menuItem['items'])? "display: block;": ""?>">
                                    <? foreach ($menuItem["items"] as $itemName => $item):

                                        // Контроллер
                                        $controller = $this->context->module->controllers[$item];

                                        // Получаем класс бейджа и делаем выборку из модели с условиями
                                        $badge = !isset($controller["badge"]) ? null : Yii::createObject($controller["badge"]["model"])->find()->where($controller["badge"]["condition"])->count();
                                        ?>
                                        <li class=" <?= $itemName == $this->context->id? "nav-active active" : "" ?>"><a href="<?=Url::toRoute($controller["url"])?>"><?if ($badge):?> <span class="pull-right badge badge-primary"><?=$badge?></span><? endif;?>  <?=$controller["title"]?></a></li>
                                    <? endforeach; ?>
                                </ul>
                            </li>
                        <? else:
                            // Контроллер
                            $controller = $this->context->module->controllers[$menuItem];
                            // Бейдж
                            $badge = !isset($controller["badge"]) ? null : Yii::createObject($controller["badge"]["model"])->find()->where($controller["badge"]["condition"])->count();
                            ?>
                            <li class=" <?= $menuItem == $this->context->id? "nav-active active" : "" ?>">
                                <a href="<?=Url::toRoute($this->context->module->controllers[$menuItem]["url"])?>">
                                    <?if ($badge !== null):?><span class="pull-right badge badge-primary m-t-2"><?=$badge?></span><? endif;?>
                                    <i class="<?=$this->context->module->controllers[$menuItem]["icon"]?>"></i>
                                    <span><?=$this->context->module->controllers[$menuItem]["title"]?></span>

                                </a>
                            </li>
                        <?endif;?>

                    <? endforeach?>
                </ul>

            </div>
        </div>

        <div class="main-content">
            <div class="topbar">
                <div class="header-left">
                    <div class="topnav">
                        <a class="menutoggle" href="#" data-toggle="sidebar-collapsed"><span class="menu__handle"><span>Menu</span></span></a>
                        <ul class="nav nav-icons">
                            <li><a href="<?=Url::toRoute(['/admin/users/view', 'id' => Yii::$app->user->id])?>" class=""><span class="icon-user"></span></a></li>

                        </ul>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="header-menu nav navbar-nav">

                        <li id="quickview-toggle"><a href="<?=Url::toRoute("settings/index")?>"><span class="c-dark no-pjax">Настройки</span></a></li>
                        <li id="quickview-toggle"><a href="<?=Url::toRoute("/")?>"><span class="c-dark no-pjax">На сайт</span></a></li>
                        <li id="quickview-toggle"><a data-method="post" href="<?=Url::toRoute("/auth/logout")?>"><span class="c-dark no-pjax">Выход</span></a></li>
                    </ul>
                </div>
            </div>

            <div class="page-content" style="min-height: calc(100vh - 50px);" >
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-danger hidden" id="adBlock">Мы обнаружили, что у вас включен <strong>AdBlock</strong>. Для корректной работы необходимо добавить сайт в исключения.</div>
                        <div id="pjax-container">
                            <?= $content ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="confirm-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-embossed" data-action="cancel" data-dismiss="modal">Отмена</button>
                    <button type="button" class="btn btn-primary btn-embossed" data-action="success" data-dismiss="modal">Удалить</button>
                </div>
            </div>
        </div>
    </div>

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
    <script src="/js/admin/advert.js"></script> <!-- Visible in Viewport -->
    <? $this->registerJsFile("/js/admin/main.js"); ?>

    <script>
        $(document).ready(function() {
            $(document).pjax('a:not(.no-pjax):not(.sort-link)', '#pjax-container', {
                timeout : 100000,
                parseJs: true
            }).on("pjax:end",function(x,s) {
                baseInit();

                window.setTimeout(function() {
                    unblockUI($(".page-content"));
                }, 100);

                //window.stop()
            }).on("pjax:beforeSend", function() {
                blockUI($(".page-content"))
            });

           $(document).on("submit", ".grid-view form", function(event) {

                $.pjax.submit(event, '#pjax-container', {
                    timeout : 100000,
                    parseJs: true
                });
            });

        })
    </script>

    </body>
    </html>

<?php $this->endPage() ?>