<?php
use yii\helpers\Html;
use app\models\Comment;
use app\models\TagArticles;
use app\models\Tags;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Articles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
 ?>
 <div class="article-view">
   <h1><?= Html::encode($this->title) ?></h1>

   <p>
     <?= Html::a(Yii::t('app', 'Edit'), ['edit', 'id' => $model->id,], ['class' => 'btn btn-primary']) ?>
     <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
       'class' => 'btn btn-danger',
       'data' => [
           'confirm' => Yii::t('app', 'Are your sure?'),
           'method' => 'post',
       ],
       ]) ?>
   </p>

   <!-- Show article-->
   <?= DetailView::widget([
     'model' => $model,
     'attributes' => [
       'id',
       'name',
       'body',
       'category',
     ],
     ]) ?>

 <div>
  <?php
  //Get Tags and show it
  //create tags array
  $tags = [];
  //
foreach ($model->getTagArticles()->all() as $value){
    //get tag model
    $tag = $value->getTags()->one();
    //If click on tag render tag view - not comlete
    $tags[] = Html::a($tag->title, ['tag/view', 'id' => $tag->id]);
  } ?>
  <!--Show related tags-->
  <?= Yii::t('app', 'Tags') ?>: <?= implode($tags, ', ') ?>
</div>


     <div>
          <h3><?= Yii::t('app', 'Add Comment')?></h3>
          <?php //Start  form to create new comment
             $form = ActiveForm::begin(); ?>
             <!--textArea with text commentary-->
              <?=$form->field($comments, 'text')->textArea()->label(false);?>
               <div class="form-group">
                 <!--buttom for submit -->
                  <?=Html::submitButton(Yii::t('app', 'Add'), ['class' => 'btn btn-success'])?>
               </div>

                <?php ActiveForm::end(); //end form ?>
     </div>



     <?php
             // If get related comments
             if ($comments = $model->comment) {?>
                 <h3><?= Yii::t('app', 'Comments')?></h3>
                 <!--show their text in simple table -->
                 <?php foreach($comments as $com) {?>
                     <div class='list-group-item clearfix'>
                         <div class="col-sm-11">
                             <p><?= $com['text']?></p>
                         </div>
                         <div class="col-sm-1">
                           <!--link for deleting action-->
                             <a href="<?= Url::to(['comment/delete', 'id' => $com['id']])?>">
                                 <span class="glyphicon glyphicon-trash">
                             </a>
                         </div>
                     </div>
                 <?php }?>
     <?php }?>
