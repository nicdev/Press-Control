<?php

class DashboardController extends BaseController {

    /**
     * Show the main dashboard.
     */
    
    public function index()
    {
        return View::make('dashboard.main');
    }

}