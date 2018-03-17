<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Teacher */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teacher-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'style' => 'width:200px']) ?>

    <?= $form->field($model, 'title_id')->dropDownList($titleMap, ['prompt'=>'请选择','style'=>'width:200px']) ?>

    <?= $form->field($model, 'department_id')->dropDownList($departmentMap, ['prompt'=>'请选择','style'=>'width:200px']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
