<?php

namespace frontend\controllers;

use yii\web\Controller;
use yii\db\Query;
use Yii;
use yii\data\ArrayDataProvider;

class PostnatalController extends Controller {  
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
        $sql = "SELECT pas.person_anc_service_id AS id
        ,p.person_id AS pid
        ,p.cid
        ,CONCAT(p.pname,p.fname,' ',p.lname) full_name
        ,pa.preg_no AS grvida
        ,pa.labor_date AS bdate
        ,pa.post_labor_service1_date AS ppcare
        ,pa.anc_register_staff AS provider
        FROM person_anc_service pas
        LEFT OUTER JOIN person_anc pa ON pa.person_anc_id=pas.person_anc_id
        LEFT OUTER JOIN person p ON p.person_id=pa.person_id
        LEFT OUTER JOIN ovst_seq o ON o.vn=pas.vn
        WHERE pas.anc_service_date BETWEEN '$date1' AND '$date2'
        AND (p.person_id is null  or p.person_id= ''
        OR pa.preg_no is null or pa.preg_no= '' 
        OR pa.labor_date  is null or pa.labor_date =''
        OR pa.post_labor_service1_date is null or pa.post_labor_service1_date='')";
        
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
        
        $sql = "SELECT pas.person_anc_service_id AS id
        ,(SELECT hospitalcode FROM opdconfig) AS hospcode
        ,p.person_id AS pid
        ,CONCAT(p.pname,p.fname,' ',p.lname) AS full_name
        ,o.seq_id AS seq
        ,pa.preg_no AS grvida
        ,pa.labor_date AS bdate
        ,pa.post_labor_service1_date AS ppcare
        ,pa.labour_hospcode AS ppplace
        ,pas.service_result AS ppresult
        ,pa.anc_register_staff AS provider
        ,pa.last_update AS d_update
        FROM person_anc_service pas
        LEFT OUTER JOIN person_anc pa ON pa.person_anc_id=pas.person_anc_id
        LEFT OUTER JOIN person p ON p.person_id=pa.person_id
        LEFT OUTER JOIN ovst_seq o ON o.vn=pas.vn
        WHERE pas.anc_service_date BETWEEN '$date1' AND '$date1'
        AND pas.person_anc_service_id='$id'
        AND (p.person_id is null  or p.person_id= ''
        OR pa.preg_no is null or pa.preg_no= '' 
        OR pa.labor_date  is null or pa.labor_date =''
        OR pa.post_labor_service1_date is null or pa.post_labor_service1_date='') ";
        
       $data = Yii::$app->db2->createCommand($sql)->queryAll();
        return $this->render('view', ['data_view' => $data]);
    }
}

