<?php
//Model for working with comments
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
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

  //public function getArticle()
//{
//    return $this->hasMany(Article::className(), ['id' => 'category']);
//}

}
 ?>
