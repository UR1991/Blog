<?php
//Model for working with tags
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class TagArticles extends ActiveRecord
{
  //return name of table with relations
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
        [['tag_id', 'article_id'], 'integer'],
    ];
  }

  //get tags with articles relations
  public function getArticle()
{
    return $this->hasOne(Article::className(), ['id' => 'article_id']);
}

//get articles with tags relations
public function getTags()
{
  return $this->hasOne(Tags::className(), ['id' => 'tag_id']);
}

}
 ?>
