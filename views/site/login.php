<?php
use app\components\helpers\Html;
use app\models\base\ActiveForm;
use app\assets\AppAsset;

AppAsset::register($this);
//css定义一样
$this->context->layout = false;

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


<!--    <link href="scripts/vendor/jquery.uniform/themes/default/css/uniform.default.min.css" rel="stylesheet" type="text/css" />-->
    <!--<link href="http://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.0/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />-->
<!--    <link href="scripts/css/ark.css" rel="stylesheet" type="text/css" />-->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <!--<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>-->
    <!--<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>-->
    <![endif]-->
</head>

<body class="cover">
<?php $this->beginBody() ?>
<div class="login-wrap">
    <span class="brand">
        <i class="fa fa-html5"></i> Ark Admin
    </span>
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Sign In</h3>
        </div>
        <div class="panel-body">
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'fieldConfig' => [
                    'template' => "{input}{error}",
                ],
            ]); ?>
                <?= $form->field($model, 'username')->textInput(['autofocus' => true,
                    'id'=> 'exampleInputEmail1', 'placeholder' => '请输入email']) ?>
                <?= $form->field($model, 'password')->passwordInput(['id'=> 'exampleInputPassword',
                    'placeholder' => '请输入密码']) ?>
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> 记住
                    </label>
                </div>
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary']) ?>

                <br/>
                <br/>

                <a href="forgot.html">Forgot password?</a><br/>
                Don't have an account yet? <a href="<?= \yii\helpers\Url::to('signup')?>">Sign Up!</a>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php
$this->registerJsFile('@web/js/ark.js',['depends'=>['app\assets\AppAsset']]);
?>
<?php $this->endPage() ?>
