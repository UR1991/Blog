<?php
//Model for working with categories
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
  //return name of table with categories
  public static function tableName()
  {
    return 'categories';
  }

  public function attributeLabels()
  {
    return [
      'id' => 'id',
      'category_name' => 'category_name',
    ];
  }

  public function rules()
  {
    return [
        [['category_name'], 'required'],
    ];
  }
}
 ?>
