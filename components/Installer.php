<?php
/**
 * Created by PhpStorm.
 * User: Mike Finch
 * Date: 29.10.2016
 * Time: 5:32
 */

namespace app\components;


class Installer {

    private static $servername = "localhost";
    private static $username = "root";
    private static $password;
    private static $connect;

    public static function run($event) {

        $answer = self::input("Создать базу данных и пользователя? (Y|N)");
        if(!in_array($answer, ["YES", "yes", "y", "Y"])) exit;

        do{
            self::$password = self::input("Root-пароль к базе данных:");
            try{
                self::$connect = new \mysqli(self::$servername, self::$username, self::$password);
                $connected = true;
            } catch(\ErrorException $e) {
                echo "\nНеверный пароль";
                $connected = false;
            }

        } while(!$connected);

        $dbName = self::input("Название базы данных:");
        $userName = self::input("Имя пользователя:");
        $password = self::input("Пароль пользователя:");


        if (self::createDB($dbName)) echo "1. Database created successfully\n";
        if (self::createUser($userName, $password, $dbName)) echo "2. User created successfully\n";
        if (self::setDbConfig($userName, $password, $dbName)) echo "3. DB config updated\n";

    }

    public static function createDB($name) {
        $sql = "CREATE DATABASE ".$name." CHARACTER SET utf8 COLLATE utf8_general_ci;";
        return self::$connect->query($sql);
    }

    public static function createUser($name, $password, $dbName) {
        $sql = "CREATE USER '$name'@'localhost' IDENTIFIED BY '$password';";
        self::$connect->query($sql);

        $sql = "GRANT ALL PRIVILEGES ON $dbName.* TO '$name'@'localhost';";
        return self::$connect->query($sql);
    }

    public static function setDbConfig($name, $password, $dbName) {
        $config = self::getConfigTemplate();
        $config = str_replace(['{dbName}','{user}', '{password}'], [$dbName, $name, $password], $config);
        return file_put_contents(__DIR__."/../config/db.php", $config);
    }

    public static function getConfigTemplate() {
        return "<?php

return [
    'class' => 'yii\\db\\Connection',
    'dsn' => 'mysql:host=localhost;dbname={dbName}',
    'username' => '{user}',
    'password' => '{password}',
    'charset' => 'utf8',
];
 ";
    }

    public static function input($query) {
        echo "\033[32m \n$query\e[0m";
        $input = fopen ("php://stdin","r");
        return str_replace(array("\r", "\n"), '', fgets($input));
    }

}