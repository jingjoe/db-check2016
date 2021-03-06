<?php
use kartik\grid\GridView;
use yii\helpers\Html;
use kartik\date\DatePicker;
use yii\bootstrap\ActiveForm;

$this->title = 'ตรวจสอบไม่ลงผลวินิจฉัย OPD รายบุคคล';
$this->params['breadcrumbs'][] = ['label' => 'ตรวจสอบข้อมูลบริการและข้อมูลพื้นฐาน', 'url' => ['check/index']];
$this->params['breadcrumbs'][] = 'ตรวจสอบไม่ลงผลวินิจฉัย OPD รายบุคคล';
?>
<br>
<div class="panel panel-primary">
    <div class="panel-heading"><h4><font color="#FFFF00">ตรวจสอบไม่ลงผลวินิจฉัย OPD รายบุคคล </font></h4>
    <h6><p><font color="#FFFFFF"> การลงผลวินิจฉัยผู้ป่วยนอกต้องดำเนินการให้เสร็จภายใน สัปดาห์ที่ 2 ของเดือนถัดไป ตามมติคณะกรรมการสารสนเทศ ลงวันที่ 01 มีนาคม 2559</font></p></h6>
    </div>
</div>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'panel' => [
        'type' => GridView::TYPE_DEFAULT,
        //'before' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Reload', ['/dental/index'], ['class' => 'btn btn-info']),
        //'after' => 'วันที่ประมวลผล '.date('Y-m-d H:i:s').' น.',
    ],
    'responsive' => true,
    'hover' => true,
    'floatHeader' => true,
    'pjax'=>true,
    'pjaxSettings'=>[
        'neverTimeout'=> true,
        'beforeGrid'=>'',
        'afterGrid'=>'',
    ],
    'columns' => [
        [
            'class' => 'yii\grid\SerialColumn'
        ],
        [
            'attribute' => 'hn',
            'header' => 'CID'
        ],
        [
            'attribute' => 'full_name',
            'header' => 'ชื่อ-นามสกุล'
        ],
        [
            'attribute' => 'vstdate',
            'header' => 'วันรับบริการ'
        ],
        [
            'attribute' => 'pdx',
            'header' => 'วนิจฉัยโรค'
        ],
    ]
]);
  
