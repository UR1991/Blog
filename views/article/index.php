<!--Main view for Application -->
<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Button;
use yii\bootstrap\Collapse;
use yii\helpers\ArrayHelper;


$this->title = Yii::t('app', 'Articles list');
//Use breadcrumbs to set title
$this->params['breadcrumbs'][] = $this->title;
?>
<p><!--Button for creating new articles-->
  <?= Html::a(Yii::t('app', 'Create Task'), ['create'], ['class' => 'btn btn-success']) ?>
</p>
<div class="article-index">

  <h1><?= Html::encode($this->title) ?></h1>
  <?php //echo $this->render('_search', ['model' => $searchModel]);

  //Show all articles
  foreach ($dataProvider->models as $value)
  {
       ?><div>
         <!--If click on article name, then view all Article-->
       <?= Html::a(Yii::t('app', $value->name), ['view', 'id'=>$value['id']]) ?></div><?php
  }?>
</div>
