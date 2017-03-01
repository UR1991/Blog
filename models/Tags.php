<?php
//Model for working with tags
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Tags extends ActiveRecord
{
  //return name of table with tags
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

  //get relations
  public function getTagArticles()
{
    return $this->hasMany(TagArticles::className(), ['tag_id' => 'id']);
}

//find tag by id
public function getTag($id)
{
    if (($model = Tags::findOne($id)) !== null) {
        return $model;
    } else {
        throw new NotFoundHttpException('The requested post does not exist.');
    }
}

public function getArticle()
{
  return $this->hasMany(Article::className(), ['id' => 'article_id'])
  ->viaTable('tag_articles', ['tag_id'=>'id']);
}

//public function getTags()
//{
//  return $this->hasMany(Tags::className(), ['id' => 'id'])
//  ->viaTable('tag_articles', ['article_id' => 'id']);
//}

}
 ?>
