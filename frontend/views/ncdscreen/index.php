
<?php
$this->title = Yii::t('app', 'ตรวจสอบแฟ้ม ncdscreen');
$this->params['breadcrumbs'][] = ['label' => 'ตรวจสอบ 43 แฟ้ม', 'url' => ['oppp/index']];
$this->params['breadcrumbs'][] = 'ตรวจสอบแฟ้ม ncdscreen';

use kartik\grid\GridView;
use yii\helpers\Html;
use kartik\date\DatePicker;
use yii\bootstrap\ActiveForm;

?>

<div class="well">
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
        'type' => GridView::TYPE_SUCCESS,
        //'before' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Reload', ['/dental/index'], ['class' => 'btn btn-info']),
        //'after' => 'วันที่ประมวลผล '.date('Y-m-d H:i:s').' น.',
        'type' => 'success',   
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
            'class'=>'yii\grid\SerialColumn'
        ],
        [
            'attribute' => 'pid',
            'header' => 'PID'
        ],
        [
            'attribute' => 'full_name',
            'header' => 'ชื่อ-นามสกุล'
        ],
        [
            'attribute' => 'date_serv',
            'header' => 'วันรับบริการ'
        ],
        [
            'attribute' => 'weight',
            'header' => 'น้ำหนัก'
        ],
        [
            'attribute' => 'height',
            'header' => 'ส่วนสูง'
        ],  
        [
            'attribute' => 'waist_cm',
            'header' => 'เส้นรอบเอว (ซ.ม.)'
        ],
        [
            'attribute' => 'sbp_1',
            'header' => 'ซิสโตลิก ครั้งที่ 1'
        ],
        [
            'attribute' => 'dbp_1',
            'header' => 'ไดแอสโตลกิ ครั้งที่ 1'
        ],
        [
            'attribute' => 'provider',
            'header' => 'ผู้ให้บริการ'
        ],
        [
            'label' => 'ตรวจสอบ',
            'format' => 'raw',
            'value' => function($data) use($date1,$date2) {
                return  Html::a('<i class="glyphicon glyphicon-ok"></i>',['/ncdscreen/view' ,'id'=>$data['id'], 'date1' => $date1, 'date2' => $date2,]);
            }// end value
        ]
]
]);



