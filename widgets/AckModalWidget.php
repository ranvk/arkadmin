<?php

namespace app\widgets;

/**
 * Created by PhpStorm.
 * User: ukerzheng
 * Date: 2017/3/31
 * Time: 16:18
 */

use yii\base\Widget;

class AckModalWidget extends Widget
{
    public $modalid;
    public $title = 'Modal title';

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        parent::run();
        return $this->render('ackmodal', [
            'modalid' => $this->modalid,
            'title' => $this->title,
        ]);
    }
}