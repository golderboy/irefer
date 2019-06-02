<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use frontend\assets\AppAsset; 
AppAsset::register($this);
$this->title = 'รายละเอียด การส่งรีเฟอร์ ';

$this->registerCss("
.nav-link .nav-custom{
    background-color: #ccffcc;
    color:#ffffff;
    font-weight: bold;
    font-size: 2.5em;
}
.person-card {
    margin-top: 2em;
    padding-top: 2em;
}
.person-card .card-title{
    text-align: center;
}
.person-card .person-img{
    width: 10em;
    position: absolute;
    top: -5em;
    left: 50%;
    margin-left: -5em;
    border-radius: 100%;
    overflow: hidden;
    background-color: white;
}
.person-card .card-detail{
    font-size: 18px;
}
");


?>


<div class="referout-view">

    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><?=Html::a('หน้าหลัก',['/site/index']);?></li>
        <li class="breadcrumb-item"><?=Html::a('ผู้ป่วยส่งต่อ',['/referout/referout/index']);?></li>
        <li class="breadcrumb-item active" aria-current="page"><?=$this->title?></li>
    </ol>
    </nav>


    <div class="card person-card">
        <div class="card-body">
                <h2 class="card-title"><i class="fas fa-ambulance icon"></i> Refer Data <?=$model->refer_no?></h2>
                <!-- First row (on medium screen) -->
                <div class="row">
                    <div class="col-md-6">
                        <?= "<b>ผู้ป่วย </b>".$model->pname.' '.$model->fname.' '.$model->lname;?>
                        <?= "<b> เพศ </b>".$model->sex;?>
                        <?= "<b> อายุ </b>".$model->age."<b> (ป-ด-ว) </b><br>";?>
                        <?= "<b> HN </b>".$model->hn."<b> CID </b>".$model->cid."<br>";?>
                        <?= "<b>ที่อยู่ </b>".$model->addrpart.'';?>
                        <?= "<b> บิดา </b>".$model->father;?>
                        <?= "<b> มารดา </b>".$model->mother;?>
                    </div>
                    <div class="col-md-6">
                        <?= "<b> สิทธิ์ </b>".$model->pttype_name.' ( '.$model->pttypeno.' )<b> สถานบริการหลัก </b>'.$model->hospmain.'<br>';?>
                        <?= "<b> การแพ้ยา </b>".$model->drugallergy;?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?= "<b> ส่งต่อ </b>".$model->referfromth.'<b> ถึง </b>'.$model->referhospth;?>
                        <?= "<b> วันที่ </b>".substr($model->refer_date,0,10).' '.$model->refer_time;?>
                        <?= "<b> Strength </b>".$model->strength->strength_name;?>
                        <?= "<b> Trauma </b>".$model->typept->typept_name;?>
                        <?= "<b> Acute </b>".$model->levelacute->level_name."<br>";?>
                        <?= "<b> การขนส่งผู้ป่วย </b>".$model->loads->loads_name;?>
                        <?= "<b> สาเหตุการส่งต่อ </b>".$model->causereferout->cause_referout_name;?>
                        <?= "<b> แพทย์ผู้รักษา </b>".$model->doctor_name;?>
                        
                    </div>
                </div>
                </div>
            </div>
        </div>

        <ul class="nav nav-pills nav-fill " role="tablist">
        <li class="nav-item">
            <a class="nav-link nav-custom active" data-toggle="tab" href="#referdata">ข้อมูลทั่วไป</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-custom" data-toggle="tab" href="#referdiag">การให้รหัสโรค</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-custom" data-toggle="tab" href="#referdrug">การให้ยา</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-custom" data-toggle="tab" href="#referlab">การตรวจแล๊ป</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-custom" data-toggle="tab" href="#referxray">X-ray</a>
        </li>
        </ul>
<div class="tab-content">
    <div class="tab-pane container active" id="referdata">
        <div class="row">
            <div class="col-md-6" style="padding=0.5em;">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">ข้อมูลการตรวจร่างกาย</h2>
                        <div class="card-title">
                            <label >DIAG NOTE</label>
                            <?= DetailView::widget([
                                'model' => $model,
                                'attributes' => [
                                    'bp',
                                    [
                                        'label'=>'pupil L/R',
                                        'value' => function ($model) { 
                                            return $model->pupil_left.'/'.$model->pupil_right;
                                            //return $model->causereferout->cause_referout_name;
                                            },
                                    ],
                                    [
                                        'label'=>'T / P / P',
                                        'value' => function ($model) { 
                                            return $model->t.'/'.$model->p.'/'.$model->r;
                                            //return $model->causereferout->cause_referout_name;
                                            },
                                    ],
                                    [
                                        'label'=>'E / V / M',
                                        'value' => function ($model) { 
                                            return $model->e.'/'.$model->v.'/'.$model->m.' total = '.$model->evm_total;
                                            //return $model->causereferout->cause_referout_name;
                                            },
                                    ],
                                    'conscious',
                                    [
                                        'label'=>'การเสียชีวิต',
                                        'format'=>'raw',
                                        'value' => function ($model) { 
                                            $message = '';
                                            $message .=  $model->is_dead_refer =="Y" ? 'เสียชีวิตขณะนำส่ง : <i class="far fa-check-circle"></i> ' : '';
                                            $message .= $model->is_dead_er =="Y" ? 'เสียชีวิตในห้องฉุกเฉิน : <i class="far fa-check-circle"></i> ' : '';
                                            $message .= $model->is_dead_ward =="Y" ? 'เสียชีวิตที่ผู้ป่วยใน : <i class="far fa-check-circle"></i> ' : '';
                                            return $message;
                                            //return $model->causereferout->cause_referout_name;
                                            },
                                    ]
                                ],
                            ]) ?>
                            <!---
                                     'is_dead_refer',
                                    'is_dead_er',
                                    'is_dead_ward',
                            -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6" style="padding=0.5em;">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">การรักษา</h2>
                        <div class="card-title">
                            <label >DIAG NOTE</label>
                            <?=$model->memodiag?>
                        </div>
                        <div class="card-title">
                            <label >MEMO NOTE</label>
                            <?=$model->memo?>
                        </div>
                        <div class="card-title">
                            <label >CC NOTE</label>
                            <?=$model->cc?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- END TAB Refer Data-->
    <div class="tab-pane container fade" id="referdiag">
        <?=GridView::widget([
                    'id'=>'crud-datatable',
                    'pager' => ['class' => 'yii\bootstrap4\LinkPager',],
                    'dataProvider' => $dataDiag,
                    'options' => [ 'style' => 'table-layout: fixed; width: 100%' ],
                    'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
                    'columns'=>[
                        'icd10','diagtype_id'
                    ]
            ])?>
    </div><!-- END TAB Refer referxray-->
    <div class="tab-pane container fade" id="referdrug">
        <?=GridView::widget([
                'id'=>'crud-datatable',
                'pager' => ['class' => 'yii\bootstrap4\LinkPager',],
                'dataProvider' => $dataDrug,
                'options' => [ 'style' => 'table-layout: fixed; width: 100%' ],
                'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
                'columns'=>[
                    'stockname','touse','toorder','memo1','memo2'
                ]
        ])?>
    </div><!-- END TAB Refer referdrug-->
    <div class="tab-pane container fade" id="referlab">
        <?=GridView::widget([
                    'id'=>'crud-datatable',
                    'pager' => ['class' => 'yii\bootstrap4\LinkPager',],
                    'dataProvider' => $dataLab,
                    'options' => [ 'style' => 'table-layout: fixed; width: 100%' ],
                    'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
                    'columns'=>[
                        'labname','resvalue','norvalue','resdate',
                    ]
            ])?>
    </div><!-- END TAB Refer referlab-->
    <div class="tab-pane container fade" id="referxray">
        <?=GridView::widget([
                    'id'=>'crud-datatable',
                    'pager' => ['class' => 'yii\bootstrap4\LinkPager',],
                    'dataProvider' => $dataXray,
                    'options' => [ 'style' => 'table-layout: fixed; width: 100%' ],
                    'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
                    'columns'=>[
                        'reqno','resvalue','resdate'
                    ]
            ])?>
    </div><!-- END TAB Refer referxray-->

</div><!-- END TAB -->

</div>
