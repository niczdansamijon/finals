<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sold_items".
 *
 * @property int $id
 * @property int $car_id
 * @property int $sales_id
 * @property int $quantity
 * @property string $amount
 *
 * @property Cars $car
 * @property Sales $sales
 */
class SoldItems extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sold_items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['car_id', 'sales_id', 'quantity', 'amount'], 'required'],
            [['car_id', 'sales_id', 'quantity'], 'integer'],
            [['amount'], 'number'],
            [['car_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cars::className(), 'targetAttribute' => ['car_id' => 'id']],
            [['sales_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sales::className(), 'targetAttribute' => ['sales_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'car_id' => 'Car ID',
            'sales_id' => 'Sales ID',
            'quantity' => 'Quantity',
            'amount' => 'Amount',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCar()
    {
        return $this->hasOne(Cars::className(), ['id' => 'car_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSales()
    {
        return $this->hasOne(Sales::className(), ['id' => 'sales_id']);
    }
}
