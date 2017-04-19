<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\assets\LoginAsset;

LoginAsset::register($this);
//css定义一样
$this->context->layout = false;

$this->registerCssFile('@web/css/ark.css',['depends'=>['app\assets\AppAsset']]);

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $this->beginPage()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php $this->head() ?>
    <title>ArkAdmin Theme</title>
    <link rel="shortcut icon" href="/img/ico/favicon.png" />
</head>

<body class="cover">
<?php $this->beginBody() ?>
<div class="login-wrap">
    <span class="brand">
        <i class="fa fa-html5"></i> Ark Admin
    </span>
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Sign Up</h3>
        </div>
        <div class="panel-body">
            <?php $form = ActiveForm::begin([
                'id' => 'form-signup',
                'fieldConfig' => [
                    'template' => "{input}{error}",
                ],
            ]); ?>
            <?= $form->field($model, 'username')->textInput(['autofocus' => true,
                'id'=> 'exampleInputEmail1', 'placeholder' => 'Full Name']) ?>
            <?= $form->field($model, 'email') ?>
            <?= $form->field($model, 'password')->passwordInput(['id'=> 'exampleInputPassword',
                'placeholder' => '请输入密码']) ?>
            <div class="checkbox">
                <label>
                    <input type="checkbox" > I agree to the <a href="#">Terms &amp; Conditions</a>
                </label>
            </div>
            <div class="form-group">
                <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>
            <br/>
            <br/>

            Already have an account? <a href="<?= \yii\helpers\Url::to('login')?>">Sign In!</a>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<?php $this->endBody() ?>
</body>

<?php
$this->registerJsFile('@web/js/ark.js',['depends'=>['app\assets\AppAsset']]);
?>
<?php $this->endPage() ?>

<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">

        </div>
    </div>
</div>
