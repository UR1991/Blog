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

//Controller for working with Articles
class ArticleController extends Controller
{
  //Action by default
  public function actionIndex($params = null)
  {
    //if have input data
    if($params !== null)
    {
      //Find model by data, we need it for searching articles by category
      $model = Article::find()->where(['category' =>$params])->all();
    }

    else
    {
      //else just find all articles
      $model = Article::find()->all();
    }

    //DataProvider
    $searchModel = new ArticleSearch();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    return $this->render('index', [
      'searchModel' => $searchModel,
      'dataProvider' => $dataProvider,
    ]);


  }

  //Action for creating articles
  public function actionCreate()
  {
    //Create new Article object
    $model = new Article();

    //If we get model by POST method, we load it to $model and save it to DB
    if ($model->load(Yii::$app->request->post()) && $model->save())
    {
      //The better way to organize mailer work would be use events and behaviours,
      //But I have no time for this(
      //Then we just call Send method in MailController
      MailController::send($model);


      return $this->redirect(['view', 'id' => $model->id]);
    }

    //If no data in POST
    else
    {
      //Send to create view Article, category and Tags objects
      return $this->render('create', ['model' => $model,
       'category' => Category::find()->all(),
       'tags' => Tags::find()->all(),]);
    }
  }

  //action for view selected Article
  public function actionView($id)
  {
    //find model by id
    $model = $this->findModel($id);

    //find comments by article_id
    $comments = new Comment();
    $comments->article_id = $id;

    //If we get Comment data by POST method, we load it to $comment and save it to DB
    if ($comments->load(Yii::$app->request->post()) && $comments->save())
    {
      return $this->redirect(Yii::$app->request->referrer);
    }

    else
    {
      //Render view and send model and comments data
      return $this->render('view', [
        'model' => $this->findModel($id),
        'comments' => $comments,
      ]);
    }
  }

  //action for Edit view
  public function actionEdit($id)
  {
    //Find model by id
    $model = $this->findModel($id);

    //Load and save model in db, of course if if exist
    if ($model->load(Yii::$app->request->post()) && $model->save())
    {

      return $this->redirect(['index']);
    }

    else
    {
      //If not, render edit page with needed data
      return $this->render('edit', [
      'model' => $model,
      'category' => Category::find()->all(),
      'tags' => Tags::find()->all(),]);
    }
  }

  //Action for deleting articles
  public function actionDelete($id)
  {
    $this->findModel($id)->delete();
    return $this->redirect(['index']);
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

  //Action for find desired category
  public function actionCategory($category)
  {
    $model = Article::find()->where(['category' => $category])->all();
    //Sent category to index action which render Articlse with this category
    return $this->redirect(['index', 'data' => $model,]);

  }
}

 ?>
