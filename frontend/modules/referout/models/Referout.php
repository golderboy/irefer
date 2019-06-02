<?php

namespace frontend\modules\referout\models;

use Yii;

/**
 * This is the model class for table "referout".
 *
 * @property string $refer_no
 * @property string $refertype_id
 * @property string $refer_date
 * @property string $refer_time
 * @property string $station_id
 * @property string $location_id
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
 * @property string $pttypeno
 * @property string $hospmain
 * @property string $hospsub
 * @property string $typept_id
 * @property string $strength_id
 * @property string $doctor_id
 * @property string $refer_hospcode
 * @property string $cause_referout_id
 * @property string $expire_date
 * @property string $loads_id
 * @property string $is_coordinate_doctor
 * @property string $is_coordinate_nurse
 * @property string $coordinate_id
 * @property string $image1
 * @property int $is_upload
 * @property int $is_download
 * @property int $is_receive
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
 * @property string $doctor_name
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
 * @property string $Send_spclty_id
 * @property string $load_time
 * @property string $spo2
 * @property string $clinicgroup
 * @property string $clinicsub
 * @property string $load_date
 * @property string $vst_date
 * @property string $station_name
 * @property string $father
 * @property string $mother
 * @property string $location_name
 * @property string $pttype_name
 * @property string $forward_flag
 * @property string $from_hospcode
 * @property string $save_date
 * @property string $save_time
 * @property string $warfarin_note
 * @property string $app_date
 * @property string $ett_no
 * @property string $ett_mark
 * @property string $sync_memo
 * @property string $refer_no_his
 * @property string $level_acute
 * @property string $cause_referout_etc
 * @property string $is_consult
 * @property string $service_id
 */
