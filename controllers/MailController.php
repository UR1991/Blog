<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Mail;

use app\models\Article;
use app\models\ArticleSearch;
use app\models\Comment;
use app\models\Category;
use app\models\Tags;
use app\models\TagArticles;
//use Yii;
//use yii\web\Controller;

class MailController extends Controller
{
  public function actionCreate()
  {
    //$this->enableCsrfValidation = false;

    $model = new Mail();

    if ($model->load(Yii::$app->request->post()) && $model->save())
    {
      return $this->redirect(['/article/index']);
    }

    else
    {
      return $this->redirect(['/article/index']);
    }


  }

  public function actionDelete()
  {

    $model = new Mail();

    if ($model->load(Yii::$app->request->post()))
    {
      $this->findModel($model)->delete();

      return $this->redirect(['/article/index']);
    }
    return $this->redirect(['index']);
  }


  public function findModel ($model)
  { //If data not null then return it to action
    if(($model = Mail::find()->where("email = '$model->email'")->one()) !== null)
    {

      return $model;
    }
    //Else throw new exception
    else
    {
      throw new NotFoundHttpException("Error Processing Request", 1);
    }
  }

  public function Send($data)
  {
    $email = new Mail();

    $email->find()->all();

    foreach ($email as $value)
    {
      $message = Yii::$app->mailer->compose()
      ->setFrom('Admin@blog.com')
      ->setTo($value['email'])
      ->setSubject('New Artile published!')
      ->setHtmlBody($data->name)
      ->send();
    }
  }
}
