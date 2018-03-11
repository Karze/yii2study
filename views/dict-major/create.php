<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DictMajor */

$this->title = Yii::t('app', 'Create Dict Major');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dict Majors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dict-major-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
