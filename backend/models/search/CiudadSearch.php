<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Ciudad;

/**
 * CiudadSearch represents the model behind the search form of `backend\models\Ciudad`.
 */
class CiudadSearch extends Ciudad
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'idDepartamento'], 'integer'],
            [['codigoDane', 'nombre'], 'safe'],
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
        $query = Ciudad::find();

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
            'idDepartamento' => $this->idDepartamento,
        ]);

        $query->andFilterWhere(['like', 'codigoDane', $this->codigoDane])
            ->andFilterWhere(['like', 'nombre', $this->nombre]);

        return $dataProvider;
    }
}
