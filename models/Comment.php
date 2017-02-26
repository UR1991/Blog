<?php
//Model for our app
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Comment extends ActiveRecord
{
  //return name db
  public static function tableName()
  {
    return 'comments';
  }

  //Set the lables name
  public function attributeLabels()
  {
    return [
      'id' => 'ID',
      'article_id' => 'article_id',
      'text' => 'text',
      'date' => 'date',
    ];
  }

  //Set the rules for data
  public function rules()
  {
      return [
          [['task_id', 'text'], 'required'],
          [['text'], 'string', 'max' => 80],
      ];
  }

  public function getArticle()
{
    return $this->hasOne(Article::className(), ['id' => 'article_id']);
}
}
 ?>
