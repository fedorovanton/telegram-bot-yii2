<?php

use yii\db\Migration;
use \common\models\User;

/**
 * Class m190226_112826_insert_User
 */
class m190225_112826_insert_User extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $user = new User();
        $user->username = 'admin_vlad';
        $user->generateAuthKey();
        $user->password_hash = Yii::$app->security->generatePasswordHash('admin_vladadmin_vlad');
        $user->email = 'vladislav.kozachenko94@gmail.com';
        $user->status = User::STATUS_ACTIVE;
        $user->save();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190226_112826_insert_User cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190226_112826_insert_User cannot be reverted.\n";

        return false;
    }
    */
}
