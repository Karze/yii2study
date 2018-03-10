<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DictDepartment */

$this->title = Yii::t('app', 'Create Dict Department');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dict Departments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dict-department-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
