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
		
		$message = "Installation complete";

		return View::make('dashboard.main')->with('message', $message);

	}

    /**
     * Show the main dashboard.
     */
    
    public function index()
    {

    	View::composer('dashboard.main', 'PressControlComposer');
    	//$sites = Site::all(); //@TODO refactor to a view composer

        return View::make('dashboard.main'); //->with('sites', $sites);
    }

}