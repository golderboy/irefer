<?php

namespace frontend\modules\ireport\controllers;

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use frontend\modules\ireport\models\Referout;
use frontend\modules\ireport\models\Referoutdiag;
use frontend\modules\ireport\models\Referoutdrug;
use frontend\modules\ireport\models\Referoutlab;
use frontend\modules\ireport\models\Referoutxray;
use frontend\modules\ireport\models\Referoutreply;

use frontend\modules\ireport\models\Rptout001aSearch;
use frontend\modules\ireport\models\Rptout004aSearch;
/**
 * Default controller for the `ireport` module
 */
class IreportController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    /** VIEW DETAIL */

    protected function findModel($id)
    {
        if (($model = Referout::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionDetail($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "Referout #".$id,
                    'content'=>$this->renderAjax('detail', [
                        'model' => $this->findModel($id),
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
        }else{
            $diag = Referoutdiag::find()->where(['refer_no'=>$id]);
            $dataDiag = new ActiveDataProvider(['query' => $diag,'pagination' => false]);

            $drug = Referoutdrug::find()->where(['refer_no'=>$id]);
            $dataDrug = new ActiveDataProvider(['query' => $drug,'pagination' => false]);

            $lab = Referoutlab::find()->where(['refer_no'=>$id]);
            $dataLab = new ActiveDataProvider(['query' => $lab,'pagination' => false]);

            $xray = Referoutxray::find()->where(['refer_no'=>$id]);
            $dataXray = new ActiveDataProvider(['query' => $xray,'pagination' => false]);

            $reply = Referoutreply::find()->where(['referout_no'=>$id]);
            $dataReply = new ActiveDataProvider(['query' => $reply]);

            return $this->render('detail', [
                'model' => $this->findModel($id),
                'dataDiag' =>$dataDiag,
                'dataDrug' =>$dataDrug,
                'dataLab' =>$dataLab,
                'dataXray' =>$dataXray,
                'dataReply' =>$dataReply,
            ]);
        }
    }
    /** VIEW DETAIL */

    public function actionRptOut001a($date1=null,$date2=null,$station=null,$strength=null)
    {
        $model = new Referout;
        $searchModel = new Rptout001aSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('rpt-out-001a', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'date1'=>$date1,
            'date2'=>$date2,
            'strength'=>$strength,
            'station'=>$station,
            'model' => $model,
        ]);
        //return $this->render('rpt-out-001a');
    }
    public function actionRptOut004a(
        $date1=null,$date2=null,$station=null,$strength=null,
        $causerefer=null,$typept=null,$level=null,$loads=null,$refer_hospcode=null)
    {
        $model = new Referout;
        $searchModel = new Rptout004aSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('rpt-out-004a', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'date1'=>$date1,
            'date2'=>$date2,
            'loads' =>$loads,
            'causerefer' =>$causerefer,
            'typept' =>$typept,
            'level' =>$level,
            'refer_hospcode' =>$refer_hospcode,
            'strength'=>$strength,
            'station'=>$station,
            'model' => $model,
        ]);
        //return $this->render('rpt-out-001a');
    }


}
