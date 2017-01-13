<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Study;

/**
 * StudySearch represents the model behind the search form about `backend\models\Study`.
 */
class StudySearch extends Study
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_classroom', 'id_student', 'id_subject', 'comment'], 'safe'],
            [['id_term', 'result', 'status', 'created_at', 'updated_at'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Study::find()->orderBy(['id'=>SORT_DESC]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pagesize' => 25,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_term' => $this->id_term,
            'result' => $this->result,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'id_classroom', $this->id_classroom])
            ->andFilterWhere(['like', 'id_student', $this->id_student])
            ->andFilterWhere(['like', 'id_subject', $this->id_subject])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
