<?php
/**
 * Created by PhpStorm.
 * User: zein
 * Date: 7/4/14
 * Time: 2:31 PM
 */

namespace davidjeddy\articlecategory\models\query;

use davidjeddy\articlecategory\models\ArticleCategory;
use yii\db\ActiveQuery;

/**
 * @author David J Eddy <me@davidjeddy.com>
 */
class ArticleCategoryQuery extends ActiveQuery
{
    /**
     * @return $this
     */
    public function active()
    {
        $this->andWhere(['status' => ArticleCategory::STATUS_ACTIVE]);

        return $this;
    }

    /**
     * @return $this
     */
    public function noParents()
    {
        $this->andWhere('{{%article_category}}.parent_id IS NULL');

        return $this;
    }

    /**
     * [published description]
     * @return [type] [description]
     */
    public function published()
    {
        return $this->active();
    }
}
