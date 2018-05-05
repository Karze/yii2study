<?php

namespace app\controllers;

use app\models\Student;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'download'],
                'rules' => [
                    [
                        'actions' => ['logout', 'download'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if(!Yii::$app->user->isGuest) {
            //return $this->render('index');
            return $this->redirect('student/index');
        }
        return $this->redirect('site/login');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect('student/index');
            //return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * 下载文件，可以下载中文名文件
     */
    public function actionDownload()
    {
        $root = Yii::$app->request->get('root');

        if(!isset($_GET['file'])) exit('Filename is empty');
        if(empty($_GET['file'])) exit('Filename not valid');
        ob_clean();//清除一下缓冲区
        //获得文件名称
        $filename = basename(urldecode($_GET['file']));
        //文件完整路径
        $filePath = Student::formatDir($root).$filename;
        //将utf8编码转换成gbk编码，否则，文件中文名称的文件无法打开
        $filePath = iconv('UTF-8','gbk',$filePath);
        //检查文件是否可读
        if(!is_file($filePath) || !is_readable($filePath)) exit('Can not access file '.$filename);
        /**
         * 这里应该加上安全验证之类的代码，例如：检测请求来源、验证UA标识等等
         */
        //以只读方式打开文件，并强制使用二进制模式
        $fileHandle=fopen($filePath,"rb");
        if($fileHandle===false){
            exit("Can not open file: $filename");
        }
        //文件类型是二进制流。设置为utf8编码（支持中文文件名称）
        header('Content-type:application/octet-stream; charset=utf-8');
        header("Content-Transfer-Encoding: binary");
        header("Accept-Ranges: bytes");
        //文件大小
        header("Content-Length: ".filesize($filePath));
        //触发浏览器文件下载功能
        header('Content-Disposition:attachment;filename="'.($filename).'"');
        //循环读取文件内容，并输出
        while(!feof($fileHandle)) {
            //从文件指针 handle 读取最多 length 个字节（每次输出10k）
            echo fread($fileHandle, 10240);
        }
        //关闭文件流
        fclose($fileHandle);
    }
}
