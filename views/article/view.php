<?php
use yii\helpers\Html;
use app\models\Comment;
use app\models\TagArticles;
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
       'category',
     ],
     ]) ?>

<?php //var_dump($model->tags);
    //die(); ?>

     <h1><?php Yii::t('app', 'Tags') ?></h1>
     <?php foreach ($model->tags as $tag): ?>
        <hr>
        <div class="text-muted"><?= $tag->title ?></div>
     <?php endforeach; ?>




     <h1><?php Yii::t('app', 'Comment') ?></h1>
    <?php foreach ($model->comment as $comment): ?>
        <hr>
        <div class="h4"><?= $comment->text ?></div>
        <div class="text-muted"><?= $comment->date ?></div>
    <?php endforeach; ?>

    <hr>
    <?php $form = ActiveForm::begin() ?>
      <?= $form->field(new Comment(), 'text')->textarea() ?>
      <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
    <?php ActiveForm::end() ?>
 </div>
