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
      $model = Category::find()->all();
      //$category = [];
      //foreach ($model as $key => $value)
      //{
      //  $categories[] = ['label'=> $value['category_name'], 'url' => $value['id']];
      //}
      //$conter = ob_get_clean();
      return $this->render('category', ['model' => $model]);
    }
  }
 ?>
