<?php

use yii\db\Migration;

/**
 * Handles the creation of table `cars`.
 */
class m180525_011743_create_cars_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('cars', [
            'id' => $this->primaryKey(),
            'make' => $this->string(191)->notNull(),
            'model' => $this->string(255),
            'year' => $this->string(255),
            'price' => $this->money()->notNull(),
            'quantity' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('cars');
    }
}
