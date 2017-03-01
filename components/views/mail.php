<!--Subview for create/edit article-->
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Category;
use app\models\Mail;
use yii\helpers\ArrayHelper;
?>

<div class="article-form">

<h3>Enter the email</h3>

  <?php $form = ActiveForm::begin(['action' => '/mail/create',]);?>

  <?= $form->field($model, 'email')->input('email', ['maxlength' => true]) ?>

  <div class="form-group">

    <?= Html::a(Yii::t('app', 'Subscribe'), ['/mail/create', 'model' => $model->email], ['class' => 'btn btn-primary', 'data' => ['method' => 'post',],]) ?>
    <?= Html::a(Yii::t('app', 'Unsubscribe'), ['/mail/delete', 'model' => $model], [
      'class' => 'btn btn-danger',
      'data' => [
          'confirm' => Yii::t('app', 'Are your sure?'),
          'method' => 'post',
      ],
      ]) ?>
  </div>

  <?php ActiveForm::end(); ?>

</div>
