<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>

<div class="main-content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel error-panel">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-warning"></i>
                        <?= nl2br(Html::encode($message)) ?></h3>
                </div>
                <div class="panel-body">
                    <p>The page you are looking for does not exist.</p>
                    <p>You may have mistyped the address or the page may have moved.</p>
                    <p>
                        <a href="javascript: history.back()">Go back to the previous page</a> /
                        <a href="index.html">Go to the Ark Admin dashboard</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

