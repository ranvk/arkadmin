<?php
/**
 * User: windsdeng@gmail.com
 * Date: 2016/6/21
 * Time: 15:10.
 */

namespace app\components;

use Yii;
use yii\base\Component;
use yii\httpclient\Client;

class ZabbixAPI extends Component
{
    public $zUrl;

    public function callAPI($object, $method, $parameters = [])
    {
        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('post')
            ->setHeaders('Content-Type:application/json-rpc')
            ->setFormat($client::FORMAT_JSON)
            ->setUrl($this->getZUrl())
            ->setData([
                'jsonrpc' => '2.0',
                'method' => $object.'.'.$method,
                'params' => $parameters,
                'auth' => Yii::$app->session->get('sid'),
                'id' => 1,
            ])
            ->send();
        return $response->data;
    }

    public function login($username, $password)
    {
        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('post')
            ->setHeaders('Content-Type:application/json-rpc')
            ->setFormat($client::FORMAT_JSON)
            ->setUrl($this->getZUrl())
            ->setData([
                'jsonrpc' => '2.0',
                'method' => 'user.login',
                'params' => [
                    'user' => $username,
                    'password' => $password,
                ],
                'id' => 1,
            ])
            ->send();
        if ($response->isOk && isset($response->data['result'])) {
            Yii::$app->session->set('sid', $response->data['result']);
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return mixed
     */
    public function getZUrl()
    {
        return !empty($this->zUrl) ? $this->zUrl : Yii::$app->urlManager->createAbsoluteUrl('z/api_jsonrpc.php');
    }
}
