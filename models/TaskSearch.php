<?php

namespace app\models;

use Yii;
use yii\caching\TagDependency;
use yii\data\ActiveDataProvider;

/**
 * TaskSearch represents the model behind the search form of `app\models\Task`.
 */
class TaskSearch extends Task
{
    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            ['priority', 'number'],
            [['id', 'status'], 'integer'],
            [['title', 'description', 'due_date', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
        ];
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search(array $params): ActiveDataProvider
    {
        $query = Task::find();

        $query->cache(Yii::$app->params['cacheDuration'], new TagDependency(['tags' => ['task_cache']]));

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => ['title' => SORT_ASC],
            ],
            'pagination' => [
                'pageSize' => Yii::$app->params['pageSize'],
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'due_date' => $this->due_date,
            'status' => $this->status,
            'priority' => $this->priority,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
