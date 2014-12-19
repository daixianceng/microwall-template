<?php

class SiteController extends Controller
{
	public function filters()
	{
		return array(
			/*
			array(
				'COutputCache + index',
				'duration' => Yii::app()->params['cacheDuration'],
				'varyByParam' => array(),
			),
			*/
		);
	}
	
	public function actionIndex()
	{
		$this->pageTitle = '';
		
		$this->render('index');
	}
	
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		$this->pageTitle = '404 页面不存在';
		if($error = Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->renderPartial('error', $error);
		}
	}
}