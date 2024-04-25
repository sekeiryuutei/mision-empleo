<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Persona;

/**
 * PersonaSearch represents the model behind the search form of `common\models\Persona`.
 */
class PersonaSearch extends Persona
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'idTipoIdentificacion', 'idSexo', 'idNivelEstudio', 'idEstadoCivil', 'idCiudadResidencia', 'indTelefonoContacto', 'created_by', 'updated_by'], 'integer'],
            [['documento', 'telefonoContacto'], 'number'],
            [['primerNombre', 'segundoNombre', 'primerApellido', 'segundoApellido', 'direccionResidencia', 'correoElectronico', 'created_at', 'updated_at'], 'safe'],
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
    public function search($params, $id = null)
    {
        $query = Persona::find();

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
            'id' => $id,
            'idTipoIdentificacion' => $this->idTipoIdentificacion,
            'documento' => $this->documento,
            'idSexo' => $this->idSexo,
            'idNivelEstudio' => $this->idNivelEstudio,
            'idEstadoCivil' => $this->idEstadoCivil,
            'idCiudadResidencia' => $this->idCiudadResidencia,
            'indTelefonoContacto' => $this->indTelefonoContacto,
            'telefonoContacto' => $this->telefonoContacto,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'primerNombre', $this->primerNombre])
            ->andFilterWhere(['like', 'segundoNombre', $this->segundoNombre])
            ->andFilterWhere(['like', 'primerApellido', $this->primerApellido])
            ->andFilterWhere(['like', 'segundoApellido', $this->segundoApellido])
            ->andFilterWhere(['like', 'direccionResidencia', $this->direccionResidencia])
            ->andFilterWhere(['like', 'correoElectronico', $this->correoElectronico]);

        return $dataProvider;
    }
}
