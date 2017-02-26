<?php
//Controller for working with articles

namespace app\controllers;

use app\models\Article;
use app\models\ArticleSearch;
use app\models\Comment;
use app\models\Category;
use Yii;
use yii\web\Controller;


class CategoryController extends Controller
{
  public function actionIndex()
  {
    $model = Category::find()->all();
    $category = [];
    foreach ($model as $key => $value) {
      $category[] = ['label'=> $value['category_name'], 'url' => $value['id']];
    }
    return $this->render('//site/index', [
      'category' => $category,
      //'dataProvider' => $dataProvider,
    ]);
  }
}

 ?>
