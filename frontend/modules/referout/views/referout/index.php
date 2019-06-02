<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
use kartik\widgets\Select2;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
use yii\web\JsExpression;
use yii\base\Response;
use frontend\modules\referout\models\Station;
use frontend\modules\ireport\models\Referoutdiag;
use frontend\assets\AppAsset; 
AppAsset::register($this);

$this->registerCss("
.card-body{
    background-color: #dfdfdf;
    padding:10px;
}
");

$js=<<<JS
$(document).ready(function() {
    $('#minus').on('click', function(e) {
        //$('persanal').hide();
        $("#search").addClass('hidden');
    });
    $('#plus').on('click', function(e) {
        //$('persanal').show();
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
<div class="referout-index">
<?php
    $title_plus = '*';
    if(!empty($date1) && !empty($date2)){ " ".$title_plus .= " ระหว่างวันที่ ".$date1." ถึง ".$date2; }
    if(!empty($station) ){ 
        $data = Station::find()->where(['station_id'=>$station])->one();
        " ห้อง ".$data->station_name; 
    }

$this->title = 'ผู้ป่วยส่งรีเฟอร์ '.$title_plus;
?>
    <nav aria-label="breadcrumb" class="yii\bootstrap4\Breadcrumbs">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><?=Html::a('หน้าหลัก',['/site/index']);?></li>
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
        <div id="search"> 
            <?php 
            $form = ActiveForm::begin([
                        'method'=>'Get',
                        'action'=>Url::to(['/referout/referout/index']),
                    ]);
                    echo "<div class='row'>";
                    echo "<div class='col col-md-4'>";	
                    echo $form->field($model, 'refer_date')->textInput(['name'=>'date1','type'=>'date']);
                    echo "</div>";
                    echo "<div class='col col-md-4'>";
                    echo $form->field($model, 'refer_date')->textInput(['name'=>'date2','type'=>'date']);
                    echo "</div>";
                    echo "<div class='col col-md-4'>";
                    echo '<label class="control-label">หน่วยส่งต่อ</label>';
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
                echo "</div>";
                    echo "<div class='form-group'>";
                    if (!Yii::$app->request->isAjax){
                        echo Html::submitButton('ประมวลผล',['class'=>'btn btn-info']).'    '.
                        Html::a('ล้างข้อมูลค้นหา',['index'],['class'=>'btn btn-danger','data-pjax' => '0']);;
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
            //'pager' => ['class' => 'yii\bootstrap4\LinkPager',],
            'options' => [ 
                'style' => 'table-layout: fixed; width: 100%;table-hover table-striped table-condense',
                'class'=>'table-hover table-striped table-condensed' 
            ],
            //'responsiveWrap' => false,
		    'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
            'columns' => require(__DIR__.'/_columns.php'),
            
        ])?>
    </div>
</div>

