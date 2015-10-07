<?php
/**
 * @var $this yii\web\View
 * @var $model davidjeddy\articlecategory\models\Article
 */
use yii\helpers\Html;
?>

<div class="article-item row">
    <div class="col-xs-12">
        <div class="article-category">

            <?php if ($model->thumbnail_path): ?>
            <div class="article-thumb-img"
                 style="background:url('<?php echo Yii::$app->glide->createSignedUrl([
                        'glide/index',
                        'path' => $model->thumbnail_path,
                    ], true) ?>');"
            >
            </div>
            <?php endif; ?>

            <div class="article-cat-body">
                <h2 class="article-title">
                    <?php echo Html::a($model->title, ['index',
                        'id'   => $model->id,
                        'slug' => $model->slug,
                    ]) ?>
                </h2>
                <h6 class="article-body">
                    <?php echo Html::a('Read more >>', ['index',
                        'id'   => $model->id,
                        'slug' => $model->slug,
                    ]) ?>
                </h6>
            </div>
        </div>

        <?php /*
        <div class="article-meta">
            <span class="article-date">
                <?php echo Yii::$app->formatter->asDatetime($model->created_at) ?>
            </span>,
            <span class="article-category">
                <?php echo Html::a(
                    $model->category->title,
                    ['index', 'parent_id' => $model->parent_id]
                ) ?>
            </span>
        </div>
        <div class="article-content">
            <?php if ($model->thumbnail_path): ?>
                <?php echo Html::img(
                    Yii::$app->glide->createSignedUrl([
                        'glide/index',
                        'path' => $model->thumbnail_path,
                        'w' => 100
                    ], true),
                    ['class' => 'article-thumb img-rounded pull-left']
                ) ?>
            <?php endif; ?>
            <div class="article-text">
                <?php echo \yii\helpers\StringHelper::truncate($model->body, 150)?>
            </div>
        </div>
        */ ?>
    </div>
</div>
