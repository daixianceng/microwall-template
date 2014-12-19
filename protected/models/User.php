<?php
class User extends CActiveRecord
{
	public function tableName()
	{
		return '{{user}}';
	}
	
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}
	
	public static function encrypt($name, $password)
	{
		return sha1($name . md5($password));
	}
}