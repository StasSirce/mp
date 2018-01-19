<?php


/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\assets\AppAsset;
use app\assets\MakeAsset;



AppAsset::register($this);
MakeAsset::register($this);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?=$this->title?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="/images/favicon.ico">
    <?php $this->head() ?>
</head>
<body class="account2" data-page="login">
<?php $this->beginBody();?>


<?=$content?>



<p class="account-copyright">
    <span>Copyright © <?=date("Y");?> </span><span>Enso Lab. Все права защищены.</span>
</p>



<?php $this->endBody() ?>
<script src="/vendors/plugins/jquery/jquery-migrate-1.2.1.min.js"></script>
<script src="/vendors/plugins/gsap/main-gsap.min.js"></script>
<script src="/vendors/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="/vendors/plugins/backstretch/backstretch.min.js"></script>
<script src="/vendors/plugins/bootstrap-loading/lada.min.js"></script>
<script src="/vendors/plugins/icheck/icheck.min.js"></script> <!-- Icheck -->

<script>

    function handleiCheck() {

        if (!$().iCheck)  return;
        $(':checkbox:not(.js-switch, .switch-input, .switch-iphone, .onoffswitch-checkbox, .ios-checkbox, .md-checkbox), :radio:not(.md-radio)').each(function() {

            var checkboxClass = $(this).attr('data-checkbox') ? $(this).attr('data-checkbox') : 'icheckbox_minimal-grey';
            var radioClass = $(this).attr('data-radio') ? $(this).attr('data-radio') : 'iradio_minimal-grey';

            if (checkboxClass.indexOf('_line') > -1 || radioClass.indexOf('_line') > -1) {
                $(this).iCheck({
                    checkboxClass: checkboxClass,
                    radioClass: radioClass,
                    insert: '<div class="icheck_line-icon"></div>' + $(this).attr("data-label")
                });
            } else {
                $(this).iCheck({
                    checkboxClass: checkboxClass,
                    radioClass: radioClass
                });
            }
        });
    }


    $(document).ready(function() {
        handleiCheck()
        $.backstretch([
            "/images/auth/login/login4.jpg",
            "/images/auth/login/login.jpg",
            "/images/auth/login/login3.jpg",
            "/images/auth/login/login2.jpg",
            "/images/auth/login/login5.jpg"
        ], {
            fade: 600,
            duration: 4000
        });
    })
</script>
</body>
</html>
<?php $this->endPage() ?>