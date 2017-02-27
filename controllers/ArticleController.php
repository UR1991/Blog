<?php
//Controller for working with articles

namespace app\controllers;

use app\models\Article;
use app\models\ArticleSearch;
use app\models\Comment;
use app\models\Category;
use app\models\Tags;
use app\models\TagArticles;
use Yii;
use yii\web\Controller;


class ArticleController extends Controller
{

  public function actionIndex($params = null)
  {

    $searchModel = new ArticleSearch();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    $tag = new Tags();

    //var_dump($tag->id);
    //die();
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

    $tags = new Tags();
    $tags->load(Yii::$app->request->post());
    $tags = $model->tags;

    if ( $comment->load( Yii::$app->request->post() ) )
    {
      $comment->article_id = $model->id;

      if ($comment->save())
      {
        return $this->refresh();
      }
    }
    return $this->render('view', ['model' => $model, 'tags' => $tags,]);
  }

  public function actionEdit($id)
  {
    $model = $this->findModel($id);

    if ($model->load(Yii::$app->request->post()) && $model->save())
    {
      return $this->redirect(['view', 'id' => $model->id]);
    }
    else
    {
      return $this->render('edit', ['model' => $model,]);
    }
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

  public function actionCategory($category)
  {
    $model = Article::find()->where(['category' => $category])->all();
    //$category = [];
    //foreach ($model as $key => $value) {
    //  $category[] = ['label'=> $value['category_name'], 'url' => $value['id']];
    //}
    //var_dump($model);
    //die();
    return $this->redirect(['index', 'data' => $model,]);

  }
}

 ?>
