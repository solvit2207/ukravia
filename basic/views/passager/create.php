<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Passager */

$this->title = 'Create Passager';
$this->params['breadcrumbs'][] = ['label' => 'Passagers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="passager-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
