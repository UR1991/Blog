<?php
//Controller for working with articles

namespace app\controllers;

use app\models\Article;
use app\models\ArticleSearch;
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

  public function actionRead($value='')
  {
    # code...
  }

  public function actionUpdate($value='')
  {
    # code...
  }

  public function actionDelete($value='')
  {
    # code...
  }

  public function actionSubscribe($value='')
  {
    # code...
  }
}

 ?>
