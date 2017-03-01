<?php
//Model for working with comments
namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;

class Article extends ActiveRecord
{

  public $tags = [];

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
      'article_id' => 'article_id',
    ];
  }

  public function rules()
  {
    return [
        [['name', 'body', 'category'], 'required'],
        [['tags'], 'safe'],
        [['name'], 'string', 'max' => 30],
        [['body'], 'string', 'max' => 250],
    ];
  }

  public function getComment()
{
    return $this->hasMany(Comment::className(), ['article_id' => 'id']);
}

public function getCategory()
{
  return $this->hasOne(Category::className(), ['id' => 'category']);
}

public function setTags($tagsId)
{
    $this->tags = (array) $tagsId;
}

public function getTags()
{
  return $this->hasMany(Tags::className(), ['id' => 'tag_id'])
  ->viaTable('tag_articles', ['article_id' => 'id']);
}

public function getTagArticles()
{
    return $this->hasMany(
        TagArticles::className(), ['article_id' => 'id']
    );
}

public function getArticle($id)
{
    if (
        ($model = Article::findOne($id)) !== null) {
        return $model;
    } else {
        throw new NotFoundHttpException('The requested post does not exist.');
    }
}

public function afterSave($insert, $changedAttributes)
{
    TagArticles::deleteAll(['article_id' => $this->id]);

    if (is_array($this->tags) && !empty($this->tags)) {
        $values = [];
        foreach ($this->tags as $id) {
            $values[] = [$this->id, $id];
        }

        self::getDb()->createCommand()
            ->batchInsert(TagArticles::tableName(), ['article_id', 'tag_id'], $values)->execute();
    }else {
      echo "Not good!!!";
      die();
    }

    parent::afterSave($insert, $changedAttributes);
}

}
 ?>
