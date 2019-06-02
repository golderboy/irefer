<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login: <?=$message?></p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin([
                        'method'=>'Post',
                        'action'=>Url::to(['/site/login']),
                    ]); ?>

                <?= $form->field($model, 'uid')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'pwd')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
