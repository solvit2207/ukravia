<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Reserv */

$this->title = 'Форма бронирования';
$this->params['breadcrumbs'][] = ['label' => 'Reservs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reserv-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form1', [
        'model' => $model,
    ]) ?>

</div>
