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
    if($params !== null)
    {
      $model = Article::find()->where(['category' =>$params])->all();
    }
    else {
      $model = Article::find()->all();
    }







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

    if ($model->load(Yii::$app->request->post()) && $model->save())
    {
      //$saveTag = TagArticles::save($tags);


      return $this->redirect(['view', 'id' => $model->id]);
    }

    else
    {
      return $this->render('create', ['model' => $model, 'category' => Category::find()->all(), 'tags' => Tags::find()->all(),]);
    }
  }

  public function actionView($id)
  {
    //find model by id
    $model = $this->findModel($id);

    //find comments by article_id
    $comments = new Comment();
    $comments->article_id = $id;

    if ($comments->load(Yii::$app->request->post()) && $comments->save())
    {
      return $this->redirect(Yii::$app->request->referrer);
    }
    else {
      return $this->render('view', [
    'model' => $this->findModel($id),
    'comments' => $comments,
]);
    }


    //Render view with model and comments
    return $this->render('view', ['model' => $model, 'comments' => $comments,]);
  }





  public function actionTest($id = 1)
  {
    $model = $this->findModel($id);

    $tags = Tags::findOne($id);
    //$tags->id = $id;
    $model->link('tags', $tags);
    //var_dump($tags);
    //die();
  }









  public function actionEdit($id)
  {
    $model = $this->findModel($id);

    if ($model->load(Yii::$app->request->post()) && $model->save())
    {
      //var_dump($model);
      //  die();
      return $this->redirect(['index']);
    }
    else
    {
      return $this->render('edit', [
      'model' => $model,
      'category' => Category::find()->all(),
      'tags' => Tags::find()->all(),]);
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
