<?php
/* @var $this yii\web\View */

$this->title = Yii::t('frontend', 'Article Category');
$this->params['breadcrumbs'][] = $this->title;
?>

<div id="article-index">
    <h1><?php echo $this->title; ?></h1>

    <?php echo \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView'     => '_list',
        'pager'        => ['hideOnSinglePage'=>true],
        'summary'      => '',
    ])?>

</div>
