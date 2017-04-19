<?php

namespace app\models\search;

use app\components\helpers\ArrayHelper;
use app\models\Acknowledges;
use app\models\Events;
use app\models\Functions;
use app\models\Hosts;
use app\models\Hostsinterface;
use app\models\Items;
use app\models\TriggerDepends;
use app\models\Triggers;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Problem;
use yii\db\Query;

/**
 * ProblemSearch represents the model behind the search form of `app\models\Problem`.
 */
class ProblemSearch extends Problem
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['eventid', 'source', 'object', 'objectid', 'clock', 'ns', 'r_eventid', 'r_clock', 'r_ns', 'correlationid', 'userid'], 'integer'],
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
        /**
         * problem表
         */
        $query = new Query();
        $query->select(['p.*']);
        $query->from(['p' =>Problem::tableName()]);
        //筛选问题
        $query->andWhere(['p.source' =>0, 'p.object'=>0]);
        //problem需要trigger表有记录关联
        $query->andWhere(['exists',
            (new Query())->select(null)->from(['t'=>Triggers::tableName()])
        ->where('p.objectid=t.triggerid')
        ]);
        //未恢复的
        $query->andWhere('p.r_eventid IS NULL');

        /**
         * triggers --start
         * triggers.status 0 enable 1 disable
         */
        //trigger_depend里面的triggerid_down 需要排除掉
//        $query->andWhere(['not exists',(new Query())->select(null)->from(['td' =>TriggerDepends::tableName()])
//            ->where('p.objectid=td.triggerid_down')
//        ]);

        $query->leftJoin(['t' =>Triggers::tableName()],'t.triggerid = p.objectid')
            ->addSelect('t.*')->andWhere(['in','t.flags',[0,4]])->andWhere(['t.status'=> 0 ]);
        /**
         * triggers --stop
         */

        /**
         * acknowledges --start
         * acknowledgeid 知悉，acknowledgeid =null 未确认
         */
        $query->leftJoin([
            'ak' =>(new Query())->select(['eventid','count(acknowledgeid) as acknowledgecount'])->
            from(Acknowledges::tableName())->groupBy('eventid')],'ak.eventid = p.eventid')
            ->addSelect('ak.acknowledgecount');
        /**
         * acknowledges --stop
         */


        /**
         * function->items---start---
         * items.status 0 enable 1 disable
         */
        $query->leftJoin(['f'=>(new Query())->select('*')->from(Functions::tableName())->groupBy('triggerid')],
            'f.triggerid =t.triggerid');
        $query->leftJoin(['i'=>Items::tableName()],'f.itemid =i.itemid')->andWhere('i.status=0');
        /**
         * function->items---stop---
         */

        /**
         * host---start---
         * maintenance_status 0:disable 1:enable
         * status  0:normal other:disable
         */
        $query->leftJoin(['h'=>Hosts::tableName()],'i.hostid =h.hostid')
            ->addSelect('h.hostid,h.host,h.name')->andWhere('h.status=0')->andWhere(['h.maintenance_status'=> 0]);
        //暂时是一条ip信息
        $query->leftJoin(['hi'=>(new Query())->select('*')->from(Hostsinterface::tableName())->groupBy('hostid')],
            'h.hostid=hi.hostid')->addSelect('hi.*');
        $query->orderBy(['p.clock'=>SORT_DESC]);
        /**
         * host---stop---
         */

        /**
         * trigger表
         */


//        var_dump($query->all(Problem::getDb()));die();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'db' => Problem::getDb(),
        ]);


        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'eventid' => $this->eventid,
            'source' => $this->source,
            'object' => $this->object,
            'objectid' => $this->objectid,
            'clock' => $this->clock,
            'ns' => $this->ns,
            'r_eventid' => $this->r_eventid,
            'r_clock' => $this->r_clock,
            'r_ns' => $this->r_ns,
            'correlationid' => $this->correlationid,
            'userid' => $this->userid,
        ]);

        return $dataProvider;
    }

    public function searchHistory($params)
    {
        $query = new Query();
        $query->select('e.*')->from(['e'=>Events::tableName()]);
        //筛选问题
        $query->andWhere(['e.source' =>0, 'e.object'=>0,'e.value'=>1]);


        /**
         * triggers --start
         * triggers.status 0 enable 1 disable
         */
        $query->leftJoin(['t' =>Triggers::tableName()],'t.triggerid = e.objectid')
            ->addSelect('t.*')->andWhere(['in','t.flags',[0,4]]);
        /**
         * triggers --stop
         */

        /**
         * function->items---start---
         * items.status 0 enable 1 disable
         */
        $query->leftJoin(['f'=>(new Query())->select('*')->from(Functions::tableName())->groupBy('triggerid')],
            'f.triggerid =t.triggerid');
        $query->leftJoin(['i'=>Items::tableName()],'f.itemid =i.itemid')->andWhere('i.status=0');
        /**
         * function->items---stop---
         */

        /**
         * host---start---
         * maintenance_status 0:disable 1:enable
         * status  0:normal other:disable
         */
        $query->leftJoin(['h'=>Hosts::tableName()],'i.hostid =h.hostid')
            ->addSelect('h.hostid,h.host,h.name')->andWhere('h.status=0')->andWhere(['h.maintenance_status'=> 0]);
        //暂时是一条ip信息
        $query->leftJoin(['hi'=>(new Query())->select('*')->from(Hostsinterface::tableName())->groupBy('hostid')],
            'h.hostid=hi.hostid')->addSelect('hi.*');
        $query->orderBy(['p.clock'=>SORT_DESC]);
        /**
         * host---stop---
         */
        /**
         * event_recovery --start
         */

        /**
         * event_recovery --stop
         */

        $query->orderBy(['e.clock'=>SORT_DESC]);
        /**
         * trigger表
         */

$data = $query->all(Events::getDb());
//ArrayHelper::multisort($data,'objectid',SORT_DESC);
//$data = ArrayHelper::getColumn($data,'objectid');
//$data = array_unique($data);

//        var_dump($data);die();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'db' => Problem::getDb(),
        ]);
        return $dataProvider;
    }
}
