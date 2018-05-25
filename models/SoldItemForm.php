<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class SoldItemForm extends Model
{
    public $itemId;
    public $quantity;
    public $salesId;

    public function rules()
    {
        return [
            [['itemId', 'quantity',  'salesId'], 'integer'],
            [['itemId', 'quantity',  'salesId'], 'required'],
            [['quantity'], 'isInStock'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'itemID' => 'Item',
        ];
    }

    public function isInStock($attributes, $params)
    {
        $car = Cars::findOne($this->itemId);
        if($this->quantity > $car->quantity){
            $message =  'The quantity cannot be greater than ' . $car->quantity;
            $this->addError($attributes, $message);
            Yii::$app->session->setFlash('error', $message);
        }
    }
}