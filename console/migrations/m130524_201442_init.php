<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    use \console\traits\DbTableConfigurator;

    /**
     * Дополнительные параметры таблиц БД.
     *
     * @var $tableOptions string
     */
    private $tableOptions;

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        $this->tableOptions = $this->getOptions($this->db->driverName);
    }

    public function up()
    {
        // Пользователи
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'telegram_user_id' => $this->integer(11)->unique(),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $this->tableOptions);

        // Команды
        $this->createTable('{{%command}}', [
            'id' => $this->primaryKey(),
            'command_parent_id' => $this->smallInteger()->defaultValue(0)." COMMENT 'ID команды верхнего уровня'",
            'name' => $this->string(255)->notNull()." COMMENT 'Название'",
            'answer' => $this->text()." COMMENT 'Ответ бота на команду'",
            'comment' => $this->string(255)." COMMENT 'Комментарий'",
            'created_at' => $this->integer()->notNull()." COMMENT 'Создано'",
            'updated_at' => $this->integer()->notNull()." COMMENT 'Обновлено'",
        ], $this->tableOptions);

        // Лог
        $this->createTable('{{%log}}', [
            'id' => $this->primaryKey(),
            'content' => $this->text()." COMMENT 'Лог'",
            'created_at' => $this->integer()->notNull()." COMMENT 'Создано'",
            'updated_at' => $this->integer()->notNull()." COMMENT 'Обновлено'",
        ], $this->tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
        $this->dropTable('{{%command}}');
        $this->dropTable('{{%log}}');
    }
}
