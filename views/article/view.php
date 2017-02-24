<?php
use yii\helpers\Html;
use app\models\Comments;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Articles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
 ?>
 <div class="article-view">
   <h1><?= Html::encode($this->title) ?></h1>

   <p>
     <?= Html::a(Yii::t('app', 'Edit'), ['edit', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
     <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
       'class' => 'btn btn-danger',
       'data' => [
           'confirm' => Yii::t('app', 'Are your sure?'),
           'method' => 'post',
       ],
       ]) ?>
   </p>

   <?= DetailView::widget([
     'model' => $model,
     'attributes' => [
       'id',
       'name',
       'body',
     ],
     ]) ?>
 </div>
