<?php

namespace backend\controllers;

use Yii;
use backend\models\Teacherclass;
use backend\models\search\TeacherclassSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * TeacherclassController implements the CRUD actions for Teacherclass model.
 */
class TeacherclassController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
       return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        // 'actions' => ['logout', 'index','trinhdo'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
    /**
     * Lists all Teacherclass models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TeacherclassSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Teacherclass model.
     * @param string $id_classroom
     * @param string $id_teacher
     * @return mixed
     */
    public function actionView($id_classroom, $id_teacher)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_classroom, $id_teacher),
        ]);
    }

    /**
     * Creates a new Teacherclass model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Teacherclass();
        $time = time();
        $model->created_at = $time;
        $model->updated_at = $time;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->addFlash('success','Thêm mới thành công   !');
            return $this->redirect(['view', 'id_classroom' => $model->id_classroom, 'id_teacher' => $model->id_teacher]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Teacherclass model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id_classroom
     * @param string $id_teacher
     * @return mixed
     */
    public function actionUpdate($id_classroom, $id_teacher)
    {
        $model = $this->findModel($id_classroom, $id_teacher);

        $time = time();
        $model->updated_at = $time;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->addFlash('success','Cập nhật thành công   !');
            return $this->redirect(['view', 'id_classroom' => $model->id_classroom, 'id_teacher' => $model->id_teacher]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Teacherclass model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id_classroom
     * @param string $id_teacher
     * @return mixed
     */
    public function actionDelete($id_classroom, $id_teacher)
    {
        $this->findModel($id_classroom, $id_teacher)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Teacherclass model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id_classroom
     * @param string $id_teacher
     * @return Teacherclass the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_classroom, $id_teacher)
    {
        if (($model = Teacherclass::findOne(['id_classroom' => $id_classroom, 'id_teacher' => $id_teacher])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
