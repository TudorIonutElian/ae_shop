<?php

namespace backend\controllers;

use backend\models\Email;
use backend\models\EmailSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * EmailController implements the CRUD actions for Email model.
 */
class EmailController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Email models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmailSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Email model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Email model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Email();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                // send the email
                $model->attachment = UploadedFile::getInstance($model, 'attachment');
                if($model->attachment){

                    $time = time();

                    $model->attachment->saveAs('attachments/'.$time.'.'.$model->attachment->getExtension());
                    $model->attachment = 'attachments/'.$time.'.'.$model->attachment->getExtension();

                    if($model->attachment){
                        $value = Yii::$app->mailer->compose()
                            ->setFrom(['admin@aeshop.test' =>'Admin'])
                            ->setTo($model->receiver_email)
                            ->setSubject($model->subject)
                            ->setHtmlBody($model->content)
                            ->attach($model->attachment)
                            ->send();
                    }else{
                        $value = Yii::$app->mailer->compose()
                            ->setFrom(['admin@test.test' =>'Admin'])
                            ->setTo($model->receiver_email)
                            ->setSubject($model->subject)
                            ->setHtmlBody($model->content)
                            ->send();
                    }

                }


                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Email model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Email model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Email model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Email the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Email::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
