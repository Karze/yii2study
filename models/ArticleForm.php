<?php
/**
 * Created by PhpStorm.
 * User: crrki
 * Date: 2018/3/11
 * Time: 16:02
 */

namespace app\models;

use yii\base\Model;

class ArticleForm extends Model
{
    public $name;
    public $s_name;
    public $teacher_id;
    public $major_id;
    public $title_id;
    public $department_id;
}