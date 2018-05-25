<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SoldItems */

$this->title = 'Create Sold Items';
$this->params['breadcrumbs'][] = ['label' => 'Sold Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sold-items-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
