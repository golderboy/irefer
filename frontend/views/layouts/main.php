<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\web\Session;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',//'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'ส่งต่อ', 'url' => ['/referout/referout/index']],
        ['label' => 'รับผู้ป่วย', 'url' => ['/referin/referin/index']],
        ['label' => 'iReport', 'url' => ['/ireport/ireport/index']],
    ];
    if (!isset(Yii::$app->session['username'])) {
        //$menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        if(Yii::$app->session['role']=='user'){
            $menuItems[] = [
                'label' => Yii::$app->session['uname'], 
                'items'=>[
                    ['label' => '<i class="glyphicon glyphicon-cloud"></i> ส่งข้อมูลขึ้น CLOUD', 
                                'url' => ['/ireport/cloud/index']],
                    ['label' => '<i class="glyphicon glyphicon-refresh"></i> ส่งข้อมูลเข้า Hosxp', 
                                'url' => ['/ireport/nures/index']],
                    ['label' => '<div class="clearfix"></div>'],            
                    ['label' => '<span class="glyphicon glyphicon-off"></span> ออกจากระบบ',
                                'url' => ['/site/kills'], 'linkOptions' => ['data-method' => 'post']],
                ]
            ];
        }
        if(Yii::$app->session['role']=='admin'){
            $menuItems[] = [
                'label' => Yii::$app->session['uname'], 
                'items'=>[
                    ['label' => '<span class="glyphicon glyphicon-wrench"></span> ตั้งค่าระบบ', 'url' => ['/admin/admin/index']],
                    ['label' => '<div class="clearfix"></div>'],
                    ['label' => '<span class="glyphicon glyphicon-off"></span> ออกจากระบบ',
                                'url' => ['/site/kills'], 'linkOptions' => ['data-method' => 'post']],
                ]
            ];
        }
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'items' => $menuItems,
        'encodeLabels' => false,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
