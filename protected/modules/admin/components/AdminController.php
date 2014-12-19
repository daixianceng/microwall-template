<?php
class AdminController extends CController
{
	public $layout = '/layouts/column1';
	
	protected $_menu;
	protected $_subTitle;
	
	public function init()
	{
		if (Yii::app()->user->isGuest) {
			$this->redirect(array('access/login'));
		} else {
			
		}
	}
	
	public function getMenu()
	{
		return $this->_menu;
	}
	
	public function getSubTitle()
	{
		return $this->_subTitle;
	}
}