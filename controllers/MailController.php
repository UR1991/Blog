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

class MailController extends Controller
{
  //Action for creating new record with email
  public function actionCreate()
  {

    //Create new Mail object
    $model = new Mail();

    //If we get model by POST method, we load it to $model and save it to DB
    if ($model->load(Yii::$app->request->post()) && $model->save())
    {
      return $this->redirect(['/article/index']);
    }

    //Else throw new Exception or error message
    else
    {
      //I forgot to complete this part.
      return $this->redirect(['/article/index']);
    }
  }

  //action for deleting record from DB
  public function actionDelete()
  {
    //Create new Mail object
    $model = new Mail();

    //If we get model by POST method, we load it to $model
    if ($model->load(Yii::$app->request->post()))
    {
      //and delete it from DB
      $this->findModel($model)->delete();

      return $this->redirect(['/article/index']);
    }

    //else we should show message with error
    return $this->redirect(['index']);
  }

  //Method wich help us find needed model
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

  //Method which prepare and send emails to subscribers in foreach
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
