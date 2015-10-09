# Yii2 Multi Level Article Category Module

Extention module for https://github.com/trntv/yii2-starter-kit

# Install
1. Add `"davidjeddy/yii2-article-category": "dev-master@dev"` to your projects `composer.json`
2. Run `composer update` 
3. In your project / app web.config module list add
```
    'article-category' => [
        'class' => 'davidjeddy\articlecategory\Module',
    ],
```

# Migration
1. cd `{project root}`
2. `php yii migrate/up --migrationPath=@vendor/davidjedydy/migration`
3. Collect bacon

# Additional form fields
1. Add an '`order` INT' to your backend/admin create/update article category forms
2. Add `"trntv/yii2-file-kit": "^1.0.0",` and update via composer
3. Follow the directions to get filekit working properly
4. As per file-kit add the form field to the article category form. Something like this:
```
    <?php echo $form->field($model, 'thumbnail')->widget(
        \trntv\filekit\widget\Upload::className(),
        [
            'url' => ['/file-storage/upload'],
            'maxFileSize' => 5000000, // 5 MiB
        ]);
    ?>
```



