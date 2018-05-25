<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SoldItems */

$this->title = 'Update Sold Items: ';
$this->params['breadcrumbs'][] = ['label' => 'Sold Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sold-items-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