class Referout extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'referout';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['refer_no', 'refer_date'], 'required'],
            [['refer_date', 'expire_date', 'load_date', 'vst_date', 'save_date', 'app_date'], 'safe'],
            [['is_upload', 'is_download', 'is_receive'], 'integer'],
            [['memo', 'memodiag'], 'string'],
            [['refer_no', 'pname', 'ett_no', 'ett_mark'], 'string', 'max' => 20],
            [['refertype_id', 'station_id', 'moopart', 'hospmain', 'hospsub', 'typept_id', 'strength_id', 'refer_hospcode', 'cause_referout_id', 'loads_id', 'coordinate_id', 'is_consult'], 'string', 'max' => 5],
            [['refer_time', 'location_id', 'hn', 'fname', 'lname', 'Send_spclty_id', 'clinicgroup', 'clinicsub', 'forward_flag', 'from_hospcode', 'save_time', 'refer_no_his', 'level_acute', 'service_id'], 'string', 'max' => 50],
            [['cid'], 'string', 'max' => 13],
            [['age', 'load_time'], 'string', 'max' => 10],
            [['addrpart', 'pttype_id', 'pttypeno', 'doctor_id', 'doctor_name', 'station_name'], 'string', 'max' => 100],
            [['tmbpart', 'amppart', 'chwpart'], 'string', 'max' => 2],
            [['is_coordinate_doctor', 'is_coordinate_nurse', 'image1', 'image2', 'image3', 'image4', 'image5'], 'string', 'max' => 1],
            [['sex', 'is_coordinate_not', 'is_coordinate_no', 'is_dead_refer', 'is_dead_er', 'is_dead_ward'], 'string', 'max' => 45],
            [['drugallergy'], 'string', 'max' => 900],
            [['cc', 'user_save'], 'string', 'max' => 4500],
            [['vn', 'conscious', 'e', 'v', 'm', 'evm_total', 'pupil_right', 'pupil_left', 't', 'p', 'r', 'bp', 'spo2', 'father', 'mother', 'location_name'], 'string', 'max' => 150],
            [['pttype_name'], 'string', 'max' => 500],
            [['warfarin_note'], 'string', 'max' => 1500],
            [['sync_memo', 'cause_referout_etc'], 'string', 'max' => 2000],
            [['refer_no'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'refer_no' => 'Refer No',
            'refertype_id' => 'Refertype ID',
            'refer_date' => 'วันที่ Refer',
            'refer_time' => 'Refer Time',
            'station_id' => 'แผนก',
            'location_id' => 'Location ID',
            'cid' => 'Cid',
            'hn' => 'Hn',
            'pname' => 'Pname',
            'fname' => 'ชื่อผู้ป้วย',
            'lname' => 'Lname',
            'age' => 'อายุ',
            'addrpart' => 'Addrpart',
            'moopart' => 'Moopart',
            'tmbpart' => 'Tmbpart',
            'amppart' => 'Amppart',
            'chwpart' => 'Chwpart',
            'pttype_id' => 'รหัสสิทธิ์',
            'pttypeno' => 'เลขที่สิทธิ์',
            'hospmain' => 'สถานบริการหลัง',
            'hospsub' => 'สถานบริการรอง',
            'typept_id' => 'Trauma',
            'strength_id' => 'ระดับความรุนแรง',
            'doctor_id' => 'รหัสแพทย์',
            'refer_hospcode' => 'ส่งไป',
            'cause_referout_id' => 'เหตุผลการส่งต่อ',
            'expire_date' => 'Expire Date',
            'loads_id' => 'การเดินทาง',
            'is_coordinate_doctor' => 'Is Coordinate Doctor',
            'is_coordinate_nurse' => 'Is Coordinate Nurse',
            'coordinate_id' => 'Coordinate ID',
            'image1' => 'Image1',
            'is_upload' => 'Is Upload',
            'is_download' => 'Is Download',
            'is_receive' => 'Is Receive',
            'image2' => 'Image2',
            'image3' => 'Image3',
            'image4' => 'Image4',
            'image5' => 'Image5',
            'sex' => 'Sex',
            'is_coordinate_not' => 'Is Coordinate Not',
            'is_coordinate_no' => 'Is Coordinate No',
            'is_dead_refer' => 'Dead Refer',
            'is_dead_er' => 'Dead Er',
            'is_dead_ward' => 'Dead Ward',
            'memo' => 'คำแนะนำ',
            'memodiag' => 'คำวินิฉัย',
            'drugallergy' => 'การแพ้ยา',
            'doctor_name' => 'ชื่อแพทย์',
            'cc' => 'Cc',
            'user_save' => 'User Save',
            'vn' => 'Vn',
            'conscious' => 'ระดับความมีสติ',
            'e' => 'E',
            'v' => 'V',
            'm' => 'M',
            'evm_total' => 'Evm',
            'pupil_right' => 'Pupil R',
            'pupil_left' => 'Pupil L',
            't' => 'T',
            'p' => 'P',
            'r' => 'R',
            'bp' => 'Bp',
            'Send_spclty_id' => 'Send Spclty ID',
            'load_time' => 'เวลาเริ่มเดินทาง',
            'spo2' => 'Spo2',
            'clinicgroup' => 'Clinicgroup',
            'clinicsub' => 'Clinicsub',
            'load_date' => 'Load Date',
            'vst_date' => 'Vst Date',
            'station_name' => 'Station Name',
            'father' => 'บิดา',
            'mother' => 'มารดา',
            'location_name' => 'ห้อง',
            'pttype_name' => 'สิทธิ์',
            'forward_flag' => 'Forward Flag',
            'from_hospcode' => 'นำส่งโดย',
            'save_date' => 'Save Date',
            'save_time' => 'Save Time',
            'warfarin_note' => 'Warfarin Note',
            'app_date' => 'App Date',
            'ett_no' => 'Ett No',
            'ett_mark' => 'Ett Mark',
            'sync_memo' => 'Sync Memo',
            'refer_no_his' => 'Refer No His',
            'level_acute' => 'Acute',
            'cause_referout_etc' => 'Cause Referout Etc',
            'is_consult' => 'Is Consult',
            'service_id' => 'Service ID',
        ];
    }
	
	public function getStrength()
    {
        return $this->hasOne(Strength::className(), ['strength_id' => 'strength_id']);
    }

	public function getCausereferout()
    {
        return $this->hasOne(Causereferout::className(), ['cause_referout_id' => 'cause_referout_id']);
    }
	public function getLevelacute()
    {
        return $this->hasOne(Level::className(), ['level_id' => 'level_acute']);
    }
	public function getHospcodefrom()
    {
        return $this->hasOne(Hospcode::className(), ['hospcode' => 'from_hospcode']);
    }
	public function getHospcoderefer()
    {
        return $this->hasOne(Hospcode::className(), ['hospcode' => 'refer_hospcode']);
    }
	public function getReferoutdiag()
    {
        return $this->hasOne(Referoutdiag::className(), ['refer_no' => 'refer_no']);
    }
	public function getPr()
    {
        return $this->p.'/'.$this->r;
    }
	public function getReferhospth()
    {
        return $this->refer_hospcode.' : '.$this->hospcoderefer->hospname;
    }
	public function getReferfromth()
    {
        return $this->from_hospcode.' : '.$this->hospcodefrom->hospname;
    }
	public function getDiagfull()
    {
        return $this->referoutdiag->icd10.' : '.$this->memodiag;
    }
    //Referoutreply
    public function getCheckreply()
    {
        $data = Referoutreply::find()->where(['referout_no' => $this->refer_no])->count();
        return  $data;
    }
    //Typept
    public function getTypept()
    {
        return $this->hasOne(Typept::className(), ['typept_id' => 'typept_id']);
    }
    public function getLoads()
    {
        return $this->hasOne(Loads::className(), ['loads_id' => 'loads_id']);
    }

}
/*
SELECT o.refer_no,s.strength_name,l.level_name
,concat(o.pname,' ',o.fname,'',o.lname)as fname,left(o.age,3) as age,o.sex,pttype_name
,concat(o.from_hospcode,' : ',hf.hospname) as 'refer_from',concat(o.refer_hospcode,' : ',hr.hospname) as 'refer_to'
,o.cc,d.icd10,o.memodiag,concat(o.p,'/',o.r) as 'PR',o.bp
,c.cause_referout_name
FROM referout o
LEFT JOIN strength s ON s.strength_id = o.strength_id
LEFT JOIN cause_referout c ON c.cause_referout_id = o.cause_referout_id
LEFT JOIN `level` l ON l.level_id = o.level_acute
LEFT JOIN hospcode hf ON hf.hospcode = o.from_hospcode
LEFT JOIN hospcode hr ON hr.hospcode = o.refer_hospcode
LEFT OUTER JOIN referback_diag d ON d.refer_no = o.refer_no AND d.rec_no = 1
WHERE o.strength_id in ('01','02','03')
AND o.refer_date BETWEEN 20190101 AND 20190131

limit 1000
*/
