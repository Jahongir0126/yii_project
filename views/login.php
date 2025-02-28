<?php
/** @var $model \models\User */
?>

<h2>Login</h2>


<?php $form = \core\form\Form::begin('', 'post') ?>
    <?php echo $form->field($model, 'email') ?>
    <?php echo $form->field($model, 'password')->passwordField() ?>
    <button type="submit" class="btn btn-primary">Login</button>

<?php \core\form\Form::end(); ?>