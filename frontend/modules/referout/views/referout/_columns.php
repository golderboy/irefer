<?php
use yii\helpers\Url;

return [
    /*[
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],*/
    [
        'class' => 'yii\grid\SerialColumn',
        'contentOptions'=>['style'=>'width: 15px;'],
    ],
    [
        'header' => '<i class="fas fa-ambulance"></i>',
        //'label'=>'<i class="fas fa-ambulance"></i>',
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
        
        'attribute'=>'location_name',
        'contentOptions'=>['style'=>'min-width: 50px;'],
    ],
    //[
    //    
    //    'attribute'=>'from_hospcode',
	//	'value' => function ($model) {
	//		return !empty($model->from_hospcode) ? $model->referfromth : '-';			
	//		//return $model->referfromth;
    //        },
    //    'contentOptions'=>['style'=>'min-width: 180px;'],
    //],
	[
        
        'attribute'=>'refer_hospcode',
		'value' => function ($model) { 
				return !empty($model->refer_hospcode) ? $model->referhospth : '-';
				//return $model->referhospth;
                },
        'contentOptions'=>['style'=>'min-width: 180px;'],
    ],
    //[
    //    
    //    'attribute'=>'refertype_id',
    //],
    [
        
        'attribute'=>'refer_date',
		'value' => function ($model) { return substr($model->refer_date,0,10).' '.$model->refer_time;},
        'contentOptions'=>['style'=>'min-width: 150px;'],
    ],
    //[
    //    
    //    'attribute'=>'refer_time',
    //],
    //[
    //    
    //    'attribute'=>'station_id',
    //],
    // [
        // 
        // 'attribute'=>'location_id',
    // ],
    // [
        // 
        // 'attribute'=>'cid',
    // ],
     [
         
         'attribute'=>'hn',
     ],
    // [
        // 
        // 'attribute'=>'pname',
    // ],
    // [
    //     
    //     'attribute'=>'fname',
	//	 'value' => function ($model) { return $model->pname.' '.$model->fname.' '.$model->lname;},
    //     'contentOptions'=>['style'=>'min-width: 180px;'],
    //],
    // [
        // 
        // 'attribute'=>'lname',
    // ],
    // [
        // 
        // 'attribute'=>'age',
    // ],
    // [
        // 
        // 'attribute'=>'addrpart',
    // ],
    // [
        // 
        // 'attribute'=>'moopart',
    // ],
    // [
        // 
        // 'attribute'=>'tmbpart',
    // ],
    // [
        // 
        // 'attribute'=>'amppart',
    // ],
    // [
        // 
        // 'attribute'=>'chwpart',
    // ],
    // [
        // 
        // 'attribute'=>'pttype_id',
    // ],
    // [
        // 
        // 'attribute'=>'pttypeno',
    // ],
    // [
        // 
        // 'attribute'=>'hospmain',
    // ],
    // [
        // 
        // 'attribute'=>'hospsub',
    // ],
    // [
        // 
        // 'attribute'=>'typept_id',
    // ],
     [
         
         'attribute'=>'strength_id',
		 'value' => function ($model) { 
			return !empty($model->strength_id) ? $model->strength->strength_name : '-';
			//return $model->strength->strength_name;
            },
        'contentOptions'=>['style'=>'min-width: 180px;'],
     ],
    // [
        // 
        // 'attribute'=>'doctor_id',
    // ],
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
	 [
         
         'attribute'=>'cause_referout_id',
		'value' => function ($model) { 
			return !empty($model->cause_referout_id) ? $model->causereferout->cause_referout_name : '-';
			//return $model->causereferout->cause_referout_name;
            },
        'contentOptions'=>['style'=>'min-width: 200px;'],
     ],
	 [
         
         'attribute'=>'memodiag',
         'value' => function ($model) { return $model->memodiag;},
         'contentOptions'=>['style'=>'min-width: 200px;'],
     ],

    // [
        // 
        // 'attribute'=>'expire_date',
    // ],
    // [
        // 
        // 'attribute'=>'loads_id',
    // ],
    // [
        // 
        // 'attribute'=>'is_coordinate_doctor',
    // ],
    // [
        // 
        // 'attribute'=>'is_coordinate_nurse',
    // ],
    // [
        // 
        // 'attribute'=>'coordinate_id',
    // ],
    // [
        // 
        // 'attribute'=>'image1',
    // ],
    // [
        // 
        // 'attribute'=>'is_upload',
    // ],
    // [
        // 
        // 'attribute'=>'is_download',
    // ],
    // [
        // 
        // 'attribute'=>'is_receive',
    // ],
    // [
        // 
        // 'attribute'=>'image2',
    // ],
    // [
        // 
        // 'attribute'=>'image3',
    // ],
    // [
        // 
        // 'attribute'=>'image4',
    // ],
    // [
        // 
        // 'attribute'=>'image5',
    // ],
    // [
        // 
        // 'attribute'=>'sex',
    // ],
    // [
        // 
        // 'attribute'=>'is_coordinate_not',
    // ],
    // [
        // 
        // 'attribute'=>'is_coordinate_no',
    // ],
    // [
        // 
        // 'attribute'=>'is_dead_refer',
    // ],
    // [
        // 
        // 'attribute'=>'is_dead_er',
    // ],
    // [
        // 
        // 'attribute'=>'is_dead_ward',
    // ],
    // [
        // 
        // 'attribute'=>'memo',
    // ],
    // [
        // 
        // 'attribute'=>'memodiag',
    // ],
    // [
        // 
        // 'attribute'=>'drugallergy',
    // ],
    // [
        // 
        // 'attribute'=>'doctor_name',
    // ],
    // [
        // 
        // 'attribute'=>'cc',
    // ],
    // [
        // 
        // 'attribute'=>'user_save',
    // ],
    // [
        // 
        // 'attribute'=>'vn',
    // ],
    // [
        // 
        // 'attribute'=>'conscious',
    // ],
    // [
        // 
        // 'attribute'=>'e',
    // ],
    // [
        // 
        // 'attribute'=>'v',
    // ],
    // [
        // 
        // 'attribute'=>'m',
    // ],
    // [
        // 
        // 'attribute'=>'evm_total',
    // ],
    // [
        // 
        // 'attribute'=>'pupil_right',
    // ],
    // [
        // 
        // 'attribute'=>'pupil_left',
    // ],
    // [
        // 
        // 'attribute'=>'t',
    // ],
    // [
        // 
        // 'attribute'=>'p',
    // ],
    // [
        // 
        // 'attribute'=>'r',
    // ],
    // [
        // 
        // 'attribute'=>'bp',
    // ],
    // [
        // 
        // 'attribute'=>'Send_spclty_id',
    // ],
    // [
        // 
        // 'attribute'=>'load_time',
    // ],
    // [
        // 
        // 'attribute'=>'spo2',
    // ],
    // [
        // 
        // 'attribute'=>'clinicgroup',
    // ],
    // [
        // 
        // 'attribute'=>'clinicsub',
    // ],
    // [
        // 
        // 'attribute'=>'load_date',
    // ],
    // [
        // 
        // 'attribute'=>'vst_date',
    // ],
    // [
        // 
        // 'attribute'=>'station_name',
    // ],
    // [
        // 
        // 'attribute'=>'father',
    // ],
    // [
        // 
        // 'attribute'=>'mother',
    // ],
    // [
        // 
        // 'attribute'=>'location_name',
    // ],
    // [
        // 
        // 'attribute'=>'pttype_name',
    // ],
    // [
        // 
        // 'attribute'=>'forward_flag',
    // ],
    // [
        // 
        // 'attribute'=>'from_hospcode',
    // ],
    // [
        // 
        // 'attribute'=>'save_date',
    // ],
    // [
        // 
        // 'attribute'=>'save_time',
    // ],
    // [
        // 
        // 'attribute'=>'warfarin_note',
    // ],
    // [
        // 
        // 'attribute'=>'app_date',
    // ],
    // [
        // 
        // 'attribute'=>'ett_no',
    // ],
    // [
        // 
        // 'attribute'=>'ett_mark',
    // ],
    // [
        // 
        // 'attribute'=>'sync_memo',
    // ],
    // [
        // 
        // 'attribute'=>'refer_no_his',
    // ],
    // [
        // 
        // 'attribute'=>'level_acute',
    // ],
    // [
        // 
        // 'attribute'=>'cause_referout_etc',
    // ],
    // [
        // 
        // 'attribute'=>'is_consult',
    // ],
    // [
        // 
        // 'attribute'=>'service_id',
    // ],
    [
        'class' => 'yii\grid\ActionColumn',
        'header'=>'Action',
        'template'=>'{view}',
    ],

];   