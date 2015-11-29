
<?php
$this->title = Yii::t('app', 'การสั่งใช้ยาสมุนไพรพื้นฐานมากกว่า 10 รายการ ');
$this->params['breadcrumbs'][] = ['label' => 'ตรวจสอบ qof', 'url' => ['qof/index']];
$this->params['breadcrumbs'][] = 'หน่วยบริการที่มีแพทย์แผนไทยปฏิบัติงานประจำและมีการสั่งใช้ยาสมุนไพรพื้นฐานมากกว่า 10 รายการ ';

use kartik\grid\GridView;
use yii\helpers\Html;
use kartik\date\DatePicker;
use yii\bootstrap\ActiveForm;

?>
<div class="alert alert-primary">
    <h4><font color="#FFFF00">หน่วยบริการมีการสั่งใช้ยาสมุนไพรพื้นฐานมากกว่า 10 รายการ (ผู้รับผิดชอบ จริญญา สันทะวา)</font></h4>
     <h6><p><font color="#FFFFFF">จ่ายยาสมุนไพรมากกว่า 10 รายการ นับยานอกและในบัญชี นับเฉพาะสิทธิ UC รหัสยาสมุนไพร ขึ้นต้นด้วย 41 และ 42(ช่วง 1 เมษายน 2558 ถึง 31 มีนาคม 2559) เกณฑ์เป้าหมายไม่น้อยกว่าร้อยละ 70 </font></p></h6>
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
            'attribute' => 'icode',
            'header' => 'รหัสยา'
        ],
        [
            'attribute' => 'name',
            'header' => 'ชื่อยา'
        ], 
        [
            'attribute' => 'did',
            'header' => 'รหัสยา 24 หลัก'
        ], 
        [
            'attribute' => 'strength',
            'header' => 'ขนาด'
        ], 
        [
            'attribute' => 'units',
            'header' => 'หน่วย'
        ],
        [
            'attribute' => 'cc_drug',
            'header' => 'สิทธิ UC (ครั้ง)'
        ]
    ]
]);

