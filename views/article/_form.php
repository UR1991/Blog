<!--Subview for create/edit article-->
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Category;
use yii\helpers\ArrayHelper;
?>

<div class="article-form">

  <?php $form = ActiveForm::begin();?>

  <?php
  $categ = Category::find()->all();
  $items = ArrayHelper::map($categ, 'id', 'category_name') ?>

  <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
  <?= $form->field($model, 'body')->textInput(['maxlength' => true]) ?>
  <?= $form->field($model, 'category')->dropDownList($items) ?>

  <div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Edit'), ['Class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
  </div>

  <?php ActiveForm::end(); ?>

</div>
