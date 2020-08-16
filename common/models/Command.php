<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "command".
 *
 * @property int $id
 * @property int $command_parent_id ID команды верхнего уровня
 * @property string $name Название
 * @property string $answer Ответ бота на команду
 * @property string $comment Комментарий
 * @property int $counter Счетчик кликабельности команды
 * @property int $created_at Создано
 * @property int $updated_at Обновлено
 */
class Command extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'command';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['command_parent_id', 'counter'], 'integer'],
            [['name'], 'required'],
            [['answer'], 'string'],
            [['name', 'comment'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'command_parent_id' => 'Команда "родитель"',
            'name' => 'Название',
            'answer' => 'Ответ бота на команду',
            'comment' => 'Комментарий',
            'counter' => 'Счетчик кликабельности команды',
            'created_at' => 'Создано',
            'updated_at' => 'Обновлено',
        ];
    }

    /**
     * Геттер массив команд
     * @return array
     */
    public static function getCommandArray()
    {
        $commands = self::find()->all();
        return ArrayHelper::map($commands, 'id', 'name');
    }
}
