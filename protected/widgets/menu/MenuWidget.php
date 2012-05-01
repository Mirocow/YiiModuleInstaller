<?php
class MenuWidget extends CWidget
{
	public $active;

	private $home = '';
	private $install = '';
	private $build = '';

	public function init()
	{
		if($this->active == 'home')
		{
			$this->home = 'active';
		}
		elseif($this->active == 'install')
		{
			$this->install = 'active';
		}
		else
		{
			$this->build = 'active';
		}

	}

	public function run()
	{
		$this->render('menu', array(
			'home' => $this->home,
			'install' => $this->install,
			'build' => $this->build,
		));
	}
}