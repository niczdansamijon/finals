<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cars".
 *
 * @property int $id
 * @property string $make
 * @property string $model
 * @property string $year
 * @property string $price
 * @property int $quantity
 */
class Cars extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cars';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['make', 'price', 'quantity'], 'required'],
            [['price'], 'number'],
            [['quantity'], 'integer'],
            [['make'], 'string', 'max' => 191],
            [['model', 'year'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'make' => 'Make',
            'model' => 'Model',
            'year' => 'Year',
            'price' => 'Price',
            'quantity' => 'Quantity',
        ];
    }
}
