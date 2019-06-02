<?php

namespace frontend\modules\ireport\models;

use Yii;

/**
 * This is the model class for table "referout_reply".
 *
 * @property string $hcode
 * @property string $refertype_id
 * @property string $referout_no
 * @property string $referout_date
 * @property string $referout_time
 * @property string $station_id
 * @property string $location_id
 * @property string $location_name
 * @property string $cid
 * @property string $hn
 * @property string $pname
 * @property string $fname
 * @property string $lname
 * @property string $age
 * @property string $addrpart
 * @property string $moopart
 * @property string $tmbpart
 * @property string $amppart
 * @property string $chwpart
 * @property string $pttype_id
 * @property string $pttype_name
 * @property string $pttypeno
 * @property string $hospmain
 * @property string $hospsub
 * @property string $typept_id
 * @property string $strength_id
 * @property string $doctor_id
 * @property string $doctor_name
 * @property string $refer_hospcode
 * @property string $cause_referout_id
 * @property string $expire_date
 * @property string $loads_id
 * @property string $is_coordinate_doctor
 * @property string $is_coordinate_nurse
 * @property string $coordinate_id
 * @property string $receive_no
 * @property string $receive_date
 * @property string $receive_time
 * @property string $receive_station_id
 * @property string $receive_spclty_id
 * @property string $image1
 * @property string $image2
 * @property string $image3
 * @property string $image4
 * @property string $image5
 * @property string $sex
 * @property string $is_coordinate_not
 * @property string $is_coordinate_no
 * @property string $is_dead_refer
 * @property string $is_dead_er
 * @property string $is_dead_ward
 * @property string $memo
 * @property string $memodiag
 * @property string $drugallergy
 * @property string $cc
 * @property string $user_save
 * @property string $vn
 * @property string $conscious
 * @property string $e
 * @property string $v
 * @property string $m
 * @property string $evm_total
 * @property string $pupil_right
 * @property string $pupil_left
 * @property string $t
 * @property string $p
 * @property string $r
 * @property string $bp
 * @property string $father
 * @property string $mother
 * @property string $Send_spclty_id
 * @property string $load_date
 * @property string $load_time
 * @property string $typept_id_end
 * @property string $strength_id_end
 * @property string $memoDiag_end
 * @property string $bed_id
 * @property string $spo2
 * @property string $clinicgroup
 * @property string $clinicsub
 * @property string $station_name
 * @property string $readdata_date
 * @property string $readdata_time
 * @property string $showdata_date
 * @property string $showdata_time
 * @property string $memonote
 * @property string $forward_flag
 * @property string $save_date
 * @property string $save_time
 * @property string $warfarin_note
 * @property string $app_date
 * @property string $ett_no
 * @property string $ett_mark
 * @property string $hn_tohosp
 * @property string $sync_memo
 * @property string $sync_memo_read
 * @property string $level_acute
 * @property string $level_acute_end
 * @property string $bedtype
 * @property string $refer_no_his
 * @property string $reply_memo
 * @property string $cause_referout_etc
 * @property string $dead_type
 * @property string $ok_date
 * @property string $ok_time
 * @property string $is_consult
 * @property string $pacsno
 * @property string $service_id
 * @property string $timepercase
 * @property string $casestartdate
 * @property string $casefinishdate
 */
