<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%rectangle}}`.
 */
class m220917_111853_create_rectangle_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%rectangle}}', [
            'id' => $this->primaryKey(),
            'width' => $this->float(),
            'height' => $this->float(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%rectangle}}');
    }
}
