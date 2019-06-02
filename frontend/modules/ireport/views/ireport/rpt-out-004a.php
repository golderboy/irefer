<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
use kartik\widgets\Select2;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\web\JsExpression;
use yii\base\Response;
use frontend\modules\ireport\models\Station;
use frontend\modules\ireport\models\Strength;
use frontend\modules\ireport\models\Typept;
use frontend\modules\ireport\models\Causereferout;
use frontend\modules\ireport\models\Hospcode;
use frontend\modules\ireport\models\Level;
use frontend\modules\ireport\models\Loads;
use frontend\modules\ireport\models\Referoutdiag;

use frontend\assets\AppAsset; 
AppAsset::register($this);

$title_plus = '*';
if(!empty($date1) && !empty($date2)){ " ".$title_plus .= " ระหว่างวันที่ ".$date1." ถึง ".$date2; }
if(!empty($station) ){ 
    $data = Station::find()->where(['station_id'=>$station])->one();
    $title_plus .= " ห้อง ".$data->station_name; 
}
if(!empty($strength) ){ 
    $data = Strength::find()->where(['strength_id'=>$strength])->one();
    $title_plus .= " ระดับความรุนแรง ".$data->strength_name; 
}

$this->title = 'รายงานส่งต่อ แยกตามระดับความรุนแรง '.$title_plus;

