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
      //Create new object Mail
      $model = new Mail();
      //Render widget and send object
      return $this->render('mail', ['model' => $model]);
    }
  }
 ?>
