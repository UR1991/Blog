<!--Subview for create/edit article-->
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Category;
use app\models\Tags;
use yii\helpers\ArrayHelper;
?>

<div class="article-form">

  <p>
      <?= Html::a(Yii::t('app', 'Create Category'), ['create'], ['class' => 'btn btn-success']) ?>
  </p>



  <?php

    foreach ($dataProvider->models as $value) {
      //var_dump($dataProvider->models);
      //die();
      ?><?= Html::a(Yii::t('app', $value->category_name), ['view', 'id'=>$value['id']]) ?><?php
      ?><?= Html::a(Yii::t('app', 'Edit'), ['edit', 'id'=>$value['id']], ['class' => 'btn btn-success']) ?><?php
      ?><?= Html::a(Yii::t('app', "Delete"), ['delete', 'id'=>$value['id']], ['class' => 'btn btn-success']) ?></br><?php
    }

   ?>



</div>
