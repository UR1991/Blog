<?php
//Model for working with comments
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Article extends ActiveRecord
{
  public static function tableName()
  {
    return 'articles';
  }

  public function attributeLabels()
  {
    return [
      'id' => 'id',
      'name' => 'name',
      'body' => 'body',
      'category' => 'category',
    ];
  }

  public function rules()
  {
    return [
        [['name', 'body', 'category'], 'required'],
        [['name'], 'string', 'max' => 30],
        [['body'], 'string', 'max' => 250],
    ];
  }

  public function getComment()
{
    return $this->hasMany(Comment::className(), ['task_id' => 'id']);
}

}
 ?>
