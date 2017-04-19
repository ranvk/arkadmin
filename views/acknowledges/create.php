<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Acknowledges */

$this->title = Yii::t('app', 'Create Acknowledges');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Acknowledges'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acknowledges-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
