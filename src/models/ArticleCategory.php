<?php

namespace davidjeddy\articlecategory\models;

use davidjeddy\articlecategory\models\query\ArticleCategoryQuery;
use trntv\filekit\behaviors\UploadBehavior;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "article_category".
 *
 * @property Article[] $articles
 * @property ArticleCategory $parent
 * @property integer $id
 * @property integer $order
 * @property integer $status
 * @property string $slug
 * @property string $thumbnail_base_url
 * @property string $thumbnail_path
 * @property string $title
 */
class ArticleCategory extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_DRAFT  = 0;

    /**
     * @var array
     */
    public $thumbnail;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%article_category}}';
    }

    /**
     * @return ArticleCategoryQuery
     */
    public static function find()
    {
        return new ArticleCategoryQuery(get_called_class());
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            [
                'attribute' => 'title',
                'class'     => SluggableBehavior::className(),
            ],
            [
                'attribute'        => 'thumbnail',
                'baseUrlAttribute' => 'thumbnail_base_url',
                'class'            => UploadBehavior::className(),
                'pathAttribute'    => 'thumbnail_path',
            ]
        ];
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 512],
            [['slug'], 'unique'],
            [['slug', 'thumbnail_base_url', 'thumbnail_path'], 'string', 'max' => 1024],
            [['status', 'order'], 'integer'],
            [['title', 'slug', 'status', 'order', 'thumbnail', 'thumbnail_base_url', 'thumbnail_path', 'parent_id'], 'safe'],
            ['parent_id', 'exist', 'targetClass' => ArticleCategory::className(), 'targetAttribute' => 'id']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'        => Yii::t('common', 'ID'),
            'order'     => Yii::t('common', 'Order'),
            'parent_id' => Yii::t('common', 'Parent Category'),
            'slug'      => Yii::t('common', 'Slug'),
            'status'    => Yii::t('common', 'Active'),
            'thumbnail' => Yii::t('common', 'Thumbnail'),
            'title'     => Yii::t('common', 'Title'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['parent_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasMany(ArticleCategory::className(), ['id' => 'parent_id']);
    }
}
