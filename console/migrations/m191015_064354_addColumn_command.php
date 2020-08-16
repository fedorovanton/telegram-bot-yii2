<?php

use yii\db\Migration;

/**
 * Class m191015_064354_addColumn_command
 */
class m191015_064354_addColumn_command extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('command', 'counter', $this->integer(11)->defaultValue(0)->after('comment'));
        $this->addCommentOnColumn('command', 'counter', 'Счетчик кликабельности команды');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191015_064354_addColumn_command cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191015_064354_addColumn_command cannot be reverted.\n";

        return false;
    }
    */
}
