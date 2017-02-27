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
    echo "render category editor";
  }
}

 ?>
