<!--Subview for create/edit article-->
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Category;
use app\models\Tags;
use yii\helpers\ArrayHelper;
?>

<div class="category-form">

  <p>
      <?= Html::a(Yii::t('app', 'Create Category'), ['create'], ['class' => 'btn btn-success']) ?>
  </p>



  <?php
    //Show all avaliable categories
    foreach ($dataProvider->models as $value) {
      //view category
      ?><?= Html::a(Yii::t('app', $value->category_name), ['view', 'id'=>$value['id']]) ?></br><?php
      //edit catedory
      ?><?= Html::a(Yii::t('app', 'Edit'), ['edit', 'id'=>$value['id']], ['class' => 'glyphicon glyphicon-pencil']) ?>  <?php
      //delete category
      ?><?= Html::a(Yii::t('app', "Delete"), ['delete', 'id'=>$value['id']], ['class' => 'glyphicon glyphicon-trash']) ?></br></br><?php
    }

   ?>



</div>
