<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\referout\models\ReferoutSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Referouts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="referout-index">
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pager' => [
            'class' => '\yii\bootstrap4\LinkPager',
        ],
        'pjax'=>true,
        'columns' => require(__DIR__.'/_columns.php'),        
        'striped' => true,
        'condensed' => true,
        //'responsive' => true,          
        'panel' => [
            'type' => 'primary', 
            'heading' => '<i class="glyphicon glyphicon-list"></i> Referouts listing',
            'before'=>'<em>* Resize table columns just like a spreadsheet by dragging the column edges.</em>',            
        ]
    ]); ?>

    <?php Pjax::end(); ?>

</div>
