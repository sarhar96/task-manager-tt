<?php

use yii\db\Migration;

/**
 * Class m240908_084118_add_index_to_task_title
 */
class m240908_084118_add_index_to_task_title extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createIndex(
            'idx-task-title',
            '{{%task}}',
            'title'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropIndex(
            'idx-task-title',
            '{{%task}}'
        );
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240908_084118_add_index_to_task_title cannot be reverted.\n";

        return false;
    }
    */
}
