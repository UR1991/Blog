<!--Subview for searching article-->
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="article-search">
  <?php
$form = ActiveForm::begin([
  'action' => ['index'],
  'method' => 'get',
]);   ?>

<?= $form->field($model, 'name') ?>

<div class="form-group">
  <?= Html::submitButton(Yii::t('app', 'Search'), ['class'=> 'btn btn-primary']) ?>
  <?= Html::resetButton(Yii::t('app', 'Reset'), ['class'=> 'btn btn-default']) ?>
</div>
<?php ActiveForm::end(); ?>
</div>
