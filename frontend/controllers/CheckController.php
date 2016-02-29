<?php

namespace frontend\controllers;

use yii\web\Controller;
use yii\db\Query;
use Yii;
use yii\data\ArrayDataProvider;
use mdm\admin\components\AccessControl;
use yii\filters\VerbFilter;

class CheckController extends Controller {

    public function actionIndex() {
        $sql_chart1 = "SELECT COUNT(DISTINCT hn) AS cc_hn FROM vn_stat WHERE vstdate  BETWEEN '2015-10-01' AND DATE(NOW())AND (pdx='' OR pdx IS NULL)";
        $sql_chart2 = "SELECT COUNT(DISTINCT hn) AS cc_hn FROM an_stat  WHERE  dchdate BETWEEN '2015-10-01' AND DATE(NOW())AND (pdx='' OR pdx IS NULL)";
        $sql_chart3 = "SELECT COUNT(DISTINCT hn) AS cc_hn FROM patient WHERE  patient.hn  IN (SELECT hn FROM vn_stat WHERE vstdate  BETWEEN '2015-10-01' AND DATE(NOW())) AND (patient.type_area='' OR patient.type_area<>'4' OR patient.type_area IS NULL)";
        $sql_chart4 = "SELECT COUNT(DISTINCT p.hn) AS cc_hn
        FROM er_nursing_detail en
        INNER JOIN ovst o ON o.vn=en.vn
        INNER JOIN ovst_seq os ON os.vn=en.vn
        INNER JOIN er_regist e ON e.vn=o.vn
        INNER JOIN er_pt_type erpt ON erpt.er_pt_type=e.er_pt_type AND erpt.accident_code='Y'
        INNER JOIN patient p ON p.hn=o.hn
        INNER JOIN pq_screen  pq ON pq.vn=en.vn
        INNER JOIN opduser ou ON ou.loginname=pq.staff
        WHERE e.vstdate BETWEEN '2015-10-01' AND DATE(NOW())
        AND (en.accident_place_type_id='' OR en.accident_place_type_id IS NULL
        or en.visit_type='' OR en.visit_type IS NULL
        or en.accident_alcohol_type_id='' OR en.accident_alcohol_type_id IS NULL
        or en.accident_drug_type_id='' OR en.accident_drug_type_id IS NULL
        or en.accident_airway_type_id='' OR en.accident_airway_type_id IS NULL
        or en.accident_bleed_type_id='' OR en.accident_bleed_type_id IS NULL
        or en.accident_splint_type_id='' OR en.accident_splint_type_id IS NULL
        or en.accident_fluid_type_id='' OR en.accident_fluid_type_id IS NULL
        or en.er_emergency_type='' OR en.er_emergency_type IS NULL )
        ORDER BY e.enter_er_time";
        $sql_chart5 = "SELECT COUNT(DISTINCT o.hn) AS cc_hn FROM ovstdiag o WHERE  o.vstdate  BETWEEN '2015-10-01' AND DATE(NOW())
                       AND (o.diagtype='' OR o.diagtype IS NULL OR o.diagtype NOT IN('1','2','3','4','5','6','7'))";
        $sql_chart6 = "SELECT COUNT(DISTINCT person_id)AS cc_pid FROM person WHERE house_regist_type_id IN ('1','3')
                       AND nationality<>'99' AND death='N'";
        $sql_chart7 = "SELECT  COUNT(DISTINCT person_id)AS cc_pid FROM person WHERE house_regist_type_id IN ('1','3') AND person_discharge_id<>'9'AND death='N'";
        $sql_chart8 = "SELECT COUNT(DISTINCT person_id) AS cc_pid FROM person WHERE village_id='1' AND house_regist_type_id IN ('1','3')";
        $sql_chart9 = "SELECT COUNT(house_id) AS cc_house FROM house WHERE (location_area_id IS NULL  OR location_area_id= ''
                       OR house_type_id IS NULL OR house_type_id= '' OR house_subtype_id  IS NULL OR house_subtype_id ='')";

        $chart1 = Yii::$app->db2->createCommand($sql_chart1)->queryAll();
        $chart2 = Yii::$app->db2->createCommand($sql_chart2)->queryAll();
        $chart3 = Yii::$app->db2->createCommand($sql_chart3)->queryAll();
        $chart4 = Yii::$app->db2->createCommand($sql_chart4)->queryAll();
        $chart5 = Yii::$app->db2->createCommand($sql_chart5)->queryAll();
        $chart6 = Yii::$app->db2->createCommand($sql_chart6)->queryAll();
        $chart7 = Yii::$app->db2->createCommand($sql_chart7)->queryAll();
        $chart8 = Yii::$app->db2->createCommand($sql_chart8)->queryAll();
        $chart9 = Yii::$app->db2->createCommand($sql_chart9)->queryAll();

