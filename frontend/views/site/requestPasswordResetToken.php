<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'คำขอรีเซ็ตรหัสผ่าน';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-request-password-reset">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>กรุณากรอกอีเมลของคุณ ระบบจะทำการส่งรหัสผ่านใหม่ให้คุณ กรุณากรอกข้อมูลอีเมลที่มีอยู่จริง</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

                <?= $form->field($model, 'email') ?>

                <div class="form-group">
                    <?= Html::submitButton('ส่ง', ['class' => 'btn btn-primary']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
