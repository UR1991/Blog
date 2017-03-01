<!--Subview for create/edit article-->
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Category;
use app\models\Tags;
use yii\helpers\ArrayHelper;
?>

<div class="article-form">
  <!--Start form-->
  <?php $form = ActiveForm::begin();?>
  <!--Name of article-->
  <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
  <!--Body of article-->
  <?= $form->field($model, 'body')->textInput(['maxlength' => true]) ?>
  <!--list with avaliable categories-->
  <?= $form->field($model, 'category')->dropDownList(ArrayHelper::map($category, 'id', 'category_name')) ?>
  <!--list with avaliable tags-->
  <?= $form->field($model, 'tags')->checkBoxList(ArrayHelper::map($tags, 'id', 'title'), ['multiple' => true]) ?>

  <div class="form-group">
    <!--Send data to Create/Edit action-->
    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Edit'), ['Class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
  </div>

  <!--Stop form-->
  <?php ActiveForm::end(); ?>

</div>
