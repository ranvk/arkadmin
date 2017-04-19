<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Hosts;

/**
 * HostsSearch represents the model behind the search form of `app\models\Hosts`.
 */
class HostsSearch extends Hosts
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hostid', 'proxy_hostid', 'status', 'disable_until', 'available', 'errors_from', 'lastaccess', 'ipmi_authtype', 'ipmi_privilege', 'ipmi_disable_until', 'ipmi_available', 'snmp_disable_until', 'snmp_available', 'maintenanceid', 'maintenance_status', 'maintenance_type', 'maintenance_from', 'ipmi_errors_from', 'snmp_errors_from', 'jmx_disable_until', 'jmx_available', 'jmx_errors_from', 'flags', 'templateid', 'tls_connect', 'tls_accept'], 'integer'],
            [['host', 'error', 'ipmi_username', 'ipmi_password', 'ipmi_error', 'snmp_error', 'jmx_error', 'name', 'description', 'tls_issuer', 'tls_subject', 'tls_psk_identity', 'tls_psk'], 'safe'],
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
        $query = Hosts::find();

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
            'hostid' => $this->hostid,
            'proxy_hostid' => $this->proxy_hostid,
            'status' => $this->status,
            'disable_until' => $this->disable_until,
            'available' => $this->available,
            'errors_from' => $this->errors_from,
            'lastaccess' => $this->lastaccess,
            'ipmi_authtype' => $this->ipmi_authtype,
            'ipmi_privilege' => $this->ipmi_privilege,
            'ipmi_disable_until' => $this->ipmi_disable_until,
            'ipmi_available' => $this->ipmi_available,
            'snmp_disable_until' => $this->snmp_disable_until,
            'snmp_available' => $this->snmp_available,
            'maintenanceid' => $this->maintenanceid,
            'maintenance_status' => $this->maintenance_status,
            'maintenance_type' => $this->maintenance_type,
            'maintenance_from' => $this->maintenance_from,
            'ipmi_errors_from' => $this->ipmi_errors_from,
            'snmp_errors_from' => $this->snmp_errors_from,
            'jmx_disable_until' => $this->jmx_disable_until,
            'jmx_available' => $this->jmx_available,
            'jmx_errors_from' => $this->jmx_errors_from,
            'flags' => $this->flags,
            'templateid' => $this->templateid,
            'tls_connect' => $this->tls_connect,
            'tls_accept' => $this->tls_accept,
        ]);

        $query->andFilterWhere(['like', 'host', $this->host])
            ->andFilterWhere(['like', 'error', $this->error])
            ->andFilterWhere(['like', 'ipmi_username', $this->ipmi_username])
            ->andFilterWhere(['like', 'ipmi_password', $this->ipmi_password])
            ->andFilterWhere(['like', 'ipmi_error', $this->ipmi_error])
            ->andFilterWhere(['like', 'snmp_error', $this->snmp_error])
            ->andFilterWhere(['like', 'jmx_error', $this->jmx_error])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'tls_issuer', $this->tls_issuer])
            ->andFilterWhere(['like', 'tls_subject', $this->tls_subject])
            ->andFilterWhere(['like', 'tls_psk_identity', $this->tls_psk_identity])
            ->andFilterWhere(['like', 'tls_psk', $this->tls_psk]);

        return $dataProvider;
    }
}
