<?php

namespace frontend\controllers;

use yii\web\Controller;
use yii\db\Query;
use Yii;
use yii\data\ArrayDataProvider;

class LaborController extends Controller {  
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
          
        
        $sql = "SELECT pa.person_anc_id AS id
        ,pa.person_id AS pid
        ,p.cid
        ,CONCAT(p.pname,p.fname,' ',p.lname) full_name
        ,pa.preg_no AS gravida
        ,pa.lmp
        ,pa.edc
        ,pa.labor_date AS bdate
        ,pa.labor_icd10 AS bresult
        ,pa.last_update AS d_update
        FROM person_anc pa
        LEFT OUTER JOIN person p ON p.person_id=pa.person_id
        LEFT OUTER JOIN labour_place lp ON lp.labour_place_id=pa.labor_place_id
        LEFT OUTER JOIN person_labor_type lt ON lt.person_labor_type_id=pa.labour_type_id
        LEFT OUTER JOIN person_labour_doctor_type pd ON pd.person_labour_doctor_type_id=pa.labor_doctor_type_id
        WHERE pa.force_complete_date BETWEEN '$date1' AND '$date2'
        AND (p.person_id is null  or p.person_id= ''
        OR pa.preg_no is null or pa.preg_no= '' 
        OR pa.lmp  is null or pa.lmp =''
        OR pa.labor_date is null or pa.labor_date=''
        OR pa.labor_icd10 is null or pa.labor_icd10=''
        OR pa.labor_place_id is null or pa.labor_place_id=''
        OR pa.labour_type_id is null or pa.labour_type_id=''
        OR pa.labor_doctor_type_id is null or pa.labor_doctor_type_id=''
        OR pa.alive_child_count is null or pa.alive_child_count=''
        OR pa.dead_child_count is null or pa.dead_child_count=''
        OR pa.last_update is null or pa.last_update='')";
        
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
        
        $sql = "SELECT pa.person_anc_id AS id
        ,(SELECT hospitalcode FROM opdconfig) AS hospcode
        ,pa.person_id AS pid
        ,CONCAT(p.pname,p.fname,' ',p.lname) full_name
        ,pa.preg_no AS gravida
        ,pa.lmp
        ,pa.edc
        ,pa.labor_date AS bdate
        ,pa.labor_icd10 AS bresult
        ,lp.place_name AS bplace
        ,pa.labour_hospcode AS bhosp
        ,lt.person_labor_type_name AS btype
        ,pd.person_labour_doctor_type_name AS bdoctor
        ,pa.alive_child_count AS lborn
        ,pa.dead_child_count AS sborn
        ,pa.last_update AS d_update
        FROM person_anc pa
        LEFT OUTER JOIN person p ON p.person_id=pa.person_id
        LEFT OUTER JOIN labour_place lp ON lp.labour_place_id=pa.labor_place_id
        LEFT OUTER JOIN person_labor_type lt ON lt.person_labor_type_id=pa.labour_type_id
        LEFT OUTER JOIN person_labour_doctor_type pd ON pd.person_labour_doctor_type_id=pa.labor_doctor_type_id
        WHERE pa.force_complete_date BETWEEN '$date1' AND '$date2'
        AND pa.person_anc_id='$id'
        AND (p.person_id is null  or p.person_id= ''
        OR pa.preg_no is null or pa.preg_no= '' 
        OR pa.lmp  is null or pa.lmp =''
        OR pa.labor_date is null or pa.labor_date=''
        OR pa.labor_date is null or pa.labor_icd10=''
        OR pa.labor_place_id is null or pa.labor_place_id=''
        OR pa.labour_type_id is null or pa.labour_type_id=''
        OR pa.labor_doctor_type_id is null or pa.labor_doctor_type_id=''
        OR pa.alive_child_count is null or pa.alive_child_count=''
        OR pa.dead_child_count is null or pa.dead_child_count=''
        OR pa.last_update is null or pa.last_update='')";
        
       $data = Yii::$app->db2->createCommand($sql)->queryAll();
        return $this->render('view', ['data_view' => $data]);
    }
}

