<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Produse;

/**
 * ProduseSearch represents the model behind the search form of `app\models\Produse`.
 */
class ProduseSearch extends Produse
{
    public $categorie;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'produs_categorie', 'produs_is_active', 'produs_stock'], 'integer'],
            [['produs_denumire', 'produs_imagine', 'categorie_denumire'], 'safe'],
            [['produs_pret'], 'number'],
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
        $query = Produse::find();

        // add conditions that should always apply here

        $query->joinWith(['categorie']);

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
            'produs_categorie' => $this->produs_categorie,
            'produs_pret' => $this->produs_pret,
            'produs_is_active' => $this->produs_is_active,
            'produs_stock' => $this->produs_stock,
        ]);

        $query->andFilterWhere(['like', 'produs_denumire', $this->produs_denumire])
            ->andFilterWhere(['like', 'produs_imagine', $this->produs_imagine]);

        return $dataProvider;
    }
}
