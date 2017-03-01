<?php
//Model for working with tags
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Mail extends ActiveRecord
{
  public static function tableName()
  {
    return 'mails';
  }

  public function attributeLabels()
  {
    return [
      'id' => 'id',
      'email' => 'email',
    ];
  }

  public function rules()
  {
    return [
        [['email'], 'required'],
        ['email', 'email'],
    ];
  }
}
 ?>
