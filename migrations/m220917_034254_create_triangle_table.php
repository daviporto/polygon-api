<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%triangle}}`.
 */
class m220917_034254_create_triangle_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%triangle}}', [
            'id' => $this->primaryKey(),
            'side_a' => $this->float(),
            'side_b' => $this->float(),
            'side_c' => $this->float(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%triangle}}');
    }
}
