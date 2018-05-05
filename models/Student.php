<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%student}}".
 *
 * @property int $id
 * @property string $name 姓名
 * @property int $code 学号
 * @property int $major_id 专业id
 * @property int $grade 年级
 * @property int $year 毕业年份
 * @property int $teacher_id 指导老师id
 * @property int $college_level 学院优秀毕业论文，0=否，1=是
 * @property int $school_level 校优秀论文，0=否，1=是
 * @property string $document 文件夹名
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 * @property string $deleted_at 删除时间
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%student}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'major_id', 'year', 'teacher_id'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['name', 'document'], 'string', 'max' => 255],
            [['grade', 'college_level', 'school_level'], 'string', 'max' => 3],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'PName'),
            'code' => Yii::t('app', 'Code'),
            'major_id' => Yii::t('app', 'Major'),
            'grade' => Yii::t('app', 'Grade'),
            'year' => Yii::t('app', 'Year'),
            'teacher_id' => Yii::t('app', 'Teacher'),
            'college_level' => Yii::t('app', 'College Level'),
            'school_level' => Yii::t('app', 'School Level'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'deleted_at' => Yii::t('app', 'Deleted At'),
        ];
    }

    /**
     * 获取文件夹下所有文件
     *
     * @return array
     */
    public function getFileList()
    {
        $root = $this->document;
        $dir = self::formatDir($root);
        $fileList = [];
        if(is_dir($dir)) {
            $files = scandir($dir);
            unset($files[0]);
            unset($files[1]);

//            foreach($files as $file) {
//                $fileList[$file] = Yii::$app->params['uploadRoot'].$root."/".$file;
//            }
        }

        return $files;
    }

    /**
     * 根据文件夹名字生成文件路径
     *
     * @param $root
     * @return string
     */
    public static function formatDir($root)
    {
        $dir = Yii::getAlias('@webroot').Yii::$app->params['uploadRoot'].$root."/";
        return $dir;
    }
}
