<?php
foreach ($models as $model): 
	$idPrefix = '['.$model->id.']';
?>

	<fieldset class="ftpUser">
		<legend>FTPUser #<?php echo $model->id;?></legend>
		<?php echo $form->textFieldRow($model, $idPrefix.'username');?>
		<?php echo $form->textFieldRow($model, $idPrefix.'chroot');?>
		<!-- @todo Add chroot generation by default -->
		<?php echo $form->passwordFieldRow($model, $idPrefix.'password');?>

	</fieldset>

<?php
endforeach;
?>
<?php 
	$model = new FTPUser;
	$model->Platform_id = $platformId;
	$idPrefix = '[new]';
?>
<fieldset class="ftpUser">
	<legend><?php echo Yii::t('Site', 'Add new FTP user');?></legend>
	<?php echo $form->textFieldRow($model, $idPrefix.'username');?>
	<?php echo $form->textFieldRow($model, $idPrefix.'chroot');?>
	<!-- @todo Add chroot generation by default -->
	<?php echo $form->passwordFieldRow($model, $idPrefix.'password');?>

</fieldset>