        return $this->render('index', [
            'chart1' => $chart1,
            'chart2' => $chart2,
            'chart3' => $chart3,
            'chart4' => $chart4,
            'chart5' => $chart5,
            'chart6' => $chart6,
            'chart7' => $chart7,
            'chart8' => $chart8,
            'chart9' => $chart9]);
    }
    public function actionDetail1() {
            $role = isset(Yii::$app->user->identity->role) ? Yii::$app->user->identity->role : 99;
        if ($role == 99) {
            throw new \yii\web\ConflictHttpException('คุณไม่ได้รับอนุญาติให้เข้าใช้งานส่วนนี้ กรุณาติดต่อผู้ดูแลระบบ !');
        }
        return $this->render('detail1');
    }
    public function actionDetail2() {
            $role = isset(Yii::$app->user->identity->role) ? Yii::$app->user->identity->role : 99;
        if ($role == 99) {
            throw new \yii\web\ConflictHttpException('คุณไม่ได้รับอนุญาติให้เข้าใช้งานส่วนนี้ กรุณาติดต่อผู้ดูแลระบบ !');
        }
        return $this->render('detail2');
    }
    public function actionDetail3() {
            $role = isset(Yii::$app->user->identity->role) ? Yii::$app->user->identity->role : 99;
        if ($role == 99) {
            throw new \yii\web\ConflictHttpException('คุณไม่ได้รับอนุญาติให้เข้าใช้งานส่วนนี้ กรุณาติดต่อผู้ดูแลระบบ !');
        }
        return $this->render('detail3');
    }
    public function actionDetail4() {
            $role = isset(Yii::$app->user->identity->role) ? Yii::$app->user->identity->role : 99;
        if ($role == 99) {
            throw new \yii\web\ConflictHttpException('คุณไม่ได้รับอนุญาติให้เข้าใช้งานส่วนนี้ กรุณาติดต่อผู้ดูแลระบบ !');
        }
        return $this->render('detail4');
    }
    public function actionDetail5() {
            $role = isset(Yii::$app->user->identity->role) ? Yii::$app->user->identity->role : 99;
        if ($role == 99) {
            throw new \yii\web\ConflictHttpException('คุณไม่ได้รับอนุญาติให้เข้าใช้งานส่วนนี้ กรุณาติดต่อผู้ดูแลระบบ !');
        }
        return $this->render('detail5');
    }
    public function actionDetail6() {
            $role = isset(Yii::$app->user->identity->role) ? Yii::$app->user->identity->role : 99;
        if ($role == 99) {
            throw new \yii\web\ConflictHttpException('คุณไม่ได้รับอนุญาติให้เข้าใช้งานส่วนนี้ กรุณาติดต่อผู้ดูแลระบบ !');
        }
        return $this->render('detail6');
    }
    public function actionDetail7() {
            $role = isset(Yii::$app->user->identity->role) ? Yii::$app->user->identity->role : 99;
        if ($role == 99) {
            throw new \yii\web\ConflictHttpException('คุณไม่ได้รับอนุญาติให้เข้าใช้งานส่วนนี้ กรุณาติดต่อผู้ดูแลระบบ !');
        }
        return $this->render('detail7');
    }
    public function actionDetail8() {
            $role = isset(Yii::$app->user->identity->role) ? Yii::$app->user->identity->role : 99;
        if ($role == 99) {
            throw new \yii\web\ConflictHttpException('คุณไม่ได้รับอนุญาติให้เข้าใช้งานส่วนนี้ กรุณาติดต่อผู้ดูแลระบบ !');
        }
        return $this->render('detail8');
    }
    public function actionDetail9() {
            $role = isset(Yii::$app->user->identity->role) ? Yii::$app->user->identity->role : 99;
        if ($role == 99) {
            throw new \yii\web\ConflictHttpException('คุณไม่ได้รับอนุญาติให้เข้าใช้งานส่วนนี้ กรุณาติดต่อผู้ดูแลระบบ !');
        }
        return $this->render('detail9');
    }

}
