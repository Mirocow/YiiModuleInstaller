<?php
Yii::import('application.vendors.Archive.ArchiveTar');
/**
 * InstallController is the default controller to handle user requests.
 */
class InstallController extends CController
{
	/**
	 * Index action is the default action in a controller.
	 */
	public function actionIndex()
	{
		$form = new UploadForm;

		if (isset($_POST['UploadForm']))
		{
			$form->archive = CUploadedFile::getInstance($form,'archive');
			$form->archive->saveAs(Yii::app()->params['uploadsFolder'] . '/' . $form->archive);

			$moduleFolder = $this->_unpack($form->archive);
			$this->_executeSql($moduleFolder);
			Yii::app()->user->setFlash('success', Yii::t("install", "Modue installed"));
		}
		$this->render('index', array(
			'form' => $form
		));
	}

	public function actionBuild($moduleName)
	{
		$this->_pack($moduleName);
		Yii::app()->user->setFlash('success', Yii::t("install", "Modue builded"));
		$this->redirect( Yii::app()->baseUrl . '/uploads/' . $moduleName. '.zip');

	}

	public function actionUninstall($moduleName)
	{
		if (!is_dir(Yii::app()->params['modulesFolder'] . '/' . $moduleName))
		{
			Yii::app()->user->setFlash('error', Yii::t("install", "Not removed"));
			$this->redirect(Yii::app()->baseUrl);
		}

		$this->_executeSql($moduleName, 'uninstall');

		$this->_removeDir(Yii::app()->params['modulesFolder'] . '/' . $moduleName);

		Yii::app()->user->setFlash('success', Yii::t("install", "Modue removed"));
		$this->redirect(Yii::app()->baseUrl);
	}

	private function _executeSql($moduleName, $type = 'install')
	{

		if (file_exists(Yii::app()->params['modulesFolder'] . '/' . $moduleName . "/install/" . $type . ".sql"))
		{
			$fileName = Yii::app()->params['modulesFolder'] . '/' . $moduleName . "/install/".$type.".sql";
			$fh = fopen($fileName, "r");
			$content = fread($fh, filesize($fileName));
			
			$sqls = explode(';\n', $content);
		
			if(count($sqls))
			{
				foreach ($sqls as $sql) 
				{
					$command=Yii::app()->db->createCommand($sql);
					$command->execute();
				}
			}
		}
	}

	private function _removeDir($path)
	{
		if ($objs = glob($path."/*")) 
		{
	        foreach($objs as $obj) 
	        {
	            is_dir($obj) ? $this->_removeDir($obj) : unlink($obj);
	        }
	    }
	    rmdir($path);
	}

	private function _unpack($archiveName)
	{
		$archive = new ZipArchive();

		$archive->open(Yii::app()->params['uploadsFolder'] . '/' . $archiveName);

		$moduleName = str_replace('.zip', '',  $archiveName);

		@mkdir(Yii::app()->params['modulesFolder'] . '/' . $moduleName, 0777);

		for ($i = 0; $i < $archive->numFiles; $i++) 
		{
			@$archive->extractTo(Yii::app()->params['modulesFolder'] . '/' . $moduleName, array($archive->getNameIndex($i)));
		}
	                    
	    $archive->close();
	    return $moduleName;
	}

	private function _pack($moduleName)
	{
		$this->_zip(Yii::app()->params['modulesFolder'].'/'.$moduleName, Yii::app()->params['uploadsFolder'].'/'.$moduleName . '.zip');
	}

	private function _zip($source, $destination)
	{
	
	    $zip = new ZipArchive();

	    if (!$zip->open($destination, ZIPARCHIVE::CREATE)) 
	    {
	        return false;
	    }
	   
	    if (is_dir($source) === true)
	    {
	        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);

	        foreach ($files as $file)
	        {

	            if (is_dir($file) === true)
	            {
	                $zip->addEmptyDir(str_replace($source . '/', '', $file . '/'));
	            }
	            else if (is_file($file) === true)
	            {
	                $zip->addFromString(str_replace($source . '/', '', $file), file_get_contents($file));
	            }
	        }
	    }
	    else if (is_file($source) === true)
	    {
	        $zip->addFromString(basename($source), file_get_contents($source));
	    }

	    return $zip->close();
	}
	

}
