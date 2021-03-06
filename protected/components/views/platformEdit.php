<?php foreach ($models as $model): 
	$idPrefix = '['.$model->id.']';
?>
	<h2>
			<?php echo Yii::t('Site', "Platform ID: ") . $model->id;?>
			<?php 
	    	$this->widget(
	    	'bootstrap.widgets.TbButton', 
	    	array(
		    		'buttonType'=>'link', 
		    		'type'=>'info', 
		    		'label'=> Yii::t('Site', 'Go to platform'),
		    		'icon' => 'arrow-right',
		    		'url' => array('Platforms/Edit', 'id' => $model->id),
		    		'size' => 'small',
	    		)
	    	); ?>
	</h2>
	<?php echo $form->textFieldRow($model, $idPrefix.'name');?>
	<?php echo $form->textFieldRow($model, $idPrefix.'systemUser');?>
	<?php echo $form->passwordFieldRow($model, $idPrefix.'password');?>
	<?php echo $form->toggleButtonRow($model, $idPrefix.'allowSsh');?>
	<?php
		echo $form->dropDownListRow(
				$model, 
				$idPrefix.'Server_id', 
				$existingServers,
				array(
						'class'=>'chzn-select',
						'style'=>'width:250px;',
						'data-placeholder'=>Yii::t('Site', 'Click to select existing servers'),
					)
			);
		$this->widget( 'EChosen' );
	?>
	

<?php endforeach;?>

<fieldset>
	<legend><?php echo Yii::t('Site', "Add new platform");?></legend>

	<?php
		$model = new Platform;
		$idPrefix = '[new]';
	?>
	<?php echo $form->textFieldRow($model, $idPrefix.'name');?>
	<?php echo $form->textFieldRow($model, $idPrefix.'systemUser');?>
	<?php echo $form->passwordFieldRow($model, $idPrefix.'password');?>
	<?php echo $form->toggleButtonRow($model, $idPrefix.'allowSsh');?>
	<?php
		echo $form->dropDownListRow(
				$model, 
				$idPrefix.'Server_id', 
				$existingServers,
				array(
						'class'=>'chzn-select',
						'style'=>'width:250px;',
						'data-placeholder'=>Yii::t('Site', 'Click to select existing servers'),
					)
			);
		$this->widget( 'EChosen' );
	?>
</fieldset>