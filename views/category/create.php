<?php
use yii\helpers\Html;

$this->title = Yii::t('app', 'Create Category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Category'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
 ?>
<div class="category-create">
  <h1><?= Html::encode($this->title) ?></h1>
  <!--render Create/Edit form-->
  <?= $this->render('_form', ['model' => $model,]) ?>
</div>
