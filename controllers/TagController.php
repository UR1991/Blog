<?php
namespace app\controllers;

use Yii;
use yii\app\Controller;
use app\models\Article;
use app\models\Tags;
use app\models\TagArticles;

/**
 *
 */
class TagController extends Controller
{

  public function actionNewTag()
  {
    # code...
  }
  public function actionDelTag($tag_id)
  {
    $tag = Tags::findOne($tag_id)->delete();
  }
  public function actionSetTag()
  {
    $tag = new Tags;

    $tag->load()->save();
  }
}

 ?>
