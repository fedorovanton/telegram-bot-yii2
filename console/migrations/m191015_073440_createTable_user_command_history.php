<?php

use yii\db\Migration;

/**
 * Class m191015_073440_createTable_user_command_history
 */
class m191015_073440_createTable_user_command_history extends Migration
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

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_command_history}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'command_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $this->tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191015_073440_createTable_user_command_history cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191015_073440_createTable_user_command_history cannot be reverted.\n";

        return false;
    }
    */
}
