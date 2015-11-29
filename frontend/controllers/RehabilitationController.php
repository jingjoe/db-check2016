<?php

namespace frontend\controllers;

use yii\web\Controller;
use yii\db\Query;
use Yii;
use yii\data\ArrayDataProvider;

class RehabilitationController extends Controller {  
    public function actionIndex() {
        $role = isset(Yii::$app->user->identity->role) ? Yii::$app->user->identity->role : 99;
        if ($role == 99) {
            throw new \yii\web\ConflictHttpException('คุณไม่ได้รับอนุญาติให้เข้าใช้งานส่วนนี้ กรุณาติดต่อผู้ดูแลระบบ !');
        } 
        
        $date1 = "";
        $date2 = "";
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }
          
        
        $sql = "SELECT  CONCAT(pt.pname,pt.fname,' ',pt.lname) full_name
        ,pt.cid AS pid
        ,pm.vn
        ,pm.vstdate AS date_serv
        ,pi.icd9 AS rehabocde
        ,pm.doctor_text AS provider
        FROM physic_main pm
        LEFT OUTER JOIN vn_stat v ON v.vn=pm.vn
        LEFT OUTER JOIN ovst_seq o ON o.vn=pm.vn
        LEFT OUTER JOIN physic_main_ipd pmi ON pmi.hn=pm.hn
        LEFT OUTER JOIN physic_list pl ON pl.vn=pm.vn
        LEFT OUTER JOIN physic_items pi ON pi.physic_items_id=pl.physic_items_id
        LEFT OUTER JOIN patient pt ON pt.hn=pm.hn
        WHERE pm.vstdate BETWEEN '$date1' AND '$date2'
        AND (pt.cid is null  or pt.cid= ''
        OR pm.vstdate is null or pm.vstdate= '' 
        OR pi.icd9 is null or pi.icd9 ='')";
        
        $data = Yii::$app->db2->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider, 'date1' => $date1, 'date2' => $date2]);
    }  
    public function actionView($id=NULL ,$date1 = NULL, $date2 = NULL) {
        $role = isset(Yii::$app->user->identity->role) ? Yii::$app->user->identity->role : 99;
        if ($role == 99) {
            throw new \yii\web\ConflictHttpException('คุณไม่ได้รับอนุญาติให้เข้าใช้งานส่วนนี้ กรุณาติดต่อผู้ดูแลระบบ !');
        }
        
        $sql = "SELECT  (SELECT hospitalcode FROM opdconfig) AS hospcode
        ,CONCAT(pt.pname,pt.fname,' ',pt.lname) full_name
        ,pt.cid AS pid
        ,pm.vn
        ,o.seq_id AS seq
        ,pmi.an
        ,pmi.vstdate AS date_admit
        ,pm.vstdate AS date_serv
        ,'' AS date_start
        ,'' AS date_finish
        ,pi.icd9 AS rehabocde
        ,pl.at_device_code AS at_device
        ,pl.at_device_qty AS at_no
        ,(SELECT hospitalcode FROM opdconfig) AS rehabplace
        ,pm.doctor_text AS provider
        ,CONCAT(pm.vstdate,' ',pm.service_time) AS d_update
        FROM physic_main pm
        LEFT OUTER JOIN vn_stat v ON v.vn=pm.vn
        LEFT OUTER JOIN ovst_seq o ON o.vn=pm.vn
        LEFT OUTER JOIN physic_main_ipd pmi ON pmi.hn=pm.hn
        LEFT OUTER JOIN physic_list pl ON pl.vn=pm.vn
        LEFT OUTER JOIN physic_items pi ON pi.physic_items_id=pl.physic_items_id
        LEFT OUTER JOIN patient pt ON pt.hn=pm.hn
        WHERE pm.vstdate BETWEEN '$date1' AND '$date2'
        AND pm.vn='$id'
        AND (pt.cid is null  or pt.cid= ''
        OR pm.vstdate is null or pm.vstdate= '' 
        OR pi.icd9 is null or pi.icd9 ='')";
        
       $data = Yii::$app->db2->createCommand($sql)->queryAll();
        return $this->render('view', ['data_view' => $data]);
    }
}

