<?php
use yii\helpers\Html;

$this->title = Yii::t('app', 'Edit Article');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Article'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
 ?>
<div class="task-edit">
  <h1><?= Html::encode($this->title) ?></h1>

  <?= $this->render('_form', ['model' => $model,]) ?>
</div>
