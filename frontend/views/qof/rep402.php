
<?php
$this->title = Yii::t('app', 'เด็กนักเรียน ป. 1 ได้รับการตรวจช่องปาก');
$this->params['breadcrumbs'][] = ['label' => 'ตรวจสอบ qof', 'url' => ['qof/index']];
$this->params['breadcrumbs'][] = 'เด็กนักเรียน ป. 1 ได้รับการตรวจช่องปาก';

use kartik\grid\GridView;
use yii\helpers\Html;
use kartik\date\DatePicker;
use yii\bootstrap\ActiveForm;

?>
<div class="alert alert-primary">
    <h4><font color="#FFFF00">เด็กนักเรียน ป. 1 ได้รับการตรวจช่องปาก (ผู้รับผิดชอบ นัชฒภัทร ปานอำพัน)</font></h4>
    <h6><p><font color="#FFFFFF">เด็กนักเรียนชั้น ป.1 ในโรงเรียนที่ตั้งอยู่ในเขตรับผิดชอบของ รพ. อายุ 6 ปีเต็ม ถึง 7 ปี 11 เดือน 29 วัน เป็นเด็กไทยทุกสิทธิประกันสุขภาพ ได้รับการตรวจช่องปาก 
    (ช่วง 1 เมษายน 2558 ถึง 31 มีนาคม 2559) เกณฑ์เป้าหมายไม่น้อยกว่าร้อยละ 85 </font></p></h6>
</div>
<div class='well'>
    <div class="row">
        <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>
        <div class="col-md-3">
            ระบุวันที่   
            <?php
            echo DatePicker::widget([
                'name' => 'date1',
                'value' => $date1,
                'language' => 'th',
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                    'changeMonth' => true,
                    'changeYear' => true,
                    'todayHighlight' => true
                ]
            ]);
            ?>
        </div>

        <div class="col-md-3">
            ถึง
            <?php
            echo DatePicker::widget([
                'name' => 'date2',
                'value' => $date2,
                'language' => 'th',
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                    'changeMonth' => true,
                    'changeYear' => true,
                    'todayHighlight' => true
                ]
            ]);
            ?>
        </div>

        <div class="col-md-2">
            <label><font color="#FFFF">.</font></label>
            <div class="input-group">
                <?= Html::submitButton('ประมวลผล') ?>
            </div><!-- /.input group -->
        </div>  
        <?php ActiveForm::end(); ?>
    </div>
</div>
<?php
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'panel' => [
        'type' => GridView::TYPE_DEFAULT,
        //'before' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Reload', ['/dental/index'], ['class' => 'btn btn-info']),
        //'after' => 'วันที่ประมวลผล '.date('Y-m-d H:i:s').' น.',
    ],
    //'showFooter'=>TRUE,
    'responsive' => TRUE,
    'hover' => TRUE,
    'floatHeader' => TRUE,
    'pjax'=>TRUE,
    'pjaxSettings'=>[
        'neverTimeout'=> TRUE,
        'beforeGrid'=>'',
        'afterGrid'=>'',
    ],
    'columns' => [
        [
            'class'=>'yii\grid\SerialColumn'
        ],
        [
            'attribute' => 'school_name',
            'header' => 'โรงเรียน'
        ],
        [
            'label' => 'เป้าหมาย (คน)',
            'format' => 'raw',
            'value' => function($model){
                return  Html::a(Html::encode($model['b']),['/qof/goal402' ,'id'=>$model['village_school_id']]);
            }// end value
        ],
        [
            'label' => 'ผลงาน  (คน)',
            'format' => 'raw',
            'value' => function($model) use($date1,$date2){
                return  Html::a(Html::encode($model['a']),['/qof/result402' ,'id'=>$model['village_school_id'], 'date1' => $date1, 'date2' => $date2]);
            }// end value
        ]
    ]
]);

