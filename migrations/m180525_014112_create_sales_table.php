<?php

use yii\db\Migration;

/**
 * Handles the creation of table `sales`.
 */
class m180525_014112_create_sales_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('sales', [
            'id' => $this->primaryKey(),
            'dateTime' => $this->dateTime()
                ->defaultExpression('CURRENT_TIMESTAMP'),
            'customer_id' => $this->integer(),
        ]);

        $this->createIndex('idx-sales-customer_id','sales','customer_id');

        $this->addForeignKey(
            'fk-sales-customers',
            'sales','customer_id',
            'customers','id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-sales-customers','sales');
        $this->dropIndex('idx-sales-customer_id', 'sales');
        $this->dropTable('sales');
    }
}
