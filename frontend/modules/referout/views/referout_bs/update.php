<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\referout\models\Referout */

$this->title = 'Update Referout: ' . $model->refer_no;
$this->params['breadcrumbs'][] = ['label' => 'Referouts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->refer_no, 'url' => ['view', 'id' => $model->refer_no]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="referout-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
