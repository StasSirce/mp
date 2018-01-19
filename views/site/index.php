<?php
/* @var $this app\components\View */


use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Order;
use app\assets\Owl2Asset;
use app\models\Video;

Owl2Asset::register($this);

$this->title = 'Главная страница';

$this->registerJsFile("/js/index.js");
$this->registerCssFile("/css/ui.css");
$this->registerScssFile("/css/site/index.scss");

$this->registerJsFile("/js/pjax.js", [
   'depends' => \yii\web\JqueryAsset::className()
]);



?>

<svg width="620" height="620" xmlns="http://www.w3.org/2000/svg" class="svg-taste">
    <defs>
        <clipPath id="taste-clip-mask">
            <circle cx="310" cy="310" r="310"/>
        </clipPath>
    </defs>
</svg>

<div id="index-page" name="top">
    <div id="header" name="header">
        <div class="contacts">
            <a href="tel:89999899915" class="phone">8 (999) 989 99 15</a>
            <div class="mail">
                opt@mainpeople.pro
            </div>
        </div>

        <div class="social">
            <a href="https://www.instagram.com/mainpeoplejuice/ " target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="" target="_blank"><i class="fa fa-vk" aria-hidden="true"></i></a>
            <a href="https://www.facebook.com/mainpeoplejuice/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        </div>

        <div class="container">
            <div class="logo">
                <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 503.21 282.79">
                    <defs>
                        <style>

                            .cls-2 {
                                fill: #f5f6f6;
                            }</style>
                    </defs>
                    <title>лого MP</title>
                    <path class="cls-1"
                          d="M336.08,53.34l-1.48,2.3,2.62-1.31h1.15q7.05,4.26,7.05,6.07,0,1.31-1,1.31,2.46,5.91,2.46,9.68h-1.48l1.48,2.3-1.48,2.46q4.1,0,5.09,15.75l2.3,2.46-1.31,6.23v9.35l1.31,7.38q-1.31,3.61-2.3,3.61,2.3,11.15,3.61,11.15l-1.31,2.13v6.07l1.31,5.91a1.16,1.16,0,0,0-1.31,1.31h2.46v2.62q-3.77,0-3.77,2.3l2.62-1.31h1.15l1.15,7.22q-1.15,3.77-2.3,3.77,1,4.76,2.3,4.76l-1.15,2.3v1.48l1.15,5.91-2.3-1.15a13.35,13.35,0,0,1,2.3,7.22v16.9a1,1,0,0,1-1.15,1.15l1.15,2.62v19.36a.87.87,0,0,0,1,1,18.1,18.1,0,0,0-1,3.61q-2.3,0-2.3-3.61Q344.61,228.53,342,231h-5.91Q313,225.08,313,221.31q0-6.89-3.77-16.9l2.46,1v-1q-4.76-5.25-4.76-9.84v-4.76l1.31-2.46h-1.31q0,1.31-1.15,1.31v-1.31a7.86,7.86,0,0,0,1.15-3.44l-2.3-1.31,1.15-2.3q-1.15-7.38-2.62-7.38,0-1.15,1.48-1.15a143.87,143.87,0,0,1-1.48-18,13.79,13.79,0,0,1,.49-2.62q.33-2,1-4.92-2.46,0-2.46-2.13h1a17.23,17.23,0,0,1-1-6.07h-1.31q-2.62,0-16.73,42.32-10.33,33.79-14.76,33.79l-5.91,2.62q-20.67-7.55-20.67-13.45,0-2.62-2.46-2.62,0-1.15,1.31-1.15l-1.31-2.3v-2.62h2.46v-2.13h-3.61q0-1.31,1.15-1.31-4.92-66.43-8.37-66.43h-1.48v7.38q-2.3,0-8.2,14.11-2.62.16-2.62,2.62,1.48,0,1.48,1.31-1.64,0-7.38,21.65-10,16.9-12.14,16.9,0,1.48-3.28,7.05h-2.62v-2.3h-1.31q0,2.13-7.22,4.92A1,1,0,0,0,186,197.2q0,2.3-2.46,2.3t-2.46-2.3q1.15,0,1.15-1.48h-1.15q0,2-4.92,3.77,0-2.3-14.27-4.92v-1.15l1.15-2.3h-1.15q0,1.31-1.48,1.31l-5.91-9.84v-6.07H152v-3.61h1.31l2.3,1.48v-2.62q-3.61,0-3.61-2.62.49-2.3,2.46-2.3a13.29,13.29,0,0,1-2.46-7.22l1.31-5.91a10.32,10.32,0,0,1-1.31-3.61,10.07,10.07,0,0,0,1.31-3.94l-2.3-4.76q1.64-2.46,3.44-14.6,0-1-1.15-1l2.3-17.06H154.5q1.15-3.61,2.62-3.61l-1.48-2.46q2.46-14.6,2.46-16.9h-1q0-4.76,12-5.91,0-1.48,1-1.48,0,1.48,1.31,1.48.49-2.46,2.46-2.46a94.73,94.73,0,0,0,9.68,1l2.46-1a20.21,20.21,0,0,0,9.68,2.46h3.77q0,2.46,2.13,2.46v5.91q7.22,6.73,7.22,8.37-4.26,0-7.22,9.84,0,1.15,1.31,1.15l-1.31,6.23a10.73,10.73,0,0,0,1.31,3.44l-4.59,18,2.13,1.31-1,2.46v3.77h2.13q0-3,9.84-17.06,5.09-12.14,18.37-30a8.71,8.71,0,0,1-1.48-5.09q16.4-8.37,22.8-8.37h1.48q8.69,0,13.29,10.83v10.66l-2.46-1.15,1.15,2.46V116h2.13l-4.76,9.84q1.48,10.83,4.76,10.83a10.42,10.42,0,0,1-.82,3.61q1,12.14,3.44,12.14,4.92-8.37,4.92-12.14v-4.92q4.43,0,4.76-8.53,1.31,0,7.38-15.42h-1.31a426.74,426.74,0,0,1,20.67-42.32V62.85l2.46,1.48V62.85l-1.31-2.46q16.57-7.05,22.8-7.05Zm-103,36.09v1.31h2.62V89.43Zm10.83-2.3v1.15h2.62V87.13Zm11,7.22v1.48h2.46V94.35ZM279,132.73v2.62h1.15v-2.62Zm35.1,64.47v1.15h2.46V197.2Zm1.31,2.3v2.62q2.46,0,2.46-2.62Zm36.09-31.33v2.46h1.31v-2.46Z"/>
                    <path class="cls-2"
                          d="M59.58,177.65H53.92l-.05-27.11L42.41,173.87h-4L27,150.53v27.11H21.21V141.35h7.26l12,24.11,11.93-24.11h7.21Z"/>
                    <path class="cls-2"
                          d="M103,169.45H84.67l-3.47,8.19H74.82l16-36.29h6.27L113,177.65h-6.53ZM100.64,164l-6.84-16.12L87,164Z"/>
                    <path class="cls-2" d="M134.28,177.65h-6.12V141.35h6.12Z"/>
                    <path class="cls-2" d="M185.65,177.65h-6l-19.34-26v26h-6.12V141.35h6l19.44,26.08V141.35h6Z"/>
                    <path class="cls-2"
                          d="M229.36,141.35h14.47c4.56,0,8.1,1.09,10.6,3.24s3.76,5.21,3.76,9.16q0,6.16-3.76,9.56t-10.6,3.4h-8.35v10.94h-6.12Zm6.12,5.5v14.36h8.09q8.76,0,8.76-7.32,0-7-8.76-7Z"/>
                    <path class="cls-2"
                          d="M300.54,146.86h-19.8v9.8h17.73v5.49H280.73v10h20.43v5.49H274.61V141.35h25.92Z"/>
                    <path class="cls-2"
                          d="M321.53,146.47a20.42,20.42,0,0,1,27.37,0,17.23,17.23,0,0,1,5.54,13,17.42,17.42,0,0,1-5.54,13.09,20.28,20.28,0,0,1-27.37,0A17.41,17.41,0,0,1,316,159.5,17.22,17.22,0,0,1,321.53,146.47Zm13.74.23a12.8,12.8,0,0,0-9.23,3.71,12.13,12.13,0,0,0-3.84,9.1,12.27,12.27,0,0,0,3.86,9.15,12.74,12.74,0,0,0,9.2,3.76,12.88,12.88,0,0,0,12.91-12.91,12.22,12.22,0,0,0-3.78-9.1A12.57,12.57,0,0,0,335.27,146.7Z"/>
                    <path class="cls-2"
                          d="M371.35,141.35h14.47c4.56,0,8.1,1.09,10.6,3.24s3.76,5.21,3.76,9.16q0,6.16-3.76,9.56t-10.6,3.4h-8.35v10.94h-6.12Zm6.12,5.5v14.36h8.09q8.76,0,8.76-7.32,0-7-8.76-7Z"/>
                    <path class="cls-2" d="M422.73,172.1h15.71v5.54H416.61V141.35h6.12Z"/>
                    <path class="cls-2"
                          d="M480.59,146.86h-19.8v9.8h17.73v5.49H460.78v10h20.43v5.49H454.66V141.35h25.92Z"/>
                </svg>

                <h3>vape liquid</h3>

            </div>
        </div>
        <a href="#contact" class="btn-price">
            Получить прайс-лист
        </a>
        <div id="scroll">

        </div>
        
    </div>

    <div id="about_us" name="about_us">

            <div class="row">
                <div class="col-md-6">
                    <div class="col-left">
                        <h1>О нас</h1>
                        <div class="title">
                            <img src="/images/site/index/yellow_text.png" alt="">
                        </div>

                        <p>
                            MAIN PEOPLE – это премиальная линейка жидкостей для вейпинга<br> по доступной цене.  Жидкость сделана из ингредиентов, произведенных в США, Англии, Франции и Индии. Все вкусы замешиваются, разливаются и упаковываются по 120 мл бутылочкам на территории фармацевтического завода.  Каждый флакон упакован<br> в термоусадочную пленку и дой-пак пакет с зип-локом и защитой <br>от вскрытия.
                        </p>


                        <img src="/images/site/index/elements.png" alt="">
                    </div>
                </div>
                <div class="col-md-6 no-padding">
                    <div class="col-right owl-carousel">
                        <div class="item i1">

                        </div>
                        <div class="item i2">

                        </div>
                        <div class="item i3">

                        </div>
                        <div class="item i4">

                        </div>
                        <div class="item i5">

                        </div>
                        <div class="item i6">

                        </div>
                        <div class="item i7">

                        </div>

                    </div>
                </div>
            </div>


    </div>

    <div id="tastes" name="tastes">
        <div class="container">
            <h1>Линейка вкусов</h1>
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="volume">
                        Объем:
                        <span>120 мл</span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="pg">
                        PG/VG
                        <span>30/70</span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="nicotine">
                        Никотин:
                        <span>0/1,5/3</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="pack">
                        <div class="pack-i">
                            <img src="/images/site/index/cosmo.png" alt="">
                        </div>
                        <div class="title">
                            <img src="/images/site/index/cosmo_txt.png" alt="">
                        </div>
                        <p>Космонавт</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="pack">
                        <div class="pack-i">
                            <img src="/images/site/index/inventor.png" alt="">
                        </div>
                        <div class="title">
                            <img src="/images/site/index/inventor_txt.png" alt="">
                        </div>
                        <p>Изобретатель</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="pack">
                        <div class="pack-i">
                            <img src="/images/site/index/chemist.png" alt="">
                        </div>
                        <div class="title">
                            <img src="/images/site/index/chemist_txt.png" alt="">
                        </div>
                        <p>Химик</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="pack">
                        <div class="pack-i">
                            <img src="/images/site/index/general.png" alt="">
                        </div>
                        <div class="title">
                            <img src="/images/site/index/general_txt.png" alt="">
                        </div>
                        <p>Генералиссимус</p>
                    </div>
                </div>
            </div>
            <p class="bottom_p">Мы используем только лучшие ингредиенты! Никотин -  BGP, PG/VG – USP, ароматизаторы – США, Англия, Франция.</p>
        </div>

    </div>

