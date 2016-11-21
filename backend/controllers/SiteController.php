<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use common\services\MenuService;
use crazyfd\qiniu\Qiniu;
/**
 * Site controller
 */
class SiteController extends Controller
{
    public $layout = 'site';
    public $enableCsrfValidation = false;

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup','login'],
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index' , 'upload'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post', 'get'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],

            'captcha' =>  [
                'class' => 'yii\captcha\CaptchaAction',
                'height' => 70,
                'width' => 100,
                'minLength' => 4,
                'maxLength' => 4
            ],
        ];
    }

    public function actionIndex()
    {
        $this->layout = 'bui';
        $menu = MenuService::getMenu();
        return $this->render('index', ['menu' => $menu]);
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    //测试图片上传
    public function actionUpload()
    {
        /*$accessKey = 'd27qzK2267kyE03rqtz4I0nRMDxkRGtgzg2B6y3P';
        $secretKey = '-m13gFc9rLIqwNGjpZhhwz05bXLgAmUE0SpjvimQ';
        $bucket    = 'ancda';
        $domain = '';
        $qiniu = new Qiniu($accessKey, $secretKey,$domain, $bucket);
        $key = time();
        $qiniu->uploadFile('../storage/uploads/1/-8YXGfzF2U4nUuc-Nj8NEQDR3m0MphZi.png',$key);
        $url = $qiniu->getLink($key);*/
        //$path = '../storage/uploads'
        $result = Yii::$app->qiniu->putFile('1/0n9UG6wkzijgft0Q5pSql1aFYguA_5b4.jpg', '/sellcms/storage/uploads/1/0n9UG6wkzijgft0Q5pSql1aFYguA_5b4.jpg');
        print_r($result);exit;
    }
}
