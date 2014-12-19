<?php
class AccessController extends CController
{
	public $layout = '/layouts/main';
	
	public function init()
	{
		if (Yii::app()->user->isGuest) {
			
		} else {
			$this->redirect(array('default/index'));
		}
	}
	
	public function actionLogin()
	{
		$model = new LoginForm();
		
		if(isset($_POST['LoginForm']))
		{
			$model->attributes = $_POST['LoginForm'];
			if($model->validate())
				$this->redirect(array('default/index'));
		}
		
		$this->render('login', array('model' => $model));
	}
}