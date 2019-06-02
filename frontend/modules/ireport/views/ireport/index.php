<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use frontend\assets\AppAsset; 
AppAsset::register($this);
$this->title = 'ระบบรายงานไทยรีเฟอร์ ';

$this->registerCss("
.ireport-index{
  margin-top: 80px;
  font-size: 1.5em;
}
");
?>

<div class="ireport-index">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><?=Html::a('หน้าหลัก',['/site/index']);?></li>
        <li class="breadcrumb-item"><?=Html::a('ผู้ป่วยส่งต่อ',['/referout/referout/index']);?></li>
        <li class="breadcrumb-item active" aria-current="page"><?=$this->title?></li>
    </ol>
    </nav>

    <div class="row">
        <div class="col-md-6">
        <h2 class="title-report">รายงานส่งต่อ</h2>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><?=Html::a('รายงานส่งต่อ แยกตามระดับความรุนแรง <i class="glyphicon glyphicon-ok"></i>',['/ireport/ireport/rpt-out-001a']);?></li>
                <li class="list-group-item"><?=Html::a('รายงานส่งต่อ แยกตามห้องตรวจ',['/ireport/ireport/rpt-out-002a']);?></li>
                <li class="list-group-item"><?=Html::a('รายงานส่งต่อ แยกตามประเภทการส่งต่อ',['/ireport/ireport/rpt-out-003a']);?></li>
                <li class="list-group-item"><?=Html::a('รายงานส่งต่อ CUSTOMs <i class="glyphicon glyphicon-ok"></i>',['/ireport/ireport/rpt-out-004a']);?></li>
                <li class="list-group-item"><?=Html::a('รายงานส่งต่อ แยกตามสรุป',['/ireport/ireport/rpt-out-005a']);?></li>
            </ul>
        </div>
        <div class="col-md-6">
            <h2 class="title-report">รายงานรับส่งต่อ</h2>
            <ul class="list-group list-group-flush">
            <li class="list-group-item"><?=Html::a('รายงานรับส่งต่อ แยกตามระดับความรุนแรง',['/ireport/ireport/rpt-in-001a']);?></li>
                <li class="list-group-item"><?=Html::a('รายงานรับส่งต่อ แยกตามห้องตรวจ',['/ireport/ireport/rpt-in-002a']);?></li>
                <li class="list-group-item"><?=Html::a('รายงานรับส่งต่อ แยกตามประเภทการส่งต่อ',['/ireport/ireport/rpt-in-003a']);?></li>
                <li class="list-group-item"><?=Html::a('รายงานรับส่งต่อ แยกตามสรุป',['/ireport/ireport/rpt-in-004a']);?></li>
            </ul>
        </div>
    </div>
</div>