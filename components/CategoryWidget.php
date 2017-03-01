<?php
namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;
use app\models\Category;

  class CategoryWidget extends Widget
  {
    public $model;

    public function init()
    {
      parent::init();

    }

    public function run()
    {
      //Find all categories
      $model = Category::find()->all();
      //render widget and send him all categories which we find
      return $this->render('category', ['model' => $model]);
    }
  }
 ?>