$this->registerCss("
.card-body{
    background-color: #dfdfdf;
    padding:10px;
}
");

$js=<<<JS
$(document).ready(function() {
    $('#minus').on('click', function(e) {
        $("#search").addClass('hidden');
    });
    $('#plus').on('click', function(e) {
        $("#search").removeClass('hidden');
    });
      
});
JS;
$this->registerJS($js);

$this->registerCss("
.show {
    display: block !important;
  }
  .hidden {
    display: none !important;
    visibility: hidden !important;
  }
  .invisible {
    visibility: hidden;
  }
");
?>

<div class="ireport-index">

    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><?=Html::a('หน้าหลัก',['/site/index']);?></li>
        <li class="breadcrumb-item"><?=Html::a('รายงาน',['/ireport/ireport/index']);?></li>
        <li class="breadcrumb-item active" aria-current="page"><?=$this->title?></li>
    </ol>
    </nav>

<div id="ajaxCrudDatatable">
    <div class="card">
        <div class="card-body">
        <div class="row">
            <div class="col-md-3 col-md-offset-9">
                <object align="right">
                    <i class="glyphicon glyphicon-plus" id="plus"></i>
					<i class="glyphicon glyphicon-minus" id="minus"></i>
                </object>
            </div>
        </div>
        <div  id="search"> 
            <?php 
            $form = ActiveForm::begin([
                        'method'=>'Get',
                        'action'=>Url::to(['/ireport/ireport/rpt-out-004a']),
                    ]);
                echo "<div class='row'>";
                    echo "<div class='col col-md-3'>";	
                    echo '<label class="control-label">เริ่มวันที่</label>';
                    echo $form->field($model, 'refer_date')->textInput(['name'=>'date1','type'=>'date','value'=>$date1])->label(false);
                    echo "</div>";
                    echo "<div class='col col-md-3'>";
                    echo '<label class="control-label">ถึงวันที่</label>';
                    echo $form->field($model, 'refer_date')->textInput(['label'=>'ถึงวันที่','name'=>'date2','type'=>'date','value'=>$date1])->label(false);
                    echo "</div>";
                    echo "<div class='col col-md-3'>";
                    echo '<label class="control-label">หน่วยงานส่งต่อ</label>';
                    echo Select2::widget([
                        'name' => 'station',
                        'data' => ArrayHelper::map(Station::find()->all(),'station_id','station_name'),
                        'options' => [
                            'placeholder' => 'Select a state ...'
                        ],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    echo "</div>";
                    echo "<div class='col col-md-3'>";
                    echo '<label class="control-label">ระบบความฉุกเฉิน</label>';
                    echo Select2::widget([
                        'name' => 'strength',
                        'data' => ArrayHelper::map(Strength::find()->all(),'strength_id','strength_name'),
                        'options' => [
                            'placeholder' => 'Select a state ...'
                        ],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    echo "</div>";
                echo "</div>";
                
                echo "<div class='row'>";
                    echo "<div class='col col-md-3'>";
                    echo '<label class="control-label">ระบบความรุนแรง</label>';
                    echo Select2::widget([
                        'name' => 'level',
                        'data' => ArrayHelper::map(Level::find()->all(),'level_id','level_name'),
                        'options' => [
                            'placeholder' => 'Select a state ...'
                        ],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    echo "</div>";
                    echo "<div class='col col-md-3'>";
                    echo '<label class="control-label">Trauma</label>';
                    echo Select2::widget([
                        'name' => 'typept',
                        'data' => ArrayHelper::map(Typept::find()->all(),'typept_id','typept_name'),
                        'options' => [
                            'placeholder' => 'Select a state ...'
                        ],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    echo "</div>";
                    echo "<div class='col col-md-3'>";
                    echo '<label class="control-label">เหตุผลการส่งต่อ</label>';
                    echo Select2::widget([
                        'name' => 'causerefer',
                        'data' => ArrayHelper::map(Causereferout::find()->all(),'cause_referout_id','cause_referout_name'),
                        'options' => [
                            'placeholder' => 'Select a state ...'
                        ],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    echo "</div>";
                    echo "<div class='col col-md-3'>";
                    echo '<label class="control-label">การเดินทาง</label>';
                    echo Select2::widget([
                        'name' => 'loads',
                        'data' => ArrayHelper::map(Loads::find()->all(),'loads_id','loads_name'),
                        'options' => [
                            'placeholder' => 'Select a state ...'
                        ],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    echo "</div>";
                echo "</div>";	

                echo "<div class='row'>";
                    echo "<div class='col col-md-6'>";
                    echo '<label class="control-label">สถานีปลายทาง</label>';
                    echo Select2::widget([
                        'name' => 'refer_hospcode',
                        'data' => ArrayHelper::map(Hospcode::find()
                                                ->where("hosptype in ('รพช.','รพ.','โรงพยาบาล')")
                                                ->all(),'hospcode','hospfull'),
                        'options' => [
                            'placeholder' => 'Select a state ...'
                        ],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    /** */
                    echo "</div>";
                echo "</div>";

                echo "<br>";
                    echo "<div class='form-group'>";
                    if (!Yii::$app->request->isAjax){
                        echo Html::submitButton('ประมวลผล',['class'=>'btn btn-info']).'    '.
                        Html::a('ล้างข้อมูลค้นหา',['/ireport/ireport/rpt-out-004a'],['class'=>'btn btn-danger','data-pjax' => '0']);
                    }
                    echo "</div>";
                
                ActiveForm::end();
            ?>
            </div>
        </div> <!--  Hidden Card Search -->
    </div>
    <!--  SELECT ROOM AND DATE -->
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            'pjax'=>true,
            'panel' => [ 
                'type' => 'primary', 
                'heading' => '<i class="glyphicon glyphicon-list"></i> '.$this->title,
            ],
            'options' => [ 
                'style' => 'table-layout: fixed; width: 100%;table-hover table-striped table-condense',
                'class'=>'table-hover table-striped table-condensed' 
            ],
		    'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
            'columns' => [
                [
                    'class' => 'yii\grid\SerialColumn',
                    'contentOptions'=>['style'=>'width: 15px;'],
                ],
                [
                    'header' => '<i class="fas fa-ambulance"></i>',
                    'format'=>'raw',
                    'value' => function ($model) {
                        
                        switch ($model->strength_id) {
                            case "01":
                                $color = '#D50000';
                                break;
                            case "02":
                                $color = '#E91E63';
                                break;
                            case "03":
                                $color = '#FF5722';
                                break;
                            case "04":
                                $color = '#FFF176';
                                break;
                            default:
                                $color = '#F3E5F5';
                        }
                        return '<i class="glyphicon glyphicon-certificate" style="color:'.$color.';"></i>';			
                        //return $model->checkreply;
                        }
                ],
                [
                    'attribute'=>'refer_no',
                    'contentOptions'=>['style'=>'min-width: 100px;'],
                ],
                [
                    'attribute'=>'station_id',
                    'contentOptions'=>['style'=>'min-width: 50px;'],
                    'value' => function ($model) { 
                        return !empty($model->station_id) ? $model->station->station_name : '-';
                        //return $model->referhospth;
                        },
                ],
                [
                    'attribute'=>'refer_hospcode',
                    'value' => function ($model) { 
                            return !empty($model->refer_hospcode) ? $model->referhospth : '-';
                            //return $model->referhospth;
                            },
                    'contentOptions'=>['style'=>'min-width: 180px;'],
                ],
                [
                    'attribute'=>'refer_date',
                    'value' => function ($model) { return substr($model->refer_date,0,10).' '.$model->refer_time;},
                    'contentOptions'=>['style'=>'min-width: 150px;'],
                ],
                ['attribute'=>'hn',],
                [
                    'attribute'=>'age',
                    'value' => function ($model) { return substr($model->age,0,3);},
                ],
                'sex',
                [
                    'label'=>'ICD10',
                    'value' => function ($model) {
                        $data = Referoutdiag::find()
                                            ->where(['refer_no'=>$model->refer_no,'diagtype_id'=>1])
                                            ->orderBy(['diagtype_id'=>SORT_ASC])
                                            ->groupBy('refer_no');
                        $count = $data->count();
                        $data = $data->one(); 
                        return $count >0 ? $data->icd10 : '-';
                        //return $model->causereferout->cause_referout_name;
                        },
                    'contentOptions'=>['style'=>'min-width: 50px;'],
                ],
                [
                    'attribute'=>'strength_id',
                    'value' => function ($model) { 
                        return !empty($model->strength_id) ? $model->strength->strength_name : '-';
                        },
                    'contentOptions'=>['style'=>'min-width: 180px;'],
                ],
                [
                    'attribute'=>'typept_id',
                    'value' => function ($model) { 
                        return !empty($model->typept_id) ? $model->typept->typept_name : '-';
                        },
                    'contentOptions'=>['style'=>'min-width: 100px;'],
                ],
                [
                    'attribute'=>'level_acute',
                    'value' => function ($model) { 
                        return !empty($model->level_acute) ? $model->levelacute->level_name : '-';
                        },
                    'contentOptions'=>['style'=>'min-width: 200px;'],
                ],
                'conscious',
                [
                    'attribute'=>'cause_referout_id',
                    'value' => function ($model) { 
                        return !empty($model->cause_referout_id) ? $model->causereferout->cause_referout_name : '-';
                        //return $model->causereferout->cause_referout_name;
                        },
                    'contentOptions'=>['style'=>'min-width: 200px;'],
                ],
                [
                    'attribute'=>'loads_id',
                    'value' => function ($model) { 
                        return !empty($model->loads_id) ? $model->loads->loads_name : '-';
                        //return $model->causereferout->cause_referout_name;
                        },
                    'contentOptions'=>['style'=>'min-width: 200px;'],
                ],
                'load_time',
                'pttype_name',
                'drugallergy',
                'doctor_name',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'header'=>'Action',
                    'template'=>'{view}',
                    'buttons'=>[
                        'view' => function($url,$model,$key){
                            return Html::a('<i class="glyphicon glyphicon-eye-open"></i>',['detail','id'=>$model->refer_no],['data-pjax' => '0']);
                          }
                        ]
                    //detail
                ],
            ],
            
        ])?>
    </div>
</div>
<div>
