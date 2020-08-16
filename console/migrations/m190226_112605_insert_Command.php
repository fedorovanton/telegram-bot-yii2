<?php

use yii\db\Migration;

/**
 * Class m190226_112605_insert_Command
 */
class m190226_112605_insert_Command extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        /**
            /setcommands

            acd_da - Раздел ACD-DA
            tabmedia - Раздел TabMedia
            ceravemed_vichymed - Раздел Ceravemed/Vichymed
            help - Помощь по работе с МП HELP
            id - Узнать свой ID

         */
        // id=1
        $this->insert('command', [
            'id' => 1,
            'command_parent_id' => 0,
            'name' => '/help',
            'answer' => 'fedorov_anton',
            'comment' => '👨‍💻 Раздел Помощь по боту',
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        // id=2
        $this->insert('command', [
            'id' => 2,
            'command_parent_id' => 0,
            'name' => '/acd_da',
            'answer' => '🤖 Выберите дальнейшее действие:',
            'comment' => 'Раздел ACD-DA',
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        // id=3
        $this->insert('command', [
            'id' => 3,
            'command_parent_id' => 0,
            'name' => '/tabmedia',
            'answer' => '🤖 Выберите дальнейшее действие:',
            'comment' => 'Раздел TabMedia',
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        // id=4
        $this->insert('command', [
            'id' => 4,
            'command_parent_id' => 0,
            'name' => '/ceravemed_vichymed',
            'answer' => '🤖 Выберите дальнейшее действие:',
            'comment' => 'Раздел Ceravemed/Vichymed',
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        // id=5
        $this->insert('command', [
            'id' => 5,
            'command_parent_id' => 0,
            'name' => '/id',
            'answer' => '👻 Ваш ID: ',
            'comment' => 'Команда, которая определеяет ID собеседника',
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('command', [
            'id' => 6,
            'command_parent_id' => 2,
            'name' => 'Ошибка на сайте',
            'answer' => '👤 Контакты поддержки: XXXXXXXXX',
            'comment' => 'Раздел ACD-DA',
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('command', [
            'id' => 7,
            'command_parent_id' => 2,
            'name' => 'Не приходит письмо',
            'answer' => '🤖 Выберите дальнейшее действие: ',
            'comment' => 'Раздел ACD-DA',
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('command', [
            'id' => 8,
            'command_parent_id' => 7,
            'name' => 'Нет',
            'answer' => '👤 Контакты поддержки: XXXXXXX ',
            'comment' => 'Раздел ACD-DA',
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('command', [
            'id' => 9,
            'command_parent_id' => 7,
            'name' => 'Решения',
            'answer' => '📄 Инструкция, чтобы письмо приходило...',
            'comment' => 'Раздел ACD-DA',
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('command', [
            'id' => 10,
            'command_parent_id' => 3,
            'name' => 'Не получается синхронизироваться',
            'answer' => '🤖 Какая у вас проблема:',
            'comment' => 'Раздел TabMedia',
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('command', [
            'id' => 11,
            'command_parent_id' => 3,
            'name' => 'Логины и пароли',
            'answer' => '🔐 Список логинов и паролей...',
            'comment' => 'Раздел TabMedia',
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('command', [
            'id' => 12,
            'command_parent_id' => 10,
            'name' => 'Нету решения',
            'answer' => '👤 Контакты поддержки: XXXXXX',
            'comment' => 'Раздел TabMedia',
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('command', [
            'id' => 13,
            'command_parent_id' => 10,
            'name' => 'Проблема 1',
            'answer' => '📄 Решение проблемы 1: ...',
            'comment' => 'Раздел TabMedia',
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('command', [
            'id' => 14,
            'command_parent_id' => 10,
            'name' => 'Проблема 2',
            'answer' => '📄 Решение проблемы 2: ...',
            'comment' => 'Раздел TabMedia',
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('command', [
            'id' => 15,
            'command_parent_id' => 10,
            'name' => 'Проблема 3',
            'answer' => '📄 Решение проблемы 3: ...',
            'comment' => 'Раздел TabMedia',
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('command', [
            'id' => 16,
            'command_parent_id' => 4,
            'name' => 'Ошибка на сайте',
            'answer' => '🤖 Выберите вариант решения:',
            'comment' => 'Раздел Ceravemed/Vichymed',
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('command', [
            'id' => 17,
            'command_parent_id' => 4,
            'name' => 'Не начисляются баллы',
            'answer' => '👤 Контакты поддержки: XXXXXXXX',
            'comment' => 'Раздел Ceravemed/Vichymed',
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('command', [
            'id' => 18,
            'command_parent_id' => 16,
            'name' => 'Нет решения',
            'answer' => '👤 Контакты поддержки: XXXXXXXXX',
            'comment' => 'Раздел Ceravemed/Vichymed',
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('command', [
            'id' => 19,
            'command_parent_id' => 16,
            'name' => 'Решение 1',
            'answer' => '📄 Описание решения 1: ...',
            'comment' => 'Раздел Ceravemed/Vichymed',
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('command', [
            'id' => 20,
            'command_parent_id' => 16,
            'name' => 'Решение 2',
            'answer' => '📄 Описание решения 2: ...',
            'comment' => 'Раздел Ceravemed/Vichymed',
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('command', [
            'id' => 21,
            'command_parent_id' => 16,
            'name' => 'Решение 3',
            'answer' => '📄 Описание решения 3: ...',
            'comment' => 'Раздел Ceravemed/Vichymed',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190226_112605_insert_Command cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190226_112605_insert_Command cannot be reverted.\n";

        return false;
    }
    */
}
