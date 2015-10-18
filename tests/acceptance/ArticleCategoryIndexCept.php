<?php
/* @var $scenario Codeception\Scenario */

$I = new AcceptanceTester($scenario);
$I->wantTo('ensure that article category default route works');
$I->amOnPage(Yii::$app->homeUrl.'article-category/default/index');
$I->see('Article Category');

$I->wantTo('ensure that article category link works');
$I->seeLink('Article Category');
$I->click('Article Category');
$I->amOnPage(Yii::$app->homeUrl.'article-category/');
$I->see('Article Category');
