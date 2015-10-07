<?php
/* @var $this yii\web\View */
// $this->title = Yii::t('frontend', 'Article Category')

$this->title = Yii::t('article-category', 'Articles');
$this->params['breadcrumbs'][] = $this->title;
?>

<div id="article-index">
    <!--h1><?php //echo Yii::t('frontend', 'Articles') ?></h1-->

    <?php echo \yii\widgets\ListView::widget([
		'dataProvider' => $dataProvider,
		'itemView'     => '_list',
		'summary'      => '', 
    ])?>

</div>
