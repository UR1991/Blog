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
  //Action by dafault
  public function actionIndex()
  {
    //DataProvider
    $dataProvider = new ActiveDataProvider([
      'query' => Category::find(),
    ]);

    return $this->render('index', [
      'dataProvider' => $dataProvider,
    ]);
  }

  //Action for deletind categories
  public function actionDelete($id)
  {
    $this->findModel($id)->delete();
    return $this->redirect(['index']);
  }

  //Action for view selected category
  public function actionView($id)
  {
    return $this->render('view', ['model' => $this->findModel($id)]);
  }

  //action for creating new category
  public function actionCreate()
  {
    //Creating new category object
    $model = new Category();

    //If we get model by POST method, we load it to $model and save it to DB
    if ($model->load(Yii::$app->request->post()) && $model->save())    {
      return $this->redirect(['index']);
    }

    //Else go to create new one.
    else
    {
      return $this->render('create', ['model' => $model,]);
    }
  }

  //action for Edit categories
  public function actionEdit($id)
  {
    //Find model by id
    $model = $this->findModel($id);

    //If we get model by POST method, we load it to $model and save it to DB
    if ($model->load(Yii::$app->request->post()) && $model->save())    {
      return $this->redirect(['view', 'id' => $model->id]);
    }

    //else render edit view with selected model
    else
    {
      return $this->render('edit', ['model' => $model,]);
    }
  }

  //Method wich help us find needed model
  public function findModel ($id)
  {
    //If data not null then return it to action
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
