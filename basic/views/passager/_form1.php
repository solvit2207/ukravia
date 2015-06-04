<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Reserv */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reserv-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'surname')->textInput()?>
    
    <?= $form->field($model, 'name')->textInput()?>
    
    <?= $form->field($model, 'patronymic')->textInput()?>
    
    <?= $form->field($model, 'phone')->textInput()?>
    
    <?= $form->field($model, 'reys')->dropDownList(ArrayHelper::map(app\models\Flight::find()->all(),'reys','reys','city'),['prompt'=>'Выберите номер рейса',
        'onchange'=>'$.post("index.php?r=passager/dates&reys='.'"+$(this).val(), function( data ) {$( "#reserv-date" ).html( data );});
                     $.post("index.php?r=passager/price&reys='.'"+$(this).val(), function( data ) {$( "#reserv-price" ).val( +(data)+(+($("#reserv-baggage").val()*40))); });
                     $.post("index.php?r=passager/price&reys='.'"+$(this).val(), function( data ) {$( "#reserv-price1" ).val( data ); });
                     
            ']); ?>
    
    <?= $form->field($model, 'class')->dropDownList(ArrayHelper::map(app\models\Place::find()->all(),'class','class'),['prompt'=>'Выберите класс',
        'onchange'=>'$.post("index.php?r=passager/lists&class='.'"+$(this).val(), function( data ) {$( "#reserv-id_place" ).html( data );});
                    $.post("index.php?r=passager/class-price&class='.'"+$(this).val(), function( data ) {$( "#reserv-pricemargin" ).val(+(data)+(+($( "#reserv-price1" ).val())));});
                    $.post("index.php?r=passager/class-price&class='.'"+$(this).val(), function( data ) {$( "#reserv-price" ).val(+($("#reserv-baggage").val()*40)+(+(data))+(+($( "#reserv-price1" ).val())));});
                    $.post("index.php?r=passager/class-type&class='.'"+$(this).val(), function( data ) {$( "#reserv-tickettype" ).html( data );});
            ']); ?>
 
    <?= $form->field($model, 'id_place')->dropDownList(ArrayHelper::map(app\models\Place::find()->all(),'id_place','id_place'),['prompt'=>'Выберите место']) ?> 
    
    <?= $form->field($model, 'date')->dropDownList(ArrayHelper::map(app\models\Date::find()->all(),'date','date'),['prompt'=>'Выберите дату'])  ?>
    
    <?= $form->field($model, 'baggage')->textInput([
        'onchange'=>'$.post("index.php?r=passager/bag&kg='.'"+$(this).val(), function(data) {$( "#reserv-price" ).val(+(data)+(+($( "#reserv-pricemargin" ).val())));});
'])?>            
    
    <?= $form->field($model, 'tickettype')->dropDownList(ArrayHelper::map(app\models\Tickettype::find()->all(),'type','type'),['prompt'=>'Выберите тип билета',
        'onchange'=>'$.post("index.php?r=passager/price-type&type='.'"+$(this).val(), function(data){$( "#reserv-price" ).val((+($( "#reserv-pricemargin" ).val())+($("#reserv-baggage").val()*40))*data);});
                    
        '])?>
    
    <?= $form->field($model, 'price')->textInput(["readonly" => true])?>
    
    <?= $form->field($model, 'price1',['template' => '{input}'])->hiddenInput()?>
    <?= $form->field($model, 'pricemargin',['template' => '{input}'])->hiddenInput()?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Забронировать' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
