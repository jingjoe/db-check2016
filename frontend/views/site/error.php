<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="well-sm">
    <h1><?= Html::img('@web/images/Minion_icon.png') ?><?= Html::encode($this->title) ?></h1>
    <h1><?= nl2br(Html::encode($message)) ?></h1>
</div>
