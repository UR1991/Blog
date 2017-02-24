<!--Main view for Application -->
<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Button;
use yii\helpers\ArrayHelper;

$this->title = Yii::t('app', 'Articles list');
//Use breadcrumbs to set title
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

  <h1><?= Html::encode($this->title) ?></h1>
  <?php //echo $this->render('_search', ['model' => $searchModel]);

  foreach ($dataProvider->models as $model)
  {
      ?><?= Html::a($model->name) ?><?php
  }



  ?>

<p>
  <?= Html::a(Yii::t('app', 'Create Task'), ['create'], ['class' => 'btn btn-success']) ?>
</p>








</div>
