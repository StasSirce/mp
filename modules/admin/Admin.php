<?php

namespace app\modules\admin;
use \yii\base\Module;
use \app\models;

class Admin extends Module {

    // Контроллеры, которые могут использоваться в админке
    public $controllers = [

        "default" => [
            "url" => ["/admin"],
            "title" => "Главная",
            "icon" => "icon-home",
        ],

        "meta-tags" => [
            "url" => ["/admin/meta-tags"],
            "title" => "Мета-теги"
        ],

        "users" => [
            "url" => ["/admin/users/"],
            "title" => "Пользователи",
            "icon" => "fa fa-group",
            "badge" => [
                "model" => 'app\models\Users',
                "condition" => ["status" => 1]
            ]
        ],

        "settings" => [
            "url" => ["/admin/settings/"],
            "title" => "Настройки",
            "icon" => "fa fa-group",
        ],

        "order" => [
            "url" => ["/admin/order/"],
            "title" => "Заказы",
            "icon" => "fa fa-group",
        ],
        "video" => [
            "url" => ["/admin/video/"],
            "title" => "Видео",
            "icon" => "fa fa-group",
        ],

    ];

    /**
     * @var array
     *
     * Пункты меню для отображения в layout. Формат:
     *
     * "default" => [
     *      "items" => ["card", "users"], - перечисление контроллеров из $this->controllers
     *      "icon" => "glyphicon glyphicon-off", - класс иконки, который получит категория
     *      "title" => "Пользователи" - название категории
     * ],
     *
     * Можно просто указать "users" для отображения контроллера без категории
     */
    public $menu = [
        /*"default" => [
            "items" => ["users", "users"],
            "icon" => "glyphicon glyphicon-off",
            "title" => "Пользователи"
        ],*/

        "default",
        "users",
        "order",
        "video"
    ];
}