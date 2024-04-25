<?php

namespace frontend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Informacionestudio;
use common\models\Persona;

/**
 * InformacionestudioSearch represents the model behind the search form of `frontend\models\Informacionestudio`.
 */
class InformacionestudioSearch extends Informacionestudio
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'idPersona', 'idNivelAcademico', 'graduado', 'idAdjunto', 'created_by', 'updated_by'], 'integer'],
            [['tituloObtenido', 'nombreInstitucion', 'fecha', 'created_at', 'updated_at'], 'safe'],
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
        $query = Informacionestudio::find();

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
            'idpersona' => $this->idPersona,
            'idNivelAcademico' => $this->idNivelAcademico,
            'fecha' => $this->fecha,
            'graduado' => $this->graduado,
            'idAdjunto' => $this->idAdjunto,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        // $idpersona = Persona::findOne(['id' => $this->nombre]);

        // Filter by person's name

        $query->andFilterWhere(['like', 'tituloObtenido', $this->tituloObtenido])
            ->andFilterWhere(['like', 'nombreInstitucion', $this->nombreInstitucion]);

        return $dataProvider;
    }
}
