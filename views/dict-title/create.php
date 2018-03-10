<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DictTitle */

$this->title = Yii::t('app', 'Create Dict Title');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dict Titles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dict-title-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
