<?php

use yii\db\Migration;

/**
 * Handles the creation of table `sold_items`.
 */
class m180525_015341_create_sold_items_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('sold_items', [
           'id' => $this->primaryKey(),
           'car_id' => $this->integer()->notNull(),
           'sales_id' => $this->integer()->notNull(),
           'quantity' => $this->integer()->notNull(),
           'amount' => $this->money()->notNull()
       ]);
         $this->createIndex(
           'idx-sold_items-car_id',
           'sold_items','car_id');
       $this->addForeignKey(
           'fk-sold_items-cars',
           'sold_items', 'car_id',
           'cars','id'
       );

       $this->createIndex(
           'idx-sold_items-sales_id',
           'sold_items', 'sales_id'
       );
       $this->addForeignKey(
           'fk-sold_items-sales',
           'sold_items','sales_id',
           'sales', 'id'
       );
   }

   /**
    * {@inheritdoc}
    */
   public function safeDown()
   {
      $this->dropForeignKey('fk-sold_items-cars', 'sold_items');
       $this->dropForeignKey('fk-sold_items-sales', 'sold_items');
       $this->dropIndex('idx-sold_items-car_id', 'sold_items');
       $this->dropIndex('idx-sold_items-sales_id', 'sold_items');
       $this->dropTable('sold_items');
   }
}