<?foreach ($order as $orders): ?>
    <div class="taste" name="taste" style=" background: url(<?=$orders->background?>),#f6f6f6;">

        <div class="line" style="background: #<?= $orders->color?>">
            <div class="btn-order" >
                <a href="#contact" data-color="<?= $orders->color?>">Заказать</a>
            </div>
        </div>
        <div class="container">
            <div class="info">
                <h1><?= $orders->title?></h1>
                <div class="desc">
                    <?= $orders->description?>
                </div>
            </div>
            <div class="circle">
                <div class="image" style='background: url("<?= $orders->photo?>");background-repeat: no-repeat;
                        background-position: center;
                        background-attachment: fixed'>

                </div>

            </div>
            <div class="title">
                <img src="<?= $orders->photo_title?>" alt="">
                <div class="txt"><?= $orders->taste?></div>
            </div>
            <div class="pack">
                <img src="<?= $orders->pack?>"" alt="">
            </div>
            <div class="pack2">
                <img src="<?= $orders->pack2?>"" alt="">
            </div>
            <div class="like" data-id="<?= $orders->id?>">
                <i class="fa fa-heart" aria-hidden="true"></i>
                <div class="number"><?= $orders->likes?></div>

            </div>
        </div>
    </div>
<? endforeach;?>

    <div id="reviews" name="reviews">
        <div class="container">
            <h1>Обзоры</h1>

            <div class="video">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <p class="new">Свежее:</p>
                        <iframe width="460" height="300" src="https://www.youtube.com/embed/<?=$video->src?>" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <div class="col-md-6">
                        <div class="info">
                            <div class="title">
                                <?=$video->title?>
                            </div>
                            <div class="date">
                                <?=$video->date?>
                            </div>
                        </div>
                       <div class="review">
                           <div class="text">
                               <?=$video->review?>
                           </div>
                           <div class="author">
                               <?=$video->author?>
                           </div>

                       </div>

                    </div>
                </div>
            </div>

            <hr>

            <div class="playlist">
               <div class="row">
                   <p>Подборка:</p>

                   <?foreach ($video_list as $list): ?>
                   <div class="col-md-6">
                        <? if ($list->type == 'video'): ?>
                        <a class="videoPl" data-id="<?=$list->id?>" href="<?=Url::toRoute(['site/index', 'video' => $list->id])?>">
                           <div class="image">
                               <img src="/images/site/index/play.png" alt="">
                           </div>
                           <div class="title">
                               <?=$list->title?>
                           </div>
                           <div class="date">
                               <?=$list->date?>
                           </div>
                        </a>

                       <? else : ?>

                       <a class="videoPl-text" href="<?=$list->src?>" target="_blank">
                           <div class="image">
                               <img src="/images/site/index/text.png" alt="">
                           </div>
                           <div class="title">
                               <?=$list->title?>
                           </div>
                           <div class="date" style="background: #00aea1">
                               <?=$video->date?>
                           </div>
                       </a>
                       <? endif; ?>

                   </div>

                   <? endforeach;?>
               </div>
            </div>
        </div>
    </div>

    <div id="map" name="map">
        <div class="container">
            <h1>Где купить?</h1>
            <div class="marker">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
            </div>
            <div class="name-shop">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <ul>
                            <li class="title">Москва</li>
                            <li><a href="https://vk.com/loftvapeshop" target="_blank">Loftvapeshop</a></li>
                            <li><a href="https://vk.com/club131199606" target="_blank">City-Vape</a></li>
                            <li><a href="https://vk.com/vapestore_cafe" target="_blank">Vape Store Café</a></li>
                            <li><a href="http://par-store.ru" target="_blank">Vape Shop Par Store</a></li>
                            <li><a href="https://vk.com/zheldorvapers" target="_blank">Vape Shop Парок</a></li>
                            <li><a href="https://vk.com/zhizha_station" target="_blank">Жижа Стейшн</a></li>
                            <li><a href="https://vk.com/generation_cloud" target="_blank">Генерация Облаков</a></li>
                            <li><a href="https://vk.com/cc217" target="_blank">Cloud Crew</a></li>
                            <li><a href="http://vapelab.ru" target="_blank">Vape Lab</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <ul>
                            <li class="title">Санкт-Петербург</li>
                            <li><a href="https://vk.com/abc_vape" target="_blank">Alphabet Loftshop</a></li>
                            <li><a href="http://www.safesmoking.ru" target="_blank">SafeSmoking</a></li>
                            <li><a href="https://vk.com/wnvapeshop" target="_blank">Why not vape?</a></li>
                            <li><a href="https://vk.com/vaperoom6040" target="_blank">Вейпбар Vaperoom 60/40 </a></li>
                            <li><a href="https://vk.com/pgvgcafe" target="_blank">Вейп-кафе PGVG</a></li>
                            <li><a href="http://cbvape.ru" target="_blank">CB Vape</a></li>
                            <li><a href="https://vk.com/vapeme_shop" target="_blank">Vape Me</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <ul>
                            <li class="title">Челябинск</li>
                            <li><a href="https://vk.com/cloud__room" target="_blank">cloud_room74</a></li>
                            <li class="title" style="margin-top: 25px">Иркутск</li>
                            <li><a href="http://www.i-smok.ru" target="_blank">ismokguru</a></li>
                            <li><a href="http://e-kalyan.ru" target="_blank">sib vape shop</a> </li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <ul>
                            <li class="title">Сургут</li>
                            <li><a href="https://vk.com/vapeshopsurgut" target="_blank">Панда Вейп</a></li>
                            <li class="title" style="margin-top: 25px">Нижний Новгород</li>
                            <li><a href="https://vk.com/soyzvapeclub" target="_blank">Союз Вейп бар </a> </li>
                        </ul>
                    </div>
                </div>

            </div>
            <p class="shop">Если вашего вейп-шопа нет в списке, напишите на <span>opt@mainpeople.pro</span></p>


        </div>
    </div>

    <div id="contact" name="contact">
        <div class="container">
            <h1>Контакты</h1>
            <div class="row">
                <div class="col-md-5 col-sm-12">
                    <?php $form = ActiveForm::begin(['options' => ['id' => 'PriceForm']]); ?>

                    <?= $form->field($model, 'name',['enableLabel' => false])->textInput(['class' => 'name','placeholder' => 'Имя','maxlength' => true])->label('') ?>
                    <?= $form->field($model, 'email',['enableLabel' => false])->textInput(['class' => 'email','placeholder' => 'Email','maxlength' => true])->label('') ?>

                    <?= Html::submitButton('Получить прайс-лист') ?>
                    <?php ActiveForm::end(); ?>
                </div>
                <div class="col-md-7">
                    <div class="contacts">
                        <a href="tel:89999899915" class="phone"><i class="fa fa-phone" aria-hidden="true"></i>8 (999) 989 99 15</a>
                        <div class="email"><i class="fa fa-envelope-o" aria-hidden="true"></i>opt@mainpeople.pro</div>
                    </div>

                </div>
            </div>


            <div class="social">
                <a href="https://www.instagram.com/mainpeoplejuice/ " target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="" target="_blank"><i class="fa fa-vk" aria-hidden="true"></i></a>
                <a href="https://www.facebook.com/mainpeoplejuice/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            </div>
            
            <div id="scroll_top">
                <img src="/images/site/index/scroll-top.png" alt="">
            </div>
            
            <a href="#top" class="logo">
                <img src="/images/site/index/logo-bottom.png" alt="">
            </a>
            
            <a href="zbs.ensolab.ru" target="_blank" class="logo-zbc">
                <img src="/images/site/index/logo-zbc.png" alt="">
            </a>

            <div class="copyright">
                © Майн Пипл 2015. Все права защищены.<br>
                Сайт разработан креативной командой <span>ZBSDesign.ru</span>
            </div>

            <div class="design-txt">
                Design by ZBS Design
            </div>
        </div>



        </div>
    </div>

</div>


