<?php
use yii\helpers\Html;

$this->title = Yii::t('app', 'Edit Article');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Article'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
 ?>
<div class="article-edit">
  <h1><?= Html::encode($this->title) ?></h1>

  <?= $this->render('_form', ['model' => $model,
                              'category' => $category,
                              'tags' => $tags,]) ?>
</div>
