<?php
//Controller for working with comments
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Comment;

class CommentController extends Controller
{

  //action for deleting commentaries
  public function actionDelete($id)
  {
    $this->findModel($id)->delete();
    return $this->redirect(['article/index']);
  }

  //Method wich help us find needed model
  public function findModel ($id)
  { //If data not null then return it to action
    if(($model = Comment::findOne($id)) !== null)
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
