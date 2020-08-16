<?php
/**
 * Created by PhpStorm.
 * User: antonfedorov
 * Date: 26/02/2019
 * Time: 15:14
 */

namespace frontend\models\Command;

use \common\models\Command as BaseCommand;

/**
 * Class Command
 * @package frontend\models\Command
 */
class Command extends BaseCommand
{
    /**
     * Получить команду по названию
     * @param string $command
     * @return array|null|\yii\db\ActiveRecord
     */
    public static function getCommandByName(string $command)
    {
        return self::find()->where(['name' => $command])->one();
    }

    /**
     * Получить команды потомники по команде родительской
     * @param int $id
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getCommandsByParentId(int $id)
    {
        return self::find()->where(['command_parent_id' => $id])->all();
    }
}