<?php
/**
 * Created by PhpStorm.
 * User: antonfedorov
 * Date: 15/10/2019
 * Time: 10:50
 */

namespace backend\models\UserCommandHistory;


use \common\models\UserCommandHistory as BaseUserCommandHistory;
use yii\helpers\VarDumper;

/**
 * Class UserCommandHistory
 * @package backend\models\UserCommandHistory
 */
class UserCommandHistory extends BaseUserCommandHistory
{
    /**
     * Добавление записи
     *
     * @param $user_id
     * @param $command_id
     * @return bool
     */
    public function add($user_id, $command_id)
    {
        $user_command_history = new UserCommandHistory();
        $user_command_history->user_id = $user_id;
        $user_command_history->command_id = $command_id;
        $user_command_history->created_at = time();
        $user_command_history->updated_at = time();
        return $user_command_history->save();
    }
}