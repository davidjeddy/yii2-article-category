<?php

namespace davidjeddy\articlecategory\controllers;

use davidjeddy\articlecategory\models\search\ArticleCategorySearch;

use yii;
use yii\web\Controller;
use yii\helpers\Url;

/**
 * @author David J Eddy <me@davidjeddy.com>
 */
class DefaultController extends Controller
{
    /**
     * 
     * @return string
     */
    public function actionIndex()
    {
        $searchModel  = new ArticleCategorySearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);
        $dataProvider->sort = [
            'defaultOrder' => ['order' => SORT_ASC, 'id' => SORT_ASC]
        ];

        // if the dataProvider has 0 children, it has articles
        if ($dataProvider->getCount() < 1) {

            return $this->redirect(['../article/index', 'category_id' => Yii::$app->request->queryParams['id']]);
        }

        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }
}
