<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\Exception;

/**
 * This is the model class for table "t_task".
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string|null $due_date
 * @property int $status
 * @property int $priority
 * @property string $created_at
 * @property string|null $updated_at
 * @property string|null $deleted_at
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 't_task';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['title', 'due_date'], 'required'],
            [['description'], 'string'],
            ['due_date', 'date', 'format' => 'php:Y-m-d'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['status'], 'integer'],
            [['priority'], 'number'],
            [['title'], 'string','max' => 255],
            [['title'], 'unique'],
        ];
    }

    public function behaviors(): array
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new \yii\db\Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'due_date' => 'Due Date',
            'status' => 'Status',
            'priority' => 'Priority',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }

    /**
     * @throws Exception
     */
    public function deleteSafe(): void
    {
        $this->deleted_at = date('Y-m-d H:i:s');
        $this->save();
    }

    public static function find(): ActiveQuery
    {
        return parent::find()->orderBy(['title' => SORT_ASC]);
    }
}
