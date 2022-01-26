<?php

namespace app\models;

use yii\base\BaseObject;
use yii\web\IdentityInterface;

class User extends BaseObject implements IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;

    private static $users = [
        '100' => [
            'id' => '100',
            'username' => 'vc0042',
            'password' => 'art3016',
            'authKey' => '0', // 0 - администратор, 1 - инспектор, 2 - архивист
            'accessToken' => 'Соколовский Р.И.',
        ],
        '101' => [
            'id' => '101',
            'username' => 'td0718',
            'password' => 'qwe0123',
            'authKey' => '2', // 0 - администратор, 1 - инспектор, 2 - архивист
            'accessToken' => 'Палатова Т.В.',
        ],
        '102' => [
            'id' => '102',
            'username' => 'td0715',
            'password' => 'gan0715',
            'authKey' => '0', // 0 - администратор, 1 - инспектор, 2 - архивист
            'accessToken' => 'Гуторов А.Н.',
        ],
        '103' => [
            'id' => '103',
            'username' => 'td0708',
            'password' => 'asd0147',
            'authKey' => '0', // 0 - администратор, 1 - инспектор, 2 - архивист
            'accessToken' => 'Леонтьев К.Е.',
        ],
        '104' => [
            'id' => '104',
            'username' => 'td0711',
            'password' => 'dvm5986',
            'authKey' => '1', // 0 - администратор, 1 - инспектор, 2 - архивист
            'accessToken' => 'Шевчук Т.А.',
        ],
        '105' => [
            'id' => '105',
            'username' => 'td0719',
            'password' => 'tgb0613',
            'authKey' => '1', // 0 - администратор, 1 - инспектор, 2 - архивист
            'accessToken' => 'Поникаева М.И.',
        ],
        '106' => [
            'id' => '106',
            'username' => 'td6472',
            'password' => 'ekr8699',
            'authKey' => '2', // 0 - администратор, 1 - инспектор, 2 - архивист
            'accessToken' => 'Демко Ю.А.',
        ],
    ];

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}