class Referoutreply extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'referout_reply';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hcode', 'refertype_id', 'referout_no', 'referout_date'], 'required'],
            [['referout_date', 'expire_date', 'receive_date', 'load_date', 'readdata_date', 'showdata_date', 'save_date', 'app_date', 'ok_date', 'casestartdate', 'casefinishdate'], 'safe'],
            [['memo', 'memodiag'], 'string'],
            [['hcode', 'refertype_id', 'station_id', 'moopart', 'hospmain', 'hospsub', 'typept_id', 'strength_id', 'refer_hospcode', 'cause_referout_id', 'loads_id', 'coordinate_id', 'receive_station_id', 'receive_spclty_id', 'typept_id_end', 'strength_id_end', 'sync_memo_read', 'dead_type', 'is_consult', 'timepercase'], 'string', 'max' => 5],
            [['referout_no', 'pname', 'receive_no', 'ett_no', 'ett_mark'], 'string', 'max' => 20],
            [['referout_time', 'location_id', 'location_name', 'hn', 'fname', 'lname', 'receive_time', 'Send_spclty_id', 'bed_id', 'spo2', 'clinicgroup', 'clinicsub', 'forward_flag', 'save_time', 'hn_tohosp', 'level_acute', 'level_acute_end', 'bedtype', 'refer_no_his', 'pacsno'], 'string', 'max' => 50],
            [['cid'], 'string', 'max' => 13],
            [['age', 'load_time', 'ok_time', 'service_id'], 'string', 'max' => 10],
            [['addrpart', 'pttype_id', 'pttypeno', 'doctor_id', 'doctor_name', 'station_name', 'readdata_time', 'showdata_time'], 'string', 'max' => 100],
            [['tmbpart', 'amppart', 'chwpart'], 'string', 'max' => 2],
            [['pttype_name'], 'string', 'max' => 500],
            [['is_coordinate_doctor', 'is_coordinate_nurse', 'image1', 'image2', 'image3', 'image4', 'image5'], 'string', 'max' => 1],
            [['sex', 'is_coordinate_not', 'is_coordinate_no', 'is_dead_refer', 'is_dead_er', 'is_dead_ward'], 'string', 'max' => 45],
            [['drugallergy'], 'string', 'max' => 900],
            [['cc'], 'string', 'max' => 4500],
            [['user_save', 'vn', 'conscious', 'e', 'v', 'm', 'evm_total', 'pupil_right', 'pupil_left', 't', 'p', 'r', 'bp', 'father', 'mother'], 'string', 'max' => 150],
            [['memoDiag_end', 'memonote'], 'string', 'max' => 8000],
            [['warfarin_note'], 'string', 'max' => 1500],
            [['sync_memo'], 'string', 'max' => 2000],
            [['reply_memo'], 'string', 'max' => 3500],
            [['cause_referout_etc'], 'string', 'max' => 1000],
            [['hcode', 'referout_no'], 'unique', 'targetAttribute' => ['hcode', 'referout_no']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'hcode' => 'Hcode',
            'refertype_id' => 'Refertype ID',
            'referout_no' => 'Referout No',
            'referout_date' => 'Referout Date',
            'referout_time' => 'Referout Time',
            'station_id' => 'Station ID',
            'location_id' => 'Location ID',
            'location_name' => 'Location Name',
            'cid' => 'Cid',
            'hn' => 'Hn',
            'pname' => 'Pname',
            'fname' => 'Fname',
            'lname' => 'Lname',
            'age' => 'Age',
            'addrpart' => 'Addrpart',
            'moopart' => 'Moopart',
            'tmbpart' => 'Tmbpart',
            'amppart' => 'Amppart',
            'chwpart' => 'Chwpart',
            'pttype_id' => 'Pttype ID',
            'pttype_name' => 'Pttype Name',
            'pttypeno' => 'Pttypeno',
            'hospmain' => 'Hospmain',
            'hospsub' => 'Hospsub',
            'typept_id' => 'Typept ID',
            'strength_id' => 'Strength ID',
            'doctor_id' => 'Doctor ID',
            'doctor_name' => 'Doctor Name',
            'refer_hospcode' => 'Refer Hospcode',
            'cause_referout_id' => 'Cause Referout ID',
            'expire_date' => 'Expire Date',
            'loads_id' => 'Loads ID',
            'is_coordinate_doctor' => 'Is Coordinate Doctor',
            'is_coordinate_nurse' => 'Is Coordinate Nurse',
            'coordinate_id' => 'Coordinate ID',
            'receive_no' => 'Receive No',
            'receive_date' => 'Receive Date',
            'receive_time' => 'Receive Time',
            'receive_station_id' => 'Receive Station ID',
            'receive_spclty_id' => 'Receive Spclty ID',
            'image1' => 'Image1',
            'image2' => 'Image2',
            'image3' => 'Image3',
            'image4' => 'Image4',
            'image5' => 'Image5',
            'sex' => 'Sex',
            'is_coordinate_not' => 'Is Coordinate Not',
            'is_coordinate_no' => 'Is Coordinate No',
            'is_dead_refer' => 'Is Dead Refer',
            'is_dead_er' => 'Is Dead Er',
            'is_dead_ward' => 'Is Dead Ward',
            'memo' => 'Memo',
            'memodiag' => 'Memodiag',
            'drugallergy' => 'Drugallergy',
            'cc' => 'Cc',
            'user_save' => 'User Save',
            'vn' => 'Vn',
            'conscious' => 'Conscious',
            'e' => 'E',
            'v' => 'V',
            'm' => 'M',
            'evm_total' => 'Evm Total',
            'pupil_right' => 'Pupil Right',
            'pupil_left' => 'Pupil Left',
            't' => 'T',
            'p' => 'P',
            'r' => 'R',
            'bp' => 'Bp',
            'father' => 'Father',
            'mother' => 'Mother',
            'Send_spclty_id' => 'Send Spclty ID',
            'load_date' => 'Load Date',
            'load_time' => 'Load Time',
            'typept_id_end' => 'Typept Id End',
            'strength_id_end' => 'Strength Id End',
            'memoDiag_end' => 'Memo Diag End',
            'bed_id' => 'Bed ID',
            'spo2' => 'Spo2',
            'clinicgroup' => 'Clinicgroup',
            'clinicsub' => 'Clinicsub',
            'station_name' => 'Station Name',
            'readdata_date' => 'Readdata Date',
            'readdata_time' => 'Readdata Time',
            'showdata_date' => 'Showdata Date',
            'showdata_time' => 'Showdata Time',
            'memonote' => 'Memonote',
            'forward_flag' => 'Forward Flag',
            'save_date' => 'Save Date',
            'save_time' => 'Save Time',
            'warfarin_note' => 'Warfarin Note',
            'app_date' => 'App Date',
            'ett_no' => 'Ett No',
            'ett_mark' => 'Ett Mark',
            'hn_tohosp' => 'Hn Tohosp',
            'sync_memo' => 'Sync Memo',
            'sync_memo_read' => 'Sync Memo Read',
            'level_acute' => 'Level Acute',
            'level_acute_end' => 'Level Acute End',
            'bedtype' => 'Bedtype',
            'refer_no_his' => 'Refer No His',
            'reply_memo' => 'Reply Memo',
            'cause_referout_etc' => 'Cause Referout Etc',
            'dead_type' => 'Dead Type',
            'ok_date' => 'Ok Date',
            'ok_time' => 'Ok Time',
            'is_consult' => 'Is Consult',
            'pacsno' => 'Pacsno',
            'service_id' => 'Service ID',
            'timepercase' => 'Timepercase',
            'casestartdate' => 'Casestartdate',
            'casefinishdate' => 'Casefinishdate',
        ];
    }
}
