<?php
$this->title = Yii::t('app', 'ตรวจสอบ43แฟ้ม');
$this->params['breadcrumbs'][] = 'ตรวจสอบ43แฟ้ม';

use yii\helpers\Html;
?>
<div class="alert alert-primary">
    <h4>โครงสร้างมาตรฐานข้อมูลด้านสุขภาพกระทรวงสาธารณสุข 43 แฟ้ม</h4>
    <h6><p>อ้างอิง คู่มือการปฏิบัติงานการจัดเก็บและจัดส่งข้อมูลตามโครงสร้างมาตรฐานข้อมูลด้านสุขภาพกระทรวงสาธารณสุข Version 2.0 (1 ตุลาคม 2557)ปีงบประมาณ 2558</p></h6>
</div>
<div class="panel panel-warning">
    <div class="panel-heading"><h3 class="panel-title">โครงสร้างมาตรฐานข้อมูล 43/50 แฟ้ม</h3></div>
    <div class="panel-body">
<section class="content">
    <div class="row">
        <!-- /.col1 -->
        <div class="col-md-3">
            <div class="box box-solid">
                <div class="box-header with-border"></div>
                <div class="box-body no-padding">
                    <ul class="nav nav-pills nav-stacked">
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> PERSON <span class="label label-success pull-right"> 1 </span>', ['person/main'], ['class' => 'list-group-item']); ?>
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> ADDRESS <span class="label label-danger pull-right"> 2 </span>', ['address/index'], ['class' => 'list-group-item']); ?>
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> DEATH <span class="label label-danger pull-right"> 3 </span>', ['death/index'], ['class' => 'list-group-item']); ?>
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> CHRONIC <span class="label label-danger pull-right"> 4 </span>', ['chronic/index'], ['class' => 'list-group-item']); ?>
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> CARD <span class="label label-danger pull-right"> 5 </span>', ['card/index'], ['class' => 'list-group-item']); ?>
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> HOME <span class="label label-danger pull-right"> 6 </span>', ['home/index'], ['class' => 'list-group-item']); ?>
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> VILLAGE <span class="label label-danger pull-right"> 7 </span>', ['village/index'], ['class' => 'list-group-item']); ?>
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> DISABILITY <span class="label label-danger pull-right"> 8 </span>', ['disability/index'], ['class' => 'list-group-item']); ?>
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> PROVIDER <span class="label label-danger pull-right"> 9 </span>', ['provider/index'], ['class' => 'list-group-item']); ?> 
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> WOMEN <span class="label label-danger pull-right"> 10 </span>', ['women/index'], ['class' => 'list-group-item']); ?> 
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> DRUGALLERGY <span class="label label-danger pull-right"> 11 </span>', ['drugallergy/index'], ['class' => 'list-group-item']); ?> 
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> FUNCTIONAL <span class="label label-danger pull-right"> 12 </span>', ['functional/index'], ['class' => 'list-group-item']); ?> 
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> ICF <span class="label label-danger pull-right"> 13 </span>', ['icf/index'], ['class' => 'list-group-item']); ?>
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- /.col2 -->
        <div class="col-md-3">
            <div class="box box-solid">
                <div class="box-header with-border"></div>
                <div class="box-body no-padding">
                    <ul class="nav nav-pills nav-stacked">
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> SERVICE <span class="label label-danger pull-right"> 14 </span>', ['service/index'], ['class' => 'list-group-item']); ?>
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> DIAGNOSIS-OPD  <span class="label label-success pull-right"> 15 </span>', ['diagnosisopd/index'], ['class' => 'list-group-item']); ?>
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> DRUG-OPD <span class="label label-danger pull-right"> 16 </span>', ['drugopd/index'], ['class' => 'list-group-item']); ?>
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> PROCEDURE-OPD <span class="label label-success pull-right"> 17 </span>', ['procedureopd/index'], ['class' => 'list-group-item']); ?>
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> CHARGE-OPD <span class="label label-danger pull-right"> 18 </span>', ['chargeopd/index'], ['class' => 'list-group-item']); ?>
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> SURVEILLANCE <span class="label label-danger pull-right"> 19 </span>', ['surveillance/index'], ['class' => 'list-group-item']); ?>
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> ACCIDENT <span class="label label-success pull-right"> 20 </span>', ['accident/index'], ['class' => 'list-group-item']); ?>
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> CHRONICFU <span class="label label-danger pull-right"> 21 </span>', ['chronicfu/index'], ['class' => 'list-group-item']); ?> 
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> LABFU <span class="label label-danger pull-right"> 22 </span>', ['labfu/index'], ['class' => 'list-group-item']); ?> 
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> ADMISSION <span class="label label-danger pull-right"> 23 </span>', ['admission/index'], ['class' => 'list-group-item']); ?>
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> DIAGOSIS-IPD <span class="label label-danger pull-right"> 24 </span>', ['diagnosisipd/index'], ['class' => 'list-group-item']); ?> 
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> DRUG-IPD <span class="label label-danger pull-right"> 25 </span>', ['drugipd/index'], ['class' => 'list-group-item']); ?> 
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> PROCEDURE-IPD <span class="label label-danger pull-right"> 26 </span>', ['procdureipd/index'], ['class' => 'list-group-item']); ?>
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- /.col3 -->
        <div class="col-md-3">
            <div class="box box-solid">
                <div class="box-header with-border"></div>
                <div class="box-body no-padding">
                    <ul class="nav nav-pills nav-stacked">
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> CHARGE-IPD <span class="label label-danger pull-right"> 27 </span>', ['chargeipd/index'], ['class' => 'list-group-item']); ?>
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> APPOINTMENT  <span class="label label-danger pull-right"> 28 </span>', ['appointment/index'], ['class' => 'list-group-item']); ?>
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> DENTAL <span class="label label-success pull-right"> 29 </span>', ['dental/index'], ['class' => 'list-group-item']); ?>
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> REHABILITATION <span class="label label-danger pull-right"> 30 </span>', ['rehabilitaation/index'], ['class' => 'list-group-item']); ?>
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> NCDSCREEN <span class="label label-danger pull-right"> 31 </span>', ['ncdscreen/index'], ['class' => 'list-group-item']); ?>
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> FP <span class="label label-danger pull-right"> 32 </span>', ['fp/index'], ['class' => 'list-group-item']); ?>
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> PRENATAL <span class="label label-danger pull-right"> 33 </span>', ['prenatal/index'], ['class' => 'list-group-item']); ?>
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> ANC <span class="label label-danger pull-right"> 34 </span>', ['anc/index'], ['class' => 'list-group-item']); ?> 
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> LABOR <span class="label label-danger pull-right"> 35 </span>', ['labor/index'], ['class' => 'list-group-item']); ?> 
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> POSTNATAL <span class="label label-danger pull-right"> 36 </span>', ['postnatal/index'], ['class' => 'list-group-item']); ?>
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> NEWBORN <span class="label label-danger pull-right"> 37 </span>', ['newborn/index'], ['class' => 'list-group-item']); ?> 
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> NEWBORNCARE <span class="label label-danger pull-right"> 38 </span>', ['newborncare/index'], ['class' => 'list-group-item']); ?> 
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> EPI <span class="label label-danger pull-right"> 39 </span>', ['epi/index'], ['class' => 'list-group-item']); ?>
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- /.col4 -->
        <div class="col-md-3">
            <div class="box box-solid">
                <div class="box-header with-border"></div>
                <div class="box-body no-padding">
                    <ul class="nav nav-pills nav-stacked">
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> NUTRITION <span class="label label-danger pull-right"> 40 </span>', ['nutrition/index'], ['class' => 'list-group-item']); ?>
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> SPECIALPP  <span class="label label-danger pull-right"> 41 </span>', ['specialpp/index'], ['class' => 'list-group-item']); ?>
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> COMMUNITY-ACTIVITY <span class="label label-danger pull-right"> 42 </span>', ['communityactivity/index'], ['class' => 'list-group-item']); ?>
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> COMMUNITY-SERIVER <span class="label label-danger pull-right"> 43 </span>', ['communityservice/index'], ['class' => 'list-group-item']); ?>
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> CARE-REFER <span class="label label-danger pull-right"> 44 </span>', ['carerefer/index'], ['class' => 'list-group-item']); ?>
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> CLINICAL-REFER <span class="label label-danger pull-right"> 45 </span>', ['clinicalrefer/index'], ['class' => 'list-group-item']); ?>
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> DRUG-REFER <span class="label label-danger pull-right"> 46 </span>', ['drugrefer/index'], ['class' => 'list-group-item']); ?>
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> INVESTIGATION-REFER <span class="label label-danger pull-right"> 47 </span>', ['investigationrefer/index'], ['class' => 'list-group-item']); ?> 
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> PROCEDURE-REFER <span class="label label-danger pull-right"> 48 </span>', ['procedurerefer/index'], ['class' => 'list-group-item']); ?> 
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> REFER-HISTORY <span class="label label-danger pull-right"> 49 </span>', ['referhistory/index'], ['class' => 'list-group-item']); ?>
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> REFER-RESULT <span class="label label-danger pull-right"> 50 </span>', ['referredult/index'], ['class' => 'list-group-item']); ?> 
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> STUDENT <span class="label label-success pull-right"> 51 </span>', ['student/index'], ['class' => 'list-group-item']); ?> 
                        <?php echo Html::a('<i class="glyphicon glyphicon-check"></i> CANCER <span class="label label-danger pull-right"> 52 </span>', ['cancer/index'], ['class' => 'list-group-item']); ?>
                    </ul>
                </div>
            </div>
        </div>

    </div><!-- /.row -->
</section>
    </div>
</div>









