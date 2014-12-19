<?php
class DefaultController extends AdminController
{
	public function filters()
	{
		return array(
			'AjaxOnly + clearTemp, clearCache'
		);
	}
	
	public function actionIndex()
	{
		$this->_menu = 'default';
		$this->pageTitle = Yii::t('AdminModule.global', 'Dashboard');
		$this->render('index');
	}
	
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(array('access/login'));
	}
	
	public function actionSetting()
	{
		$this->_menu = 'setting';
		$this->pageTitle = Yii::t('AdminModule.global', 'Setting');
		
		Yii::import('application.vendor.*');
		require_once 'Microwall/Dir.php';
		
		$model = new ConfigForm();
		
		if (isset($_POST['ConfigForm'])) {
			$model->attributes = $_POST['ConfigForm'];
			
			if ($model->validate()) {
				Yii::app()->user->setFlash('success', Yii::t('AdminModule.default', 'Site settings have been updated!'));
				$this->refresh();
			}
		}
		
		$dirTemp = new Microwall_Dir(Yii::getPathOfAlias('webroot.media.temp'));
		$dirCache = new Microwall_Dir(Yii::getPathOfAlias('application.runtime.cache'));
		
		$this->render('setting', array(
				'model' => $model,
				'dirTemp' => $dirTemp,
				'dirCache' => $dirCache,
		));
	}
	
	public function actionClearTemp()
	{
		Yii::app()->cache->gc(false, Yii::getPathOfAlias('webroot.media.temp'));
		echo json_encode(array('error' => '200'));
	}
	
	public function actionClearCache()
	{
		Yii::app()->cache->flush();
		echo json_encode(array('error' => '200'));
	}
}