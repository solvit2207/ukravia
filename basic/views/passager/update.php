<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Passager */

$this->title = 'Update Passager: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Passagers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="passager-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form1', [
        'model' => $model,
    ]) ?>

</div>
