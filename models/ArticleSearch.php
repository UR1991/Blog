<?php
//Model for data provider
namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Article;
use yii\data\ActiveDataProvider;

class ArticleSearch extends Article
{
  public function rules ()
  {
    return [
      [['name', 'body'],'safe'],
    ];
  }

  public function search($params)
  {
    $query = Article::find();

    //Add conditions

    $dataProvider = new ActiveDataProvider([
      'query' => $query,
    ]);

    $this->load($params);

    if (!$this->validate())
    {
      return $dataProvider;
    }

    $query->andFilterWhere([ 'id' => $this->id, ]);
    $query->andFilterWhere(['like', 'name', $this->name])
    ->andFilterWhere(['like', 'body', $this->body]);

    return $dataProvider;
  }
}
 ?>
