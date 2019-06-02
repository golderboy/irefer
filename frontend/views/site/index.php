<?php
use frontend\modules\referout\models\Referout;
use miloschuman\highcharts\Highcharts;
use yii\helpers\ArrayHelper;
use yii\data\SqlDataProvider;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Json;
use yii\helpers\Html;

use frontend\assets\AppAsset; 
AppAsset::register($this);

$this->title = 'Refer Web';

$this->registerCss("
.site-index{
  margin-top: 100px;
}
.card-counter{
    box-shadow: 2px 2px 10px #DADADA;
    margin: 5px;
    padding: 20px 10px;
    background-color: #fff;
    height: 100px;
    border-radius: 5px;
    transition: .3s linear all;
  }

  .card-counter:hover{
    box-shadow: 4px 4px 20px #DADADA;
    transition: .3s linear all;
  }

  .card-counter.primary{
    background-color: #007bff;
    color: #FFF;
  }

  .card-counter.danger{
    background-color: #ef5350;
    color: #FFF;
  }  

  .card-counter.success{
    background-color: #66bb6a;
    color: #FFF;
  }  

  .card-counter.info{
    background-color: #26c6da;
    color: #FFF;
  }  

  .card-counter i{
    font-size: 5em;
    opacity: 0.2;
  }

  .card-counter .count-numbers{
    position: absolute;
    right: 35px;
    top: 20px;
    font-size: 32px;
    display: block;
  }

  .card-counter .count-name{
    position: absolute;
    right: 35px;
    top: 65px;
    font-style: italic;
    text-transform: capitalize;
    opacity: 0.5;
    display: block;
    font-size: 18px;
  }
");
?>
<?php
/** DATA */
$Resuscitation = Referout::find()->where(['strength_id'=>'01'])->count();
$Emergency = Referout::find()->where(['strength_id'=>'02'])->count();
$Urgency = Referout::find()->where(['strength_id'=>'03'])->count();
$Semi_urgency = Referout::find()->where(['strength_id'=>'04'])->count();
$Non_urgency = Referout::find()->where(['strength_id'=>'05'])->count();

$groupname = "['Resuscitation','Emergency','Urgency','Semi_urgency','Non_urgency']";
$data = '['.$Resuscitation.','.$Emergency.','.$Urgency.','.$Semi_urgency.','.$Non_urgency.']';
?>

<div class="site-index">
    <div class="body-content">
	<div class="row">
		<div class="col-md-3">
		  <div class="card-counter primary">
			<i class="fas fa-car-crash"></i>
			<span class="count-numbers"><?=$Resuscitation?></span>
			<span class="count-name">Resuscitation</span>
		  </div>
		</div>

		<div class="col-md-3">
		  <div class="card-counter danger">
			<i class="fas fa-ambulance"></i>
			<span class="count-numbers"><?=$Emergency?></span>
			<span class="count-name">Emergency</span>
		  </div>
		</div>

		<div class="col-md-3">
		  <div class="card-counter success">
			<i class="fas fa-dizzy"></i>
			<span class="count-numbers"><?=$Urgency?></span>
			<span class="count-name">Urgency</span>
		  </div>
		</div>

		<div class="col-md-3">
		  <div class="card-counter info">
			<i class="fas fa-meh"></i>
			<span class="count-numbers"><?=$Semi_urgency?></span>
			<span class="count-name">Semi Urgency</span>
		  </div>
		</div>
	 </div>
        <div class="row">
            <div class="col-lg-12">
            <h2>สถิติการรีเฟอร์ ในปี 2562</h2>
            <?php
            echo Highcharts::widget([
              'options' => [
                'chart'=>['type'=>'column'],
                'title' => ['text' => 'Thairefer'],
                'xAxis' => [
                  'categories' => ['Resuscitation','Emergency','Urgency']
                ],
                'yAxis' => [
                  'title' => ['text' => 'ปริมาณครั้ง']
                ],
                'series' => [
                  ['name' => 'Resuscitation', 'data' => [$Resuscitation*1]],
                  ['name' => 'Emergency', 'data' => [$Emergency*1]],
                  ['name' =>'Urgency','data'=> [$Urgency*1]],
                  //['name' =>'Semi_urgency','data'=> [$Semi_urgency*1]],
                  //['name' =>'Non_urgency','data'=> [$Non_urgency*1]],
                ],
              ]
            ]);
            ?>
            </div>
        </div>

    </div>
</div>


