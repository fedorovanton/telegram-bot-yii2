<?php
/**
 * Created by PhpStorm.
 * User: antonfedorov
 * Date: 01/04/2019
 * Time: 22:45
 */

namespace backend\models\User;

use \common\models\User as BaseUser;

/**
 * Class User
 * @package backend\models\User
 */
class User extends BaseUser
{
    public function beforeSave($insert)
    {
        if ($this->password) {
            $this->setPassword($this->password);
        }
        return parent::beforeSave($insert);
    }
}