<?php
/** @var $this \core\View */
/** @var $this \modules\ContactForm */
$this->title = 'Contact';

?>

<h2>Contact us</h2>
<?php $form = \core\form\Form::begin('','post') ?>
<?php echo $form->field($model,'subject') ?>
<?php echo $form->field($model,'email') ?>    

<?php echo $form->field($model,'body') ?>
<button type="submit" class="btn btn-primary">Submit</button>

<?php \core\form\Form::end() ?>

