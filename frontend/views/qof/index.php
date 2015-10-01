<?php
$this->title = Yii::t('app', 'ตรวจสอบ qof สปสช');
$this->params['breadcrumbs'][] = 'ตรวจสอบ QOF สปสช.';

use yii\helpers\Html;
?>
<div class="alert alert-primary">
    <h4>ตัวชี้วัดเกณฑ์คุณภาพและผลงานบริการปฐมภูมิ QOF</h4>
    <h6><p>อ้างอิง แนวทางและตัวชี้วัดเกณฑ์คุณภาพและผลงานบริการปฐมภูมิ (Quality and Outcome Framework: QOF) ปีงบประมาณ 2558 สำนักงานหลักประกันสุขภาพแห่งชาติ เขต 11 สุราษฏร์ธานี</p></h6>
</div>

<div class="panel panel-warning">
    <div class="panel-heading"><h3 class="panel-title">รายงานตัวชี้วัดกลาง</h3></div>
    <div class="panel-body">
        <!-- box-1 -->
        <div class="box-header with-border">
            <h3 class="box-title">ตัวชี้วัดด้านที่ 1 : คุณภาพและผลงานการจัด บริการสร้างเสิมสุขภาพและป้องกันโรค PP</h3>
        </div>
        <div class="jumbotron">
            <?php echo Html::a('1.1 ร้อยละของหญิงตั้งครรภ์ได้รับการฝากครรภ์ครั้งแรกก่อน 12 สัปดาห์', ['qof/rep1_1']); ?> <br>
            <?php echo Html::a('1.2 ร้อยละของหญิงตั้งครรภ์ได้รับการฝากครรภ์ครบ 5 ครั้งตามเกณฑ์', ['qof/rep1_2']); ?>  <br>
            <?php echo Html::a('1.3 ร้อยละสะสมความครอบคลุมการตรวจคัดกรองมะเร็งปากมดลูกในสตรีอายุ 30-60 ปี ภายใน 5 ปี ', ['qof/rep1_3']); ?>  <br>        
        </div>
        <!-- box-2 -->
        <div class="box-header with-border">
            <h3 class="box-title">ตัวชี้วัดด้านที่ 2 : คุณภาพและผลงานการจัดบริการปฐมภูมิ</h3>
        </div>
        <div class="jumbotron">
            <?php echo Html::a('2.1 สัดส่วนการใช้บริการที่หน่วยบริการปฐมภูมิต่อการใช้บริการที่โรงพยาบาล <font color="red">ไม่สามารถเก็บข้อมูลได้</font>', ['qof/rep2_1']); ?> <br>
            <?php echo Html::a('2.2 อัตราการรับไว้รักษาในโรงพยาบาล (Admission rate) ด้วยโรคหืด สิทธิ UC ', ['qof/rep2_2']); ?>  <br>
            <?php echo Html::a('2.3 อัตราการรับไว้รักษาในโรงพยาบาล (Admission rate) ด้วยโรคเบาหวานที่มีภาวะแทรกซ้อนระยะสั้นสิทธิ UC', ['qof/rep2_3']); ?>  <br>
            <?php echo Html::a('2.4 อัตราการรับไว้รักษาในโรงพยาบาล (Admission rate) ด้วยโรคความดันโลหิตสูงหรือภาวะแทรกซ้อนของความดันโลหิตสูง สิทธิ UC', ['qof/rep2_4']); ?>  <br>
        </div>
        <!-- box-3 -->
        <div class="box-header with-border">
            <h3 class="box-title">ตัวชี้วัดด้านที่ 3 : คุณภาพและผลงานด้านการพัฒนาองค์กร การเชื่อมโยงบริการ ระบบส่งต่อ และการบริหารระบบ</h3>
        </div>
        <div class="jumbotron">
            <?php echo Html::a('3.1 ร้อยละประชาชนมีหมอใกล้บ้านใกล้ใจดูแล <font color="red">ไม่สามารถเก็บข้อมูลได้</font>', ['qof/rep3_1']); ?> <br>
            <?php echo Html::a('3.2 ร้อยละหน่วยบริการปฐมภูมิผ่านเกณฑ์ขึ้นทะเบียน ด้วยโรคหืด สิทธิ UC <font color="red">ไม่สามารถเก็บข้อมูลได้</font>', ['qof/rep3_2']); ?>  <br>
        </div>

    </div>
</div>


<div class="panel panel-warning">
    <div class="panel-heading"><h3 class="panel-title">รายงานตัวชี้วัดของเขตพื้นที่ (คณะทำงาน ฯ ระดับเขตเลือก)</h3></div>
    <div class="panel-body">
        <!-- box-1 -->
        <div class="box-header with-border">
            <h3 class="box-title">ตัวชี้วัดด้านที่ 1 : คุณภาพและผลงานการจัด บริการสร้างเสิมสุขภาพและป้องกันโรค PP</h3>
        </div>
        <div class="jumbotron">
            <?php echo Html::a('4.1 ร้อยละของเด็กอายุ 1 ปี ที่ได้รับวัคซีนโรคหัด ', ['qof/rep4_1']); ?> <br>
            <?php echo Html::a('4.2 ร้อยละของเด็กนักเรียน ป. 1 ได้รับการตรวจช่องปาก ', ['qof/rep4_2']); ?>  <br>
            <?php echo Html::a('4.3 ร้อยละของเด็กนักเรียน ป. 1 ได้รับบริการเคลือบหลุมร่องฟันในฟันกรามแท้ซี่ที่หนึ่ง ', ['qof/rep4_3']); ?>  <br>        
        </div>
        <!-- box-2 -->
        <div class="box-header with-border">
            <h3 class="box-title">ตัวชี้วัดด้านที่ 2 : คุณภาพและผลงานการจัดบริการปฐมภูมิ</h3>
        </div>
        <div class="jumbotron">
            <?php echo Html::a('5.1 ร้อยละหน่วยบริการปฐมภูมิ(รพ.สต.)ที่มีแพทย์แผนไทยปฏิบัติงานประจำและมีการสั่งใช้ยาสมุนไพรพื้นฐานมากกว่า 5 รายการ', ['qof/rep5_1']); ?> <br>

        </div>
    </div>
</div>


