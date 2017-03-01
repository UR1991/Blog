<?php
namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;
use app\models\Mail;

  class MailWidget extends Widget
  {
    public $model;

    public function init()
    {
      parent::init();

    }

    public function run()
    {
      $model = new Mail();
      return $this->render('mail', ['model' => $model]);
    }
  }
 ?>
