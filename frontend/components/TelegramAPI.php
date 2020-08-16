<?php
/**
 * Created by PhpStorm.
 * User: antonfedorov
 * Date: 26/02/2019
 * Time: 15:28
 */

namespace frontend\components;

use Yii;

/**
 * Class TelegramAPI
 *
 * Установить webhook, перейти по ссылку
 * @link https://api.telegram.org/bot218971853:AAGtwzplLtyY_G8_QAQywY5ZhFeSlgVOvX0/setWebhook?url=https://acdbot.ru/api/hook
 * @link https://api.telegram.org/bot635269855:AAGYlVYi9i-IALb6CfdL0AzwKbo889Ug6Hw/setWebhook?url=https://acdbot.ru/api/hook
 * @package frontend\components
 */
class TelegramAPI
{
    private $api_url = 'https://api.telegram.org/bot';
    private $token;

    public $parameters = [];
    /*
    Образец кнопки-ссылки в тексте
    $InlineKeyboardButton = [
    'inline_keyboard' => [
    [
    ['text' => 'Кнопка 1', 'url' => 'https://vk.com', 'callback_data' => '', 'switch_inline_query' => ''],
    ['text' => 'Кнопка 2', 'url' => 'https://skyflo.ru', 'callback_data' => '', 'switch_inline_query' => ''],
    ]
    ]
    ];
    $InlineKeyboardButton = json_encode($InlineKeyboardButton);
    */

    /* Образец клавиатуры
    $KeyboardButton = [
    'keyboard' => [
    ["Кнопка 1", "Кнопка 2"],
    ["Кнопка 3", "Кнопка 4"],
    ],
    ];
    $KeyboardButton = json_encode($KeyboardButton);
     */

    /* Образец скрыть клавиатуру
    $ReplyKeyboardHide = [
    'hide_keyboard' => true,
    ];
    $ReplyKeyboardHide = json_encode($ReplyKeyboardHide);
     */

    /**
     * TelegramAPI constructor.
     * @param array $parameters
     */
    public function __construct(array $parameters)
    {
        $this->token= Yii::$app->params['telegramTokenBot'];
        $this->parameters = $parameters;
    }

    /**
     * Отправка сообщения
     */
    public function sendMessage()
    {
        $url = $this->api_url . $this->token . '/sendMessage?' . http_build_query($this->parameters);
        file_get_contents($url);

        return true;
    }

    /**
     * "Слушатель"
     * @return mixed
     */
    public static function hook()
    {
//        $content = file_get_contents("php://input");
//        return json_decode($content, true);
//        return '/help'; // TODO для тестов
    }
}