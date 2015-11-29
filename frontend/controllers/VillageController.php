<?php

namespace frontend\controllers;

use yii\web\Controller;
use yii\db\Query;
use Yii;
use yii\data\ArrayDataProvider;

class VillageController extends Controller {  
    public function actionIndex() {
        $role = isset(Yii::$app->user->identity->role) ? Yii::$app->user->identity->role : 99;
        if ($role == 99) {
            throw new \yii\web\ConflictHttpException('คุณไม่ได้รับอนุญาติให้เข้าใช้งานส่วนนี้ กรุณาติดต่อผู้ดูแลระบบ !');
        } 
        
        $sql = "SELECT vi.village_id AS id
        ,(SELECT hospitalcode FROM opdconfig) AS hospcode
        ,vi.village_name 
        ,vi.village_code AS vid
        ,d.name AS ntraditional
        ,vi.entry_datetime AS d_update
        FROM village vi
        INNER JOIN doctor d ON d.code=vi.doctor_code
        WHERE vi.village_id<>'1'";
        
        $data = Yii::$app->db2->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider]);
    }  
    
}

