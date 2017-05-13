# Yii2 Multi Level Article Category Module

Extention module for https://github.com/trntv/yii2-starter-kit article & article category system.
Adds the ability to create a n+1 level navigation system of article categories.

# Install
Recommended way is with Composer.
 + Run `composer require davidjeddy/yii2-article-category` on the terminal in your {project root}.
 + OR add `"davidjeddy/yii2-article-category": "dev-master@dev"` to your projects `composer.json` and unpdate.
 + Enbable the module in your apps config/web.config module list

```PHP
$config = [
    'modules' => [
        ...
        'article-category' => ['class' => 'davidjeddy\articlecategory\Module'],
        ...
    ],
];
```

# DB Migration
1. cd `{project root}`
2. `php ./console/yii migrate/up --migrationPath=@vendor/davidjeddy/yii2-article-category/migration`

# CRUD form fields
1. Add a input field for the attribute 'order' to the article category CRUD form
2. Follow the directions to get `trntv/yii2-file-kit` installed and working properly
3. Add the CRUD form field element for thumbnail
```PHP
    echo $form->field($model, 'order')->widget(
        \trntv\filekit\widget\Upload::className(),
        [
            'url' => ['/file-storage/upload'],
            'maxFileSize' => 5000000, // 5 MiB
        ]);
```

See ./docs/ArticleCategory.php for an example of the altered article-category model
See ./docs/_form.php for example of  CRUD form

# TODO
0.0.X : Add logic to display categories AND article per navigation level on each VW

