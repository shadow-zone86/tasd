<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Sheet;

/**
 * InspectorSearch represents the model behind the search form of `app\models\Sheet`.
 */
class InspectorSearch extends Sheet
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user', 'date_time', 'form', 'number_form', 'original_number', 'made_form', 'roll', 'copy', 'number_copy', 'scene', 'date_made', 'date_check', 'number_check', 'passport', 'agent', 'density', 'read', 'na2so3', 'ag', 'ov', 'ss', 's', 'n_s', 'dsp', 'k', 'kt', 'sk', 'hiccupped', 'ctencil', 'work_ctencil', 'defective_ctencil', 'glue', 'block', 'gloset', 'shelf', 'cell', 'index', 'indication', 'xxx', 'number_letter', 'prizn_document', 'cover_letter', 'accomp_letter', 'fasc', 'adress', 'data_made', 'nama_mkf', 'note', 'action', 'key1', 'key2', 'key3', 'key4', 'key5'], 'safe'],
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

        if (!isset($params['InspectorSearch'])) {
            if ($session->has('InspectorSearch')){
                $params['InspectorSearch'] = $session['InspectorSearch'];
            }
        } else {
            $session->set('InspectorSearch', $params['InspectorSearch']);
        }

        if (!isset($params['sort'])) {
            if ($session->has('InspectorSearchSort')){
                $params['sort'] = $session['InspectorSearchSort'];
            }
        } else {
            $session->set('InspectorSearchSort', $params['sort']);
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
        } else {
            $typeSort = SORT_ASC;
            $fieldSort = 'number_form';
        }

        $query = Sheet::find();

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

        $query->andFilterWhere(['ilike', 'user', $this->user])
            ->andFilterWhere(['ilike', 'date_time', $this->date_time])
            ->andFilterWhere(['ilike', 'form', $this->form])
            ->andFilterWhere(['ilike', 'number_form', $this->number_form])
            ->andFilterWhere(['ilike', 'original_number', $this->original_number])
            ->andFilterWhere(['ilike', 'made_form', $this->made_form])
            ->andFilterWhere(['ilike', 'roll', $this->roll])
            ->andFilterWhere(['ilike', 'copy', $this->copy])
            ->andFilterWhere(['ilike', 'number_copy', $this->number_copy])
            ->andFilterWhere(['ilike', 'scene', $this->scene])
            ->andFilterWhere(['=', 'date_made', $this->date_made])
            ->andFilterWhere(['=', 'date_check', $this->date_check])
            ->andFilterWhere(['ilike', 'number_check', $this->number_check])
            ->andFilterWhere(['ilike', 'passport', $this->passport])
            ->andFilterWhere(['ilike', 'agent', $this->agent])
            ->andFilterWhere(['ilike', 'density', $this->density])
            ->andFilterWhere(['ilike', 'read', $this->read])
            ->andFilterWhere(['ilike', 'na2so3', $this->na2so3])
            ->andFilterWhere(['ilike', 'ag', $this->ag])
            ->andFilterWhere(['ilike', 'ov', $this->ov])
            ->andFilterWhere(['ilike', 'ss', $this->ss])
            ->andFilterWhere(['ilike', 's', $this->s])
            ->andFilterWhere(['ilike', 'n_s', $this->n_s])
            ->andFilterWhere(['ilike', 'dsp', $this->dsp])
            ->andFilterWhere(['ilike', 'k', $this->k])
            ->andFilterWhere(['ilike', 'kt', $this->kt])
            ->andFilterWhere(['ilike', 'sk', $this->sk])
            ->andFilterWhere(['ilike', 'hiccupped', $this->hiccupped])
            ->andFilterWhere(['ilike', 'ctencil', $this->ctencil])
            ->andFilterWhere(['ilike', 'work_ctencil', $this->work_ctencil])
            ->andFilterWhere(['ilike', 'defective_ctencil', $this->defective_ctencil])
            ->andFilterWhere(['ilike', 'glue', $this->glue])
            ->andFilterWhere(['ilike', 'block', $this->block])
            ->andFilterWhere(['ilike', 'gloset', $this->gloset])
            ->andFilterWhere(['ilike', 'shelf', $this->shelf])
            ->andFilterWhere(['ilike', 'cell', $this->cell])
            ->andFilterWhere(['ilike', 'index', $this->index])
            ->andFilterWhere(['ilike', 'indication', $this->indication])
            ->andFilterWhere(['=', 'xxx', $this->xxx])
            ->andFilterWhere(['ilike', 'number_letter', $this->number_letter])
            ->andFilterWhere(['ilike', 'prizn_document', $this->prizn_document])
            ->andFilterWhere(['ilike', 'cover_letter', $this->cover_letter])
            ->andFilterWhere(['ilike', 'accomp_letter', $this->accomp_letter])
            ->andFilterWhere(['ilike', 'fasc', $this->fasc])
            ->andFilterWhere(['ilike', 'adress', $this->adress])
            ->andFilterWhere(['=', 'data_made', $this->data_made])
            ->andFilterWhere(['ilike', 'nama_mkf', $this->nama_mkf])
            ->andFilterWhere(['ilike', 'note', $this->note])
            ->andFilterWhere(['ilike', 'action', $this->action])
            ->andFilterWhere(['ilike', 'key1', $this->key1])
            ->andFilterWhere(['ilike', 'key2', $this->key2])
            ->andFilterWhere(['ilike', 'key3', $this->key3])
            ->andFilterWhere(['ilike', 'key4', $this->key4])
            ->andFilterWhere(['ilike', 'key5', $this->key5]);

        return $dataProvider;
    }
}