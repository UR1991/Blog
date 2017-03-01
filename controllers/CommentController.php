<?php
//Controller for working with comments
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Comment;

class CommentController extends Controller
{
  public function actionIndex($value='')
  {
    # code...
  }

  public function actionCreate($value='')
  {
    # code...
  }

  public function actionDelete($comment_id)
  {
    $this->findModel($comment_id)->delete();
    return $this->redirect(['article/index']);
  }

  public function findModel ($comment_id)
  { //If data not null then return it to action
    if(($model = Comment::findOne($comment_id)) !== null)
    {

      return $model;
    }
    //Else throw new exception
    else
    {
      throw new NotFoundHttpException("Error Processing Request", 1);
    }
  }
}
 ?>
