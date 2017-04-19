<?php
/**
 * Created by PhpStorm.
 * User: ukerzheng
 * Date: 2017/3/1
 * Time: 23:58
 */
namespace app\assets;
use yii\web\AssetBundle;
class JqueryAutosize extends AssetBundle
{
    public $sourcePath = '@bower';
    public $js = [
        'autosize/dist/autosize.min.js',
    ];
}