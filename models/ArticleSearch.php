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
    $query = Article::find()->where($params);

    //Add conditions

    $dataProvider = new ActiveDataProvider([
      'query' => $query,
    ]);

    //$this->load($params);

    if (!($this->load($params) && $this->validate()))
    {      //var_dump($params);
          //die();
      return $dataProvider;
    }

    $query->andWhere([ 'id' => $params['id'], ]);
    $query->andWhere(['category' => $params['category'],]);
    $query->andFilterWhere(['like', 'name', $params['name']])
    ->andFilterWhere(['like', 'body', $params['body']]);




    //var_dump($dataProvider->models);
    //      die();
    return $dataProvider;
  }
}
 ?>
