 <?php


/** @var $this \core\View */
/** @var $this \modules\ContactForm */

use core\form\TextAreaField;




$this->title = 'Contact';

?>

<h2>Contact us</h2>
<?php $form = \core\form\Form::begin('','post') ?>
<?php echo $form->field($model,'subject') ?>
<?php echo $form->field($model,'email') ?>    

<?php echo new TextAreaField($model,'body') ?>

<button type="submit" class="btn btn-primary">Submit</button>

<?php \core\form\Form::end() ?>

