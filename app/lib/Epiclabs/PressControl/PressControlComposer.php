<?php namespace Epiclabs\Presscontrol;

/**
 * Add sites to dashboard views
 */

//\View::composer('dashboard.main', 'Epiclabs\Presscontrol\PressControlComposer');


/**
 * PressControl view composer
 * Called from config/view.php
 */

class PressControlComposer {

    public function compose($view)
    {
    	
        $view->with('sites', \Site::all());
        
    }

}