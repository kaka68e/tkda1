<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Classroom;

/**
 * ClassroomSearch represents the model behind the search form about `backend\models\Classroom`.
 */
class ClassroomSearch extends Classroom
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['classroom_id', 'id_year'], 'safe'],
            [['id_block', 'status', 'created_at', 'updated_at'], 'integer'],
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
        $query = Classroom::find()->orderBy(['created_at'=>SORT_DESC]);;

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
            'id_block' => $this->id_block,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'classroom_id', $this->classroom_id])
            ->andFilterWhere(['like', 'id_year', $this->id_year]);

        return $dataProvider;
    }
}
