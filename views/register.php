<?php
/** @var $model \models\User */
?>

<h2>Create an account</h2>


<?php $form =  \core\form\Form::begin('', 'post') ?>
<div class="row">
<div class="col">
    <?php echo $form->field($model, 'firstName') ?>
</div>
<div class="col">
    <?php echo $form->field($model, 'lastName') ?>
</div>
</div>
    <?php echo $form->field($model, 'email') ?>
    <?php echo $form->field($model, 'password')->passwordField() ?>
    <?php echo $form->field($model, 'confirmPassword')->passwordField() ?>
    <button type="submit" class="btn btn-primary">Submit</button>

<?php  \core\form\Form::end();?>

