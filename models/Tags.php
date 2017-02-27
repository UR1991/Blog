<?php
//Model for working with tags
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Tags extends ActiveRecord
{
  public static function tableName()
  {
    return 'tags';
  }

  public function attributeLabels()
  {
    return [
      'id' => 'id',
      'title' => 'title',
    ];
  }

  public function rules()
  {
    return [
        [['title'], 'required'],
    ];
  }

  public function getArticle()
{
    return $this->hasMany(Articles::className(), ['id' => 'id'])
    ->viaTable('tag_articles', ['article_id' => 'id']);
}



//public function getTags()
//{
//  return $this->hasMany(Tags::className(), ['id' => 'id'])
//  ->viaTable('tag_articles', ['article_id' => 'id']);
//}

}
 ?>
