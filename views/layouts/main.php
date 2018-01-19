<?php


/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Settings;
use app\models\Users;

AppAsset::register($this);

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=600px">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="/images/favicon.png">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <script src="https://code.jquery.com/jquery-2.1.4.min.js" type="application/javascript"></script>
    <script src="/js/main.js" type="application/javascript"></script>
    <?  ?>
    <?php $this->head() ?>
</head>
<body>


<?php $this->beginBody();?>

<aside class="">



    <div class="menu">
        <a href="#header">Главная</a>
        <a href="#about_us">О нас</a>
        <a href="#tastes">Линейка вкусов</a>
        <a href="#reviews">Обзоры</a>
        <a href="#map">Где купить</a>
        <a href="#contact">Контакты</a>
        <a class="logo" href="#top">
            <img src="/images/site/menu_logo.png" alt="">
        </a>

        <div class="social">
            <a href="https://www.instagram.com/mainpeoplejuice/ " target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="" target="_blank"><i class="fa fa-vk" aria-hidden="true"></i></a>
            <a href="https://www.facebook.com/mainpeoplejuice/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        </div>
    </div>



</aside>

<main>
    <div class="burger">
        <div class="svg">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 130.4 26.9" style="enable-background:new 0 0 130.4 26.9;" xml:space="preserve">
                <g>
                    <g>
                        <rect x="35.5" y="1.1" class="st0" width="30.4" height="5"/>
                        <rect x="35.5" y="11.1" class="st0" width="30.4" height="5"/>
                        <rect x="35.5" y="21.1" class="st0" width="30.4" height="5"/>
                    </g>
                    <g>
                        <path class="st0" d="M22.6,0.9h2V26h-5.4V12.4l-6.4,7.9H12l-6.4-7.9V26H0.2V0.9h2l10.2,11.9L22.6,0.9z"/>
                        <path class="st0" d="M82.5,12v14.3h-5.4V1.1h1.7l14.3,14.3V1.2h5.4v25.1h-1.6L82.5,12z"/>
                        <path class="st0" d="M110,17.9V1.2h5.4v16.6c0,2.7,2.2,4,4.7,4s4.7-1.4,4.7-4V1.2h5.4v16.7c0,5.6-4.7,8.7-10.1,8.7
                S110,23.6,110,17.9z"/>
                    </g>
                </g>
            </svg>
        </div>




    </div>

    <div class="close_x">
        <img src="/images/site/index/close.png" alt="">
    </div>

    <?= $content ?>
</main>
<footer>

</footer>




<footer class="footer">

</footer>

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter<?=Settings::get("yandex_counter");?> = new Ya.Metrika({
                    id:<?=Settings::get("yandex_counter");?>,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/34484650" style="position:absolute; left:-9999px;" alt="" /></div></noscript>


<!-- /Yandex.Metrika counter -->


<?php $this->endBody() ?>

<script src="vendors/plugins/typed/typed.js"></script>


</body>
</html>
<?php $this->endPage() ?>
