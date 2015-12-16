<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
//use frontend\assets\AppAsset;
use common\widgets\Alert;
use kongoon\theme\material;

//AppAsset::register($this);
material\MaterialAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <?php $this->head() ?>
</head>
<body>
<!-- <div class="hosmis"></div>-->
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'DB-CHECK 2016',
        //'brandLabel' => Html::img('@web/images/logo.png', ['alt'=>Yii::$app->name]),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-fixed-top navbar-custom',
        ],
    ]);
    
          if (Yii::$app->user->isGuest) {
                $submenuItems[] = ['label' => 'สมัครผู้ใช้', 'url' => ['/site/signup']];
                $submenuItems[] = ['label' => 'เข้าสู่ระบบ', 'url' => ['/site/login']];
            } else {

                $submenuItems[] = [
                    'label' => 'ออกจากระบบ',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
            }
            
           $username = '';
            if (!Yii::$app->user->isGuest) {
                $username = '(' . Html::encode(Yii::$app->user->identity->username) . ')';
            }


            $menuItems = [
                ['label' => 
                    '<span class="glyphicon glyphicon-home"></span> หน้าหลัก',
                    'url' => ['/site/index']
                ],
                ['label' =>
                    '<span class="glyphicon glyphicon-check"></span> ตรวจสอบ 43 แฟ้ม',
                    'url' => ['oppp/index']
                ],
                ['label' =>
                    '<span class="glyphicon glyphicon-check"></span> ตรวจสอบ QOF',
                    'url' => ['qof/index']
                ],
                ['label' => '<span class="glyphicon glyphicon-user"></span> ผู้ใช้งาน ' . $username,
                    'items' => $submenuItems
                ],
            ];      
            
          echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'encodeLabels' => false,
                'items' => $menuItems,
            ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; DB-CHECK 2016 : 'งานสารสนเทศ โรงพยาบาลเกาะยาวชัยพัฒน์ จ.พังงา <?= date('Y') ?></p>
        <p class="pull-right">Powered by <?= Html::a('Wichian Nunsri', ['site/about']) ?></p>
    </div>
</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
