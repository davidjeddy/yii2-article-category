<?php
namespace davidjeddy\articlecategory\controllers;

use davidjeddy\articlecategory\models\ArticleCategory;
use davidjeddy\articlecategory\models\search\ArticleCategorySearch;

use yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * @author Eugene Terentev <eugene@terentev.net>
 */
class ArticleCategoryController extends Controller
{
    /**
     * Initial entry point into article category system
     * 
     * @return string
     */
    public function actionIndex()
    {
        $searchModel  = new ArticleCategorySearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);
        $dataProvider->sort = [
            'defaultOrder' => ['order' => SORT_ASC]
        ];

        // if the dataProvider has 0 children, it has articles
        if ($dataProvider->getCount() == 0) {

            return $this->redirect('../article/index?parent_id='.Yii::$app->request->queryParams['id']);
        }

        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }
}
