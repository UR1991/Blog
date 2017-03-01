<?php
//Controller for working with articles

namespace app\controllers;

use app\models\Article;
use app\models\ArticleSearch;
use app\models\Comment;
use app\models\Category;
use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;

class CategoryController extends Controller
{
  public function actionIndex()
  {

    $dataProvider = new ActiveDataProvider([
      'query' => Category::find(),
    ]);
    //$model = new Category();
    return $this->render('index', [
      'dataProvider' => $dataProvider,
    ]);
  }


  public function actionDelete($id)
  {
    $this->findModel($id)->delete();
    return $this->redirect(['index']);
  }


public function actionView($id)
{
  return $this->render('view', ['model' => $this->findModel($id)]);
}


  public function actionCreate()
  {
    $model = new Category();

    if ($model->load(Yii::$app->request->post()) && $model->save())    {
      return $this->redirect(['index']);
    } else {
      return $this->render('create', ['model' => $model,]);
    }
  }

  public function actionEdit($id)
  {
    $model = $this->findModel($id);

    if ($model->load(Yii::$app->request->post()) && $model->save())    {
      return $this->redirect(['view', 'id' => $model->id]);
    } else {
      return $this->render('edit', ['model' => $model,]);
    }
  }



  public function findModel ($id)
  { //If data not null then return it to action
    if(($model = Category::findOne($id)) !== null)
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
