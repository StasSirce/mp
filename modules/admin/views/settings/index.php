<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use app\models\Settings;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>

<h2>Настройки</h2>

<div class="row">
    <div class="col-md-6 col-lg-6 col-xlg-4">
        <div class="panel">
            <div class="panel-header header-line">
                <h3>Доступ к <strong>Yandex Metrika</strong></h3>
            </div>
            <div class="panel-content">
                <p>
                    Укажите здесь <b>oauth_token</b> для доступа к счетчикам вашего аккаунта yandex.
                    Для получения токена воспользуйтесь <a href="https://oauth.yandex.ru/authorize?response_type=token&client_id=342e8529f69b4cb497e87836052df7fa" >авторизацией</a>.
                    <br> <br>
                    Счетчик автоматически будет подключен к сайту, а информация о посещениях будет отображена на главной странице панели администратора.
                </p>

                <form class="form-horizontal" id="yandex-metrika-form">
                    <div class="form-group">
                        <label class="col-sm-4 control-label"><?=Settings::title("yandex_token")?></label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="yandex_token" value="<?=Settings::get("yandex_token")?>" placeholder="OAuth-токен Yandex">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label"><?=Settings::title("yandex_counter")?></label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="yandex_counter" value="<?=Settings::get("yandex_counter")?>" placeholder="ID счетчика">
                        </div>
                    </div>
                </form>

            </div>
            <div class="panel-footer clearfix">
                <div class="pull-right">
                    <button type="button" class="btn btn-primary ladda-button btn-save" data-style="expand-right" data-id="yandex" >Сохранить</button>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-6 col-xlg-4">
        <div class="panel">
            <div class="panel-header header-line">
                <h3>Настройки <strong>сайта</strong></h3>
            </div>
            <div class="panel-content">

                <p>
                    Вы можете самостоятельно изменить некоторые настройки сайта. <br>
                </p>

                <h3><strong>Мета-теги</strong> сайта</h3>

                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-6">
                        <p>
                            Позволяют управлять служебной информацией сайта
                        </p>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-6">
                        <a href="<?= Url::toRoute(["/admin/meta-tags"])?>" class="btn btn-block btn-primary">Редактировать</a>
                    </div>
                </div>

            </div>
            <div class="panel-footer clearfix">
                <div class="pull-right">
                    <button type="button" class="btn btn-primary ladda-button btn-save" data-style="expand-right" data-id="yandex" >Сохранить</button>
                </div>
            </div>
        </div>
    </div>

</div>

<script>

    var saveButtons = {};
    $(document).ready(function() {

        $(".btn-save").each(function() {
            saveButtons[$(this).data("id")] = Ladda.create(this);
        }).click(function() {

            var form = $(this).parents(".panel").find("form");

            var btn = this;
            var ladda = saveButtons[$(btn).data("id")];
            ladda.start();

            $.ajax({
                url: "<?=Url::toRoute("settings/save")?>",
                type: "post",
                data: $(form).serialize(),
                success: function(data) {
                    console.log(data);
                    $(btn).html("Сохранено").removeClass("btn-primary").addClass("btn-success");
                    ladda.stop();
                }
            })
        })

        var params = $.deparam.fragment();
        if (params.access_token) {
            $("input[name='yandex_token").val(params.access_token);
            $(".btn-save[data-id='yandex'").click()
        }


    })
</script>
