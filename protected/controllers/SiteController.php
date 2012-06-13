<?php

/**
 * SiteController is the default controller to handle user requests.
 */
class SiteController extends CController
{
	/**
	 * Index action is the default action in a controller.
	 */
	public function actionIndex()
	{
		$modulefFolder = Yii::app()->params['modulesFolder'];
	    $modules = array();
	    $iterator = new DirectoryIterator($modulefFolder);

	    foreach ($iterator as $fileinfo) 
	    {
	        if (!$fileinfo->isDot()) 
	        {
	            if (file_exists($modulefFolder . '/' . $fileinfo->getFilename() . '/manifest.php'))
	            {
	            	$modules[$fileinfo->getFilename()] = include $modulefFolder . '/' . $fileinfo->getFilename() . '/manifest.php';
	            }
	        }
	    }

		$this->render('index', array(
			'active' => 'home',
			'modules' => $modules,
		));
	}
	
	public function actionError()
	{
		echo 'Error';
	}
}
