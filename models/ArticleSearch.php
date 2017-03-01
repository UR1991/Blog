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

  //method for searchind articles
  public function search($params)
  {
    $query = Article::find()->where($params);

    //Add conditions

    $dataProvider = new ActiveDataProvider([
      'query' => $query,
    ]);

    if (!($this->load($params) && $this->validate()))
    {      //var_dump($params);
          //die();
      return $dataProvider;
    }

    //filter query by some params
    $query->andWhere([ 'id' => $params['id'], ]);
    $query->andWhere(['category' => $params['category'],]);
    $query->andFilterWhere(['like', 'name', $params['name']])
    ->andFilterWhere(['like', 'body', $params['body']]);

    return $dataProvider;
  }
}
 ?>
