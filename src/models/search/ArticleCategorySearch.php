<?php

namespace davidjeddy\articlecategory\models\search;

use davidjeddy\articlecategory\models\ArticleCategory;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * @author David J Eddy <me@davidjeddy.com>
 */
class ArticleCategorySearch extends ArticleCategory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'parent_id'], 'integer'],
            [['slug', 'title'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        // if the ID is set, use it to get all the children article categories
        $query = ArticleCategory::find()
            ->andWhere(['parent_id' => (isset($params['id']) && is_numeric($params['id'])) ? $params['id'] : null])
            //->andWhere(['slug'      => is_string($param->slug) ? : null])
            ->andWhere(['status'    => 1]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id'        => $this->id,
            'parent_id' => $this->parent_id,
            'slug'      => $this->slug,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }
}
