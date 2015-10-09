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
            <h2 class="article-title">
                <?php
                echo Html::a(
                    (($model->thumbnail_base_url && $model->thumbnail_path)
                        ? '<img class = "img-responsive"
                            src   = "'.$model->thumbnail_base_url.'/'.$model->thumbnail_path.'"
                            alt   = "'.$model->title.'"
                            />'
                        : NULL
                    ).$model->title,
                    [
                        'index',
                        'id'   => $model->id,
                        'slug' => $model->slug,
                    ]
                );
                ?>
            </h2>
            <h6 class="article-body">
                <?php echo Html::a('Read more >>', ['index',
                    'id'   => $model->id,
                    'slug' => $model->slug,
                ]) ?>
            </h6>
        </div>
    </div>
</div>
