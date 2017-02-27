<?php
//Model for working with tags
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class TagArticles extends ActiveRecord
{
  public static function tableName()
  {
    return 'tag_articles';
  }

  public function attributeLabels()
  {
    return [
      'tag_id' => 'tag_id',
      'article_id' => 'article_id',
    ];
  }

  public function rules()
  {
    return [
        [['tag_id', 'article_id'], 'required'],
    ];
  }

}
 ?>
