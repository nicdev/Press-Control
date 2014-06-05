<?php

class DashboardController extends BaseController {

	protected $pc;

	/**
	 * Constructor
	 */
	
	public function __construct(Epiclabs\Presscontrol\PressControl $pc)
	{
		
		$this->pc = $pc;

	}

	/**
	 * Setup wizard
	 */
	
	public function install()
	{

		$this->pc->findDirectories();
		$this->pc->saveDirectories();
		//dd($this->pc->directories);
		// foreach($this->pc->directories as $d)
		// {
		// 	$site = Site::firstOrCreate(['title' => rand(1,4),'filepath' => $d]);			
		// }

	}

    /**
     * Show the main dashboard.
     */
    
    public function index()
    {
        return View::make('dashboard.main');
    }

}