<?php

use yii\db\Migration;

class m151009_043443_article_category_update extends Migration
{
    /**
     * [safeUp description]
     * @return [type] [description]
     */
    public function safeUp()
    {
        echo "m151009_043443_article_category_update installed.\n";

        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("
            ALTER TABLE `article_category`
            ADD COLUMN `order`              INT NULL DEFAULT NULL AFTER `updated_at`,
            ADD COLUMN `thumbnail_base_url` VARCHAR(1024) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL AFTER `order`,
            ADD COLUMN `thumbnail_path`     VARCHAR(1024) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL AFTER `thumbnail_base_url`;
        ");

        return $command->execute();
    }

    /**
     * [safeDown description]
     * @return [type] [description]
     */
    public function safeDown()
    {
        echo "m151009_043443_article_category_update removed.\n";

        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("
            ALTER TABLE `article_category`
            DROP COLUMN `order`,
            DROP COLUMN `thumbnail_base_url`,
            DROP COLUMN `thumbnail_path`;
        ");

        return $command->execute();
    }
}
