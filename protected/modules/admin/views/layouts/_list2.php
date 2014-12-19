<div class="list-group left-list">
        	<a class="list-group-item" data-toggle="collapse" href="#submenu-1"><span class="glyphicon glyphicon-home glyphicon-rm10"></span><?php echo Yii::t('AdminModule.global', 'Home')?></a>
        	<div class="submenu panel-collapse collapse in" id="submenu-1">
        		<a class="list-group-item<?php echo $this->menu === 'default' ? ' active' : '';?>" href="<?php echo $this->createUrl('default/index');?>"><?php echo Yii::t('AdminModule.global', 'Dashboard')?></a>
				<a class="list-group-item<?php echo $this->menu === 'setting' ? ' active' : '';?>" href="<?php echo $this->createUrl('default/setting');?>"><?php echo Yii::t('AdminModule.global', 'Setting')?></a>
			</div>
        </div>