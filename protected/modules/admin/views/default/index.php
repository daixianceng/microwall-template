            <div class="row">
              <div class="col-md-4">
                <div class="panel panel-success">
                  <div class="panel-heading">
                    <h3 class="panel-title"><?php echo Yii::t('AdminModule.default', 'System')?></h3>
                  </div>
                  <div class="panel-body">
                    <table class="table table-hover">
                    	<tr><td class="col-md-4"><?php echo Yii::t('AdminModule.default', 'Server')?></td><td class="col-md-8"><?php echo PHP_OS?></td></tr>
                    	<tr><td><?php echo Yii::t('AdminModule.default', 'Software')?></td><td><?php echo $_SERVER['SERVER_SOFTWARE']?></td></tr>
                    	<tr><td>PHP</td><td><?php echo phpversion();?></td></tr>
                    	<tr><td><?php echo Yii::t('AdminModule.default', 'Database')?></td><td><?php echo ucfirst(Yii::app()->db->driverName)?> <?php echo Yii::app()->db->serverVersion?></td></tr>
					</table>
                  </div>
                </div>
              </div>
            </div>