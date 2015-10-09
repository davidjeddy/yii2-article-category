<?php

namespace davidjeddy\articlecategory;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'davidjeddy\articlecategory\controllers';
    public $defaultRoute        = 'default/index';

    public function init()
    {

        parent::init();
        // custom initialization code goes here
    }
}
