<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Article;
use app\models\Tags;
use app\models\TagArticles;

/**
 *
 */
class TagController extends Controller
{

  public function behaviors()
  {
    return ['verbs' => ['class' => VerbFilter::className(), 'actions' => ['delete' => ['POST'],],],];
  }

  public function actionIndex()
  {
    $dataProvider = new ActiveDataProvider(['query' =>Tags::find(),]);

    return $this->render('index', ['dataProvider' => $dataProvider]);
  }

  public function actionNewTag()
  {
    # code...
  }
  public function actionDelTag($tag_id)
  {
    $tag = Tags::findOne($tag_id)->delete();
  }
  public function actionAdd()
  {
    $tag = new TagArticles;

    $tag->tag_id = $tag_id;
    $tag->article_id = $article_id;
    var_dump($tag);
    die();
  }
}

 ?>
