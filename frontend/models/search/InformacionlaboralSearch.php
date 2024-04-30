<?php

namespace frontend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Informacionlaboral;

/**
 * InformacionlaboralSearch represents the model behind the search form of `frontend\models\Informacionlaboral`.
 */
class InformacionlaboralSearch extends Informacionlaboral
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'idPersona', 'created_by', 'updated_by'], 'integer'],
            [['nombreEmpresa', 'nombreCargo', 'fechaDesde', 'fechaHasta', 'created_at', 'updated_at'], 'safe'],
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
        $query = Informacionlaboral::find();

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
            'idPersona' => $this->idPersona,
            'fechaDesde' => $this->fechaDesde,
            'fechaHasta' => $this->fechaHasta,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'nombreEmpresa', $this->nombreEmpresa])
            ->andFilterWhere(['like', 'nombreCargo', $this->nombreCargo]);

        return $dataProvider;
    }
}
