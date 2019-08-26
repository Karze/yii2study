<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\ArrayHelper;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::t('app', Yii::$app->name),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    if(! Yii::$app->user->isGuest && Yii::$app->user->identity->isAdmin()) {
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                [
                    'label' => '内容管理',
                    //'url' => ['/site/index'],
                    'items' => [
                        ['label' => '学生管理', 'url' => ['/student/index']],
                        ['label' => '教师管理', 'url' => ['/teacher/index']],
                        ['label' => '专业管理', 'url' => ['/dict-major/index']],
                        ['label' => '职称管理', 'url' => ['/dict-title/index']],
                        ['label' => '院系管理', 'url' => ['/dict-department/index']],
                    ],
                ],
//                ['label' => '用户管理', 'url' => ['/user/index']],
//                ['label' => '教师管理', 'url' => ['/teacher/index']],
//                ['label' => '专业管理', 'url' => ['/dict-major/index']],
//                ['label' => '职称管理', 'url' => ['/dict-title/index']],
//                ['label' => '院系管理', 'url' => ['/dict-department/index']],
                [
                    'label' => '系统管理',
                    'items' => [
                        ['label' => '用户管理', 'url' => ['/user/index']],
                    ],
                ],
                //['label' => '关于', 'url' => ['/site/about']],
                //['label' => '联系方式', 'url' => ['/site/contact']],
                Yii::$app->user->isGuest ? (
                ['label' => '登录', 'url' => ['/site/login']]
                ) : (
                    '<li>'
                    . Html::beginForm(['/site/logout'], 'post')
                    . Html::submitButton(
                        '登出 (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
                )
            ],
        ]);
    } else {
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                ['label' => '首页', 'url' => ['/site/index']],
                ['label' => '关于', 'url' => ['/site/about']],
                ['label' => '联系方式', 'url' => ['/site/contact']],
                Yii::$app->user->isGuest ? (
                ['label' => '登录', 'url' => ['/site/login']]
                ) : (
                    '<li>'
                    . Html::beginForm(['/site/logout'], 'post')
                    . Html::submitButton(
                        '登出 (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
                )
            ],
        ]);
    }

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
<!--        <p class="pull-left">&copy; My Company --><?//= date('Y') ?><!--</p>-->
        <p class="pull-left">Developed by ChenRongrong(E-Mail: crrkiller@163.com) in <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
