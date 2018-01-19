<?php

namespace app\models;
use yii\base\NotSupportedException;
use Yii;
use app\components\Model;
use app\components\behaviors\FileBehavior;


class Users extends Model implements \yii\web\IdentityInterface {

    const ROLE_USER = 10;
    const ROLE_MODERATOR = 20;
    const ROLE_ADMIN = 30;

    public static function tableName(){
        return 'users';
    }

    public $roles = [
        'admin' => 'Администратор',
        'user' => 'Пользователь',
    ];

    public $statuses = [
        'Неактивен',
        'Активен',
    ];

    public function rules() {

        return [
            [['login', "password", 'role', 'status'], 'required', 'on' => ["create"]],
            [['login', 'role', 'status'], 'required', 'on' => ["update"]],
            [['status'], 'integer'],
            [['login'], 'unique'],
            [['login'], 'string', 'max' => 15],
            [['password'], 'string', 'max' => 20],
            [['password'], 'string', 'min' => 6],
            [['login'], 'string', 'min' => 4],
            [['role'], 'string', 'max' => 10],
            [["login", "password"], "safe"]
        ];
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'login' => 'Логин',
            'password' => 'Пароль',
            'status' => 'Активен',
            'role' => 'Роль',
            'photo' => 'Фотография',
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return array_merge(parent::behaviors(), [
            'file' => [
                'class' => FileBehavior::className(),
                'attributes' => [
                    'photo' => ['type' => 'image', 'size'=> [300, 300],'thumbnail' => [150, 150]]
                ]
            ]
        ]);
    }

    /**
     * Модули, на которые будет осуществляться переход после логина пользователя с ролью
     * @var array
     */
    public static $modules = [
        "admin" => ["/admin"],
        //"user" => ["profile/default/index"],
    ];

    /**
     * @inheritdoc
     */

    public static function findIdentity($id) {
        return static::findOne(['id' => $id]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null) {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByLogin($login) {
        return static::findOne(['login' => $login]);
    }

    /**
     * @inheritdoc
     */
    public function getId() {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey() {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey) {
        return $this->getAuthKey() === $authKey;
    }

    public function generateAuthKey() {
        $this->auth_key = Yii::$app->getSecurity()->generateRandomString();
    }

    /**
     * Хэширует пароль
     * @param bool $insert
     * @return bool
     * @throws \yii\base\Exception
     */
    public function beforeSave($insert) {
        $old = $this->getOldAttribute("password");
        $new = $this->getAttribute("password");
        if (!empty($new) != "") {
            $this->password = Yii::$app->getSecurity()->generatePasswordHash($new);
        } else {
            $this->password = $old;
        }

        if ($insert) $this->generateAuthKey();
        return parent::beforeSave($insert);
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password) {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

}
