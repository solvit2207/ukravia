<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ReservSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reserv-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_pass') ?>

    <?= $form->field($model, 'id_place') ?>

    <?= $form->field($model, 'price') ?>

    <?= $form->field($model, 'time') ?>

    <?php // echo $form->field($model, 'reys') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'baggage') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
