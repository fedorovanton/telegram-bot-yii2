<?php

namespace backend\models\Command;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Command\Command;

/**
 * CommandSearch represents the model behind the search form of `backend\models\Command\Command`.
 */
class CommandSearch extends Command
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'command_parent_id', 'created_at', 'updated_at', 'counter'], 'integer'],
            [['name', 'answer', 'comment'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Command::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'command_parent_id' => $this->command_parent_id,
            'counter' => $this->counter,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'answer', $this->answer])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
