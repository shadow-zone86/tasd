<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Index;

/**
 * IndexSearch represents the model behind the search form of `app\models\Index`.
 */
class IndexSearch extends Index
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['index', 'litera'], 'safe'],
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
        $session = Yii::$app->session;

        if (!isset($params['IndexSearch'])) {
            if ($session->has('IndexSearch')){
                $params['IndexSearch'] = $session['IndexSearch'];
            }
        } else {
            $session->set('IndexSearch', $params['IndexSearch']);
        }

        if (!isset($params['sort'])) {
            if ($session->has('IndexSearchSort')){
                $params['sort'] = $session['IndexSearchSort'];
            }
        } else {
            $session->set('IndexSearchSort', $params['sort']);
        }

        if (isset($params['sort'])) {
            $pos = stripos($params['sort'], '-');
            if ($pos !== false) {
                $typeSort = SORT_DESC;
                $fieldSort = substr($params['sort'], 1);
            } else {
                $typeSort = SORT_ASC;
                $fieldSort = $params['sort'];
            }
        }
        else {
            $typeSort = SORT_ASC;
            $fieldSort = 'index';
        }

        $query = Index::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => [$fieldSort => $typeSort]],
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
        ]);

        $query->andFilterWhere(['ilike', 'index', $this->index])
            ->andFilterWhere(['ilike', 'litera', $this->litera]);

        return $dataProvider;
    }
}