<?php
//Model for working with articles
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

  //return name of table with articles
  public static function tableName()
  {
    return 'articles';
  }

  //set attributes labels
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

  //Get comments related with this one article by id
  public function getComment()
{
    return $this->hasMany(Comment::className(), ['article_id' => 'id']);
}
//Get category related with this one article by id
public function getCategory()
{
  return $this->hasOne(Category::className(), ['id' => 'category']);
}

//Get tags names related with this one article by id throw table tag_articles
public function getTags()
{
  return $this->hasMany(Tags::className(), ['id' => 'tag_id'])
  ->viaTable('tag_articles', ['article_id' => 'id']);
}

//Get tags related with this one article by id in tag_articles table
public function getTagArticles()
{
    return $this->hasMany(
        TagArticles::className(), ['article_id' => 'id']
    );
}

//get the Article model
public function getArticle($id)
{
    if (
        ($model = Article::findOne($id)) !== null) {
        return $model;
    } else {
        throw new NotFoundHttpException('The requested post does not exist.');
    }
}

//save the changes in tag_articles relations
public function afterSave($insert, $changedAttributes)
{
    //Deleteing all relations with article before saving
    TagArticles::deleteAll(['article_id' => $this->id]);

    //if tags is array and not empty
    if (is_array($this->tags) && !empty($this->tags)) {
        //create array wits new relations
        $values = [];
        foreach ($this->tags as $id) {
            $values[] = [$this->id, $id];
        }

        //save relations in DB
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
