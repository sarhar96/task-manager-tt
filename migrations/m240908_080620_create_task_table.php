<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%task}}`.
 */
class m240908_080620_create_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createTable('{{%task}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->unique()->notNull(),
            'description' => $this->text(),
            'due_date' => $this->date(),
            'status' => $this->tinyInteger(1)->notNull()->defaultValue(0),
            'priority' => $this->float(2)->notNull()->defaultValue(0),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' =>  $this->timestamp()->null(),
            'deleted_at' => $this->timestamp()->null(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropTable('{{%task}}');
    }
}
