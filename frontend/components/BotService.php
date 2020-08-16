<?php
/**
 * Created by PhpStorm.
 * User: antonfedorov
 * Date: 26/02/2019
 * Time: 14:55
 */

namespace frontend\components;


use backend\models\UserCommandHistory\UserCommandHistory;
use common\models\User;
use frontend\models\Command\Command;
use yii\helpers\VarDumper;

/**
 * Class BotService
 * @property string $answer_text
 * @property array $answer_keyboard
 * @property array $answer_inline_keyboard
 * @package frontend\components
 */
class BotService
{
    const COMMAND_MY_ID = '/id';

    /**
     * Данные декодированые из json
     * @var
     */
    protected $data;

    /**
     * Идентификатор отправителя сообщения
     * @var
     */
    protected $from_id;

    /**
     * Идентификатор чата
     * @var
     */
    protected $chat_id;

    /**
     * Текст отправителя
     * @var
     */
    protected $text;

    /**
     * Текст ответа от бота
     * @var string
     */
    protected $answer_text = '';

    /**
     * Клавиатура от бота [['команда1'],['команда2']]
     * @var array
     */
    protected $answer_keyboard = [];

    /**
     * Клавиатура от бота
     * @var array
     */
    protected $answer_inline_keyboard = [];

    /**
     * BotService constructor.
     * @param array $array_data
     */
    public function __construct(array $array_data)
    {
        $this->from_id = $array_data['message']['from']['id'];
        $this->chat_id = $array_data['message']['chat']['id'];
        $this->text = $array_data['message']['text'];
    }

    /**
     * Отправить сообщение от бота, что доступ закрыт
     */
    public function sendAccessClosed()
    {
        $telegram = new TelegramAPI([
            'chat_id' => $this->from_id,
            'text' => 'Доступ к боту закрыт. Принадлежит: vladislavkozachenko',
        ]);
        $telegram->sendMessage();
    }

    /**
     * Отправить сообщение от бота, что команда не определена
     */
    public function sendNotDefined()
    {
        $telegram = new TelegramAPI([
            'chat_id' => $this->from_id,
            'text' => 'Команада не определена. Напишите другую команду.',
        ]);
        $telegram->sendMessage();
    }

    /**
     * Отправить сообщение от бота c клавиатурой
     */
    public function sendWithKeyboard()
    {
        $KeyboardButton = [
            'keyboard' => $this->answer_keyboard,
            'one_time_keyboard' => true,
        ];
        $telegram = new TelegramAPI([
            'chat_id' => $this->from_id,
            'text' => $this->answer_text,
            'reply_markup' => json_encode($KeyboardButton),
            'parse_mode' => 'Markdown'
        ]);
        $telegram->sendMessage();
    }

    /**
     * Отправить сообщение от бота c inline-клавиатурой
     */
    public function sendWithInlineKeyboard()
    {
        /**
         * [
        ['text' => 'Кнопка 1', 'url' => 'https://vk.com', 'callback_data' => '', 'switch_inline_query' => ''],
        ['text' => 'Кнопка 2', 'url' => 'https://skyflo.ru', 'callback_data' => '', 'switch_inline_query' => ''],
        ]
         */
        $InlineKeyboardButton = [
            'inline_keyboard' => [
                $this->answer_inline_keyboard
            ]
        ];
        $telegram = new TelegramAPI([
            'chat_id' => $this->from_id,
            'text' => $this->answer_text,
            'reply_markup' => json_encode($InlineKeyboardButton),
            'parse_mode' => 'Markdown'
        ]);
        $telegram->sendMessage();
    }

    /**
     * Отправить простое сообщение от бота (без клавиатуры)
     */
    public function sendSimpleMessage()
    {
        $RemoveKeyboardButton = [
            'remove_keyboard' => true,
        ];
        $telegram = new TelegramAPI([
            'chat_id' => $this->chat_id,
            'text' => $this->answer_text,
            'reply_markup' => json_encode($RemoveKeyboardButton),
            'parse_mode' => 'Markdown'
        ]);
        $telegram->sendMessage();
    }

    /**
     * @param $commands
     * @return array
     */
    public function createKeyboard($commands)
    {
        $array = [];
        foreach ($commands as $command) {
            $array[] = [$command->name];
        }
        return $array;
    }

    /**
     * Может ли пользователь использовать бот?
     * @return bool
     */
    public function canUseBot()
    {
        return User::find()->where(['telegram_user_id' => $this->from_id])->exists();
    }

    /**
     * Запуск обработчика бота
     */
    public function run()
    {
        /** @var Command $command_answer */
        $command_answer = Command::getCommandByName($this->text);

        if (!empty($command_answer)) {

            $this->answer_text = $command_answer->answer;

            // Команда "Отправляет ID обратно ему в чат"
            if ($this->text == self::COMMAND_MY_ID) {
                $this->answer_text .= ' '. $this->from_id;
                $this->sendSimpleMessage();
                return 'OK';
            }

            // Проверка доступа к боту
            if (!$this->canUseBot()) {
                $this->sendAccessClosed();
                return 'OK';
            }

            // Увеличить счетчик, кликабельности команды
            $command_answer->updateCounters(['counter' => 1]);

            /** @var User $user */
            $user = User::getUserByTelegramUserId($this->from_id);

            // Добавить использование команды пользователем в историю
            $user_command_history = new UserCommandHistory();
            $user_command_history->add($user->id, $command_answer->id);

            // Есть ли еще иерархия у команды?
            $commands = Command::getCommandsByParentId($command_answer->id);
            if (!empty($commands)) {
                $this->answer_keyboard = $this->createKeyboard($commands);
                $this->sendWithKeyboard();
                return 'OK';
            } else {
                $this->sendSimpleMessage();
                return 'OK';
            }
        } else {
            // TODO раскомментировать, чтобы работал AI Eva
            /*$eva = new AiEva($this->text);
            $this->answer_text = $eva->getPhrase();
            $this->sendSimpleMessage();
            $this->sendNotDefined();*/
            return 'OK';
        }
    }
}