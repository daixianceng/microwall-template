<div class="row">
	<div class="col-md-8">
		  <?php $form = $this->beginWidget('CActiveForm', array(
				'id'=>'Config',
			    'enableClientValidation'=>true,
				'clientOptions' => array(
					'validateOnSubmit' => true,
					'validateOnChange' => false,
					'errorCssClass' => 'has-error',
					'successCssClass' => 'has-success'
				),
				'htmlOptions' => array(
					'class' => 'form-horizontal',
				)
			)); ?>
		  <?php $this->renderPartial('/layouts/_flash-form', array('length' => 10))?>
		  <div class="form-group">
		  	<label class="col-md-2 control-label"><?php echo Yii::t('AdminModule.default', 'Title')?></label>
		  	<div class="col-md-10">
		  	  <?php echo $form->textField($model, 'name', array('class' => 'form-control'))?>
		  	  <?php echo $form->error($model, 'name', array('class' => 'alert alert-danger'))?>
		  	</div>
		  </div>
		  <div class="form-group">
		  	<label class="col-md-2 control-label"><?php echo Yii::t('AdminModule.default', 'Keywords')?></label>
		  	<div class="col-md-10">
		  	  <?php echo $form->textField($model, 'keywords', array('class' => 'form-control'))?>
		  	  <?php echo $form->error($model, 'keywords', array('class' => 'alert alert-danger'))?>
		  	</div>
		  </div>
		  <div class="form-group">
		  	<label class="col-md-2 control-label"><?php echo Yii::t('AdminModule.default', 'Description')?></label>
		  	<div class="col-md-10">
		  	  <?php echo $form->textField($model, 'description', array('class' => 'form-control'))?>
		  	  <?php echo $form->error($model, 'description', array('class' => 'alert alert-danger'))?>
		  	</div>
		  </div>
		  <div class="form-group">
		  	<label class="col-md-2 control-label"><?php echo Yii::t('AdminModule.default', 'Theme')?></label>
		  	<div class="col-md-10">
		  	  <?php echo $form->dropDownList($model, 'theme', ConfigForm::getThemeNames(), array('class' => 'form-control'))?>
		  	  <?php echo $form->error($model, 'theme', array('class' => 'alert alert-danger'))?>
		  	</div>
		  </div>
		  <div class="form-group">
		  	<label class="col-md-2 control-label"><?php echo Yii::t('AdminModule.default', 'Language')?></label>
		  	<div class="col-md-10">
		  	  <?php echo $form->dropDownList($model, 'language', ConfigForm::getLanguages(), array('class' => 'form-control'))?>
		  	  <?php echo $form->error($model, 'language', array('class' => 'alert alert-danger'))?>
		  	</div>
		  </div>
		  <div class="form-group">
		  	<label class="col-md-2 control-label"><?php echo Yii::t('AdminModule.default', 'Time Zone')?></label>
		  	<div class="col-md-10">
		  	  <?php echo $form->dropDownList($model, 'timezone', ConfigForm::getTimezones(), array('class' => 'form-control'))?>
		  	  <?php echo $form->error($model, 'timezone', array('class' => 'alert alert-danger'))?>
		  	</div>
		  </div>
		  <div class="form-group">
		    <label class="col-md-2 control-label"><?php echo Yii::t('AdminModule.default', 'Cache')?></label>
		    <div class="col-md-10">
		      <p><?php echo $form->dropDownList($model, 'duration', ConfigForm::getDurations(), array('class' => 'form-control'))?></p>
		      <button type="button" id="clearCacheButton" class="btn btn-default" data-loading-text="Loading..."><span class="glyphicon glyphicon-refresh glyphicon-rm10"></span><?php echo Yii::t('AdminModule.default', 'Refresh')?></button>
		      <strong><?php echo $dirCache->getFormatSize()?></strong>
		      <span class="help-block"></span>
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="col-md-2 control-label"><?php echo Yii::t('AdminModule.default', 'Temporary files')?></label>
		    <div class="col-md-10">
		      <button type="button" id="clearTempButton" class="btn btn-default" data-loading-text="Loading..."><span class="glyphicon glyphicon-fire glyphicon-rm10"></span><?php echo Yii::t('AdminModule.default', 'Clear')?></button>
		      <strong><?php echo $dirTemp->getFormatSize()?></strong>
		      <span class="help-block"></span>
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-md-offset-2 col-md-10">
		      <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-ok glyphicon-rm10"></span><?php echo Yii::t('AdminModule.global', 'Save')?></button>
		    </div>
		  </div>
		  <?php $this->endWidget(); ?>
	</div>
</div>
<?php
$buttonScript = <<<SCRIPT
$(function() {
	var clear = function (url) {
		$(this).button('loading');
		$.ajax({
			type : 'get',
			url : url,
			dataType : 'json',
			context : this,
			success : function(json) {
				if (json.error === '200') {
					$(this).button('reset').next().text('0 B');
				} else if (json.error === '401') {
					$(this).button('reset').next().text('Permission Denied.');
				}
			}
		})
	}
	$('#clearTempButton').click(function() {clear.call(this, '{$this->createUrl('clearTemp')}')});
	$('#clearCacheButton').click(function() {clear.call(this, '{$this->createUrl('clearCache')}')});
});
SCRIPT;
Yii::app()->clientScript->registerScript('buttonScript', $buttonScript, CClientScript::POS_END);
?>