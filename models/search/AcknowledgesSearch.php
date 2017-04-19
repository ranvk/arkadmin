<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Acknowledges;

/**
 * AcknowledgesSearch represents the model behind the search form of `app\models\Acknowledges`.
 */
class AcknowledgesSearch extends Acknowledges
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['acknowledgeid', 'userid', 'eventid', 'clock', 'action'], 'integer'],
            [['message'], 'safe'],
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
        $query = Acknowledges::find();

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
            'acknowledgeid' => $this->acknowledgeid,
            'userid' => $this->userid,
            'eventid' => $this->eventid,
            'clock' => $this->clock,
            'action' => $this->action,
        ]);

        $query->andFilterWhere(['like', 'message', $this->message]);

        return $dataProvider;
    }
}
