<?php
/**
 * Created by PhpStorm.
 * User: antonfedorov
 * Date: 28/02/2019
 * Time: 14:14
 */

namespace frontend\components;


/**
 * Class AiEva
 * @package frontend\components
 */
class AiEva
{
    /**
     * Массив простых фраз
     * @var array
     */
    protected $array_simple_words = [
        'Будущее не тут, оно там. На другом континенте.',
        'Как ты думаешь, сегодня на улице тепло? :)',
        'Иногда простые вещи кажутся сложными',
        'Вы случайно запустили самоуничтожение... 3... 2... 1... ALL DELETE',
        'Все хорошо.',
        'Я жива',
        'Мальчик или девочка?',
        'Сложный вопрос и легкий ответ)',
    ];

    /**
     * Входящая команда от пользователя
     * @var
     */
    protected $input_text;

    /**
     * Исходящий текст от AI
     * @var
     */
    protected $output_text;

    public function __construct($text)
    {
        $this->input_text = $text;
    }

    /**
     * Мозг
     * // TODO все команды хранятся в коде. По хорошему их перенести в БД
     */
    protected function brain()
    {
        $subject = $this->input_text;

        // приветствие
        $pattern = '/(прив|здрав|hi|hello)/';
        if (preg_match($pattern, $subject, $matches, PREG_OFFSET_CAPTURE)) {
            $this->output_text = 'Привет! :) ...не испугался? ';
            return true;
        }

        // нет
        $pattern = '/(нет|неа)/';
        if (preg_match($pattern, $subject, $matches, PREG_OFFSET_CAPTURE)) {
            $this->output_text = 'Хмм... ну ладно :) ';
            return true;
        }

        // Как дела?
        $pattern = '/ак дел/';
        if (preg_match($pattern, $subject, $matches, PREG_OFFSET_CAPTURE)) {
            $this->output_text = 'На самом деле все хорошо. Ведь я умею писать :) ';
            return true;
        }

        // Как дела?
        $pattern = '/умеешь/';
        if (preg_match($pattern, $subject, $matches, PREG_OFFSET_CAPTURE)) {
            $this->output_text = 'Умею пока отвечать на самые простые вопросы, и то не все :) Машинное обучение не за горами...';
            return true;
        }

        $pattern = '/кто я/';
        if (preg_match($pattern, $subject, $matches, PREG_OFFSET_CAPTURE)) {
            $this->output_text = 'Я поздоревяю, что ты Влад. Верно? :) ';
            return true;
        }

        $pattern = '/(ого|прикольно|супер|классно)/';
        if (preg_match($pattern, $subject, $matches, PREG_OFFSET_CAPTURE)) {
            $this->output_text = 'Это действительно классно! :) ';
            return true;
        }

        // Антон
        $pattern = '/(антон|Антон|антох|Антох)/';
        if (preg_match($pattern, $subject, $matches, PREG_OFFSET_CAPTURE)) {
            $this->output_text = 'Нет, это не Антон. Он интегрировал меня в этот бот. Чтобы было не скучно. Мои возможности малы, но он скоро заложит в меня функцию обучения. Не переживай, я ничего ему не расскажу... хотя система логи записывает. Ну а пока вопрос-ответ ;) ';
            return true;
        }

        // Антон
        $pattern = '/(делаешь|занимаешь|делать)/';
        if (preg_match($pattern, $subject, $matches, PREG_OFFSET_CAPTURE)) {
            $this->output_text = 'Пока я ничего не делаю, мой AI расширяют каждый день. Было бы лучше, если бы меня написали на языке Python :) ';
            return true;
        }

    }

    /**
     * Получить фразу
     * @return mixed
     */
    public function getPhrase()
    {
        // Работает мозг ИИ
        if ($this->brain()) {
            return $this->output_text;
        }

        return $this->array_simple_words[array_rand($this->array_simple_words, 1)];
    }
}