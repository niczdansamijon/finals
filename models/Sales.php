<?php

namespace app\models;

use Yii;


/**
 * This is the model class for table "sales".
 *
 * @property int $id
 * @property string $dateTime
 * @property int $customer_id
 * @property int $credit
 *
 * @property Customers $customer
 * @property SoldItems[] $soldItems
 */
class Sales extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sales';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dateTime'], 'safe'],
            [['customer_id'], 'integer'],
            
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customers::className(), 'targetAttribute' => ['customer_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dateTime' => 'Date Time',
            'customer_id' => 'Customer ID',
            
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customers::className(), ['id' => 'customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSoldItems()
    {
        return $this->hasMany(SoldItems::className(), ['sales_id' => 'id']);
    }

    public static function getLatest()
    {
        return static::find()->orderBy('id DESC')->one();
    }
}
