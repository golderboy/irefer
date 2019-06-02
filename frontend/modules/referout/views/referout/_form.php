<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\referout\models\Referout */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="referout-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'refer_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'refertype_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'refer_date')->textInput() ?>

    <?= $form->field($model, 'refer_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'station_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'location_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'age')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'addrpart')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'moopart')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tmbpart')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amppart')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'chwpart')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pttype_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pttypeno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hospmain')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hospsub')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'typept_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'strength_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'doctor_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'refer_hospcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cause_referout_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'expire_date')->textInput() ?>

    <?= $form->field($model, 'loads_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_coordinate_doctor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_coordinate_nurse')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'coordinate_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_upload')->textInput() ?>

    <?= $form->field($model, 'is_download')->textInput() ?>

    <?= $form->field($model, 'is_receive')->textInput() ?>

    <?= $form->field($model, 'image2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image4')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image5')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sex')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_coordinate_not')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_coordinate_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_dead_refer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_dead_er')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_dead_ward')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'memo')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'memodiag')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'drugallergy')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'doctor_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_save')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'conscious')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'e')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'v')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'm')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'evm_total')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pupil_right')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pupil_left')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 't')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'p')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'r')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Send_spclty_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'load_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'spo2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'clinicgroup')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'clinicsub')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'load_date')->textInput() ?>

    <?= $form->field($model, 'vst_date')->textInput() ?>

    <?= $form->field($model, 'station_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'father')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mother')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'location_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pttype_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'forward_flag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'from_hospcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'save_date')->textInput() ?>

    <?= $form->field($model, 'save_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'warfarin_note')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'app_date')->textInput() ?>

    <?= $form->field($model, 'ett_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ett_mark')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sync_memo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'refer_no_his')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'level_acute')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cause_referout_etc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_consult')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'service_id')->textInput(['maxlength' => true]) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
