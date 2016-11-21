<?php

namespace backend\modules\coach\controllers;

use Yii;
use common\models\Coach;
use backend\modules\coach\models\CoachSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use crazyfd\qiniu\Qiniu;
/**
 * CoachController implements the CRUD actions for Coach model.
 */
class CoachController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                    'class' => AccessControl::className(),
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['@']
                        ]
                    ]
                ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'upload' => [
                'class' => 'trntv\filekit\actions\UploadAction',
                'deleteRoute' => 'upload-delete'
            ],
            'upload-delete' => [
                'class' => 'trntv\filekit\actions\DeleteAction'
            ],
            'upload-imperavi' => [
                'class' => 'trntv\filekit\actions\UploadAction',
                'fileparam' => 'file',
                'responseUrlParam'=> 'filelink',
                'multiple' => false,
                'disableCsrf' => true
            ],
            /*'upload' => [
                'class' => 'kucha\ueditor\UEditorAction',
                'config' => [
                    "imageUrlPrefix"  => "http://www.baidu.com",//图片访问路径前缀
                    "imagePathFormat" => "/upload/image/{yyyy}{mm}{dd}/{time}{rand:6}" //上传保存路径
                ],
            ],*/

        ];
    }


    /**
     * Lists all Coach models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CoachSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Coach model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Coach model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Coach();
        $params = Yii::$app->request->post();
        if (!empty($params)) {
            $model->load($params);
            //上传图片到七牛
            $result = Yii::$app->qiniu->putFile($params['Coach']['img_file']['path'], '/sellcms/storage/uploads/'.$params['Coach']['img_file']['path']);
            if ($result['code'] === 0) {
                //上传成功
                $model->create_time = time();
                $model->start_time = strtotime($params['Coach']['start_time']);
                $model->end_time = strtotime($params['Coach']['end_time']);
                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                } else {
                    return $this->render('create', [
                        'model' => $model,
                    ]);
                }
            } else {
                //上传失败
                echo '<script>alert("请重新上传图片！")</script>';
                return $this->render('create', [
                        'model' => $model,
                    ]);

            }

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Coach model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $params = Yii::$app->request->post();
        if (!empty($params)) {
            $model->load($params);
            //上传图片到七牛
            $result = Yii::$app->qiniu->putFile($params['Coach']['img_file']['path'], '/sellcms/storage/uploads/'.$params['Coach']['img_file']['path']);
            if ($result['code'] === 0) {
                //上传成功
                $model->start_time = strtotime($params['Coach']['start_time']);
                $model->end_time = strtotime($params['Coach']['end_time']);
                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                } else {
                    return $this->render('update', [
                        'model' => $model,
                    ]);
                }

            } else {
                //上传失败
                echo '<script>alert("请重新上传图片！")</script>';
                return $this->render('create', [
                        'model' => $model,
                    ]);
            }

        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Coach model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

     /**
     * Groom（推荐） an existing Coach model.
     * If Groom is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionGroom($id)
    {
        $res = $this->findModel($id);
        $res->recommend = 1;
        $res->save();

        return $this->redirect(['index']);
    }

     /**
     * Bgroom（最优推荐） an existing Coach model.
     * If Bgroom is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionBgroom($id)
    {
        $res = $this->findModel($id);
        $res->recommend = 2;
        $res->save();

        return $this->redirect(['index']);
    }

     /**
     * Ngroom（最优推荐） an existing Coach model.
     * If Ngroom is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionNgroom($id)
    {
        $res = $this->findModel($id);
        $res->recommend = 0;
        $res->save();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Coach model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Coach the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Coach::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
