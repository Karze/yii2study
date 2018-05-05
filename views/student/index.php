<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\StudentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Students');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Student'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'code',
            [
                'attribute' => 'major_id',
                'label' => Yii::t('app', 'Major'),
                'value' => function($model) use ($majorMap) {

                    return $majorMap[$model->major_id];
                },
                'headerOptions' => ['width' => '100']
            ],
            'grade',
            'year',
            [
                'attribute' => 'teacher_id',
                'label' => Yii::t('app', 'Teacher'),
                'value' => function($model) use ($teacherMap) {

                    return $teacherMap[$model->teacher_id];
                },
                'headerOptions' => ['width' => '100']
            ],
            [
                'attribute' => 'college_level',
                'label' => Yii::t('app', 'College Level'),
                'value' => function($model) {
                    return $model->college_level == 0 ? '否' : '是';
                },
                'headerOptions' => ['width' => '100']
            ],
            [
                'attribute' => 'school_level',
                'label' => Yii::t('app', 'School Level'),
                'value' => function($model) {
                    return $model->school_level == 0 ? '否' : '是';
                },
                'headerOptions' => ['width' => '100']
            ],
            [
                'format'=>'raw',
                'attribute' => 'document',
                'label' => Yii::t('app', 'File List'),
                'value' => function($model) {
                    $fileList = $model->getFileList();
                    $root = $model->document;
                    $out = "";
                    foreach ($fileList as $file) {
                            $out .= Html::a($file, "/site/download?root=$root&file=$file", ['title' => $file, 'target' => '_blank','data-pjax'=>0]);
                            $out .= "<br>";

                    }
                    return $out;
                },
                'headerOptions' => ['width' => '300']
            ],
            //'created_at',
            //'updated_at',
            //'deleted_at',

            ['class' => 'yii\grid\ActionColumn', 'headerOptions' => ['width' => '60']],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
