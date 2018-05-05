<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Student */
/* @var $form yii\widgets\ActiveForm */

$root = $model->document ?? md5(rand().time());//利用随机数和时间戳获取文件夹路径
?>

<div class="student-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true,'style'=>'width:200px']) ?>

    <?= $form->field($model, 'code')->textInput(['style'=>'width:200px']) ?>

    <?= $form->field($model, 'major_id')->dropDownList($majorMap, ['prompt'=>'请选择','style'=>'width:200px']) ?>

    <?= $form->field($model, 'grade')->dropDownList([1 => "大一", 2 => "大二", 3 => "大三", 4 => "大四", 5 => "研一", 6 => "研二", 7 => "研三"], ['prompt'=>'请选择','style'=>'width:200px']) ?>

    <?= $form->field($model, 'year')->textInput(['style'=>'width:200px']) ?>

    <?= $form->field($model, 'teacher_id')->dropDownList($teacherMap, ['prompt'=>'请选择','style'=>'width:200px']) ?>

    <?= $form->field($model, 'college_level')->dropDownList([0 => "否", 1 => "是"], ['prompt'=>'请选择','style'=>'width:200px']) ?>

    <?= $form->field($model, 'school_level')->dropDownList([0 => "否", 1 => "是"], ['prompt'=>'请选择','style'=>'width:200px']) ?>

    <?=$form->field($model,'document')->textInput()->hiddenInput(['value'=>$root])->label(false) ?>


    <table class="form-group" id="downlist">
        <tr><th class=""><?= Yii::t('app', 'File List')?></th></tr>
    <?php foreach ($fileList as $file) {?>
            <tr>
                <?php
                echo "<td>".$file."</td>";
                echo "<td><a href='/site/download?root=".$root."&file=".$file."'>"."下载"."</a></td>";
                ?>
            </tr>
    <?php } ?>
    </table>
    <?php
    // Usage without a model
    echo '<label class="input-folder">文件上传</label>';
    echo FileInput::widget([
        'name' => 'input-folder[]',
        'options' => [
            'multiple' => true,

        ],
        'pluginOptions' => [
            'uploadUrl' => Url::to(['/student/upload']),
            'showPreview' => false,
            'previewFileType' => 'any',
            'uploadExtraData' => [
                'root' => $root,
            ],
            'maxFileCount' => 20,
        ]
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
