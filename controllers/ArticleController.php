<?php
//Controller for working with articles

namespace app\controllers;

use app\models\Article;
use app\models\ArticleSearch;
use app\models\Comment;
use Yii;
use yii\web\Controller;


class ArticleController extends Controller
{
  public function actionIndex()
  {
    $searchModel = new ArticleSearch();

    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    return $this->render('index', [
      'searchModel' => $searchModel,
      'dataProvider' => $dataProvider,
    ]);
  }

  public function actionCreate()
  {
    $model = new Article();

    if ($model->load(Yii::$app->request->post()) && $model->save())    {
      return $this->redirect(['view', 'id' => $model->id]);
    } else {
      return $this->render('create', ['model' => $model,]);
    }
  }

  public function actionView($id)
  {
    $model = $this->findModel($id);
    $comment = new Comment();

    if ($comment->load(Yii::$app->request->post())){
      $comment->task_id = $model->id;
      if ($comment->save()){
        return $this->refresh();
      }
    }
    return $this->render('view', ['model' => $model,]);
  }

  public function actionUpdate($value='')
  {
    # code...
  }

  public function actionDelete($id)
  {
    $this->findModel($id)->delete();
    return $this->redirect(['index']);
  }

  public function actionSubscribe($value='')
  {
    # code...
  }

  //Search in BD
  public function findModel ($id)
  { //If data not null then return it to action
    if(($model = Article::findOne($id)) !== null)
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
