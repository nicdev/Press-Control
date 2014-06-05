<?php namespace Epiclabs\Presscontrol;

use Exception;

class PressControl {

    protected $main_dir;
    protected $directories;

	private $nodeCollection;

    function __construct()
    {
    	
        $this->main_dir = \Config::get('presscontrol.main_dir');
        
    }

    /**
     * Allow read-only access to protected attributes
     */
    
    function __get($attribute){

        return $this->$attribute;

    }

    /**
     * Fetch all directories under www root
     */
    
    function findDirectories()
    {

        foreach(glob($this->main_dir . '*') as $d)
        {
            if($this->isWordPress($d))
            {
                $wp_dirs[] = $d;
            }
        }

        $this->directories = $wp_dirs;

    }

    /**
     * Persist WP instances found
     */
    
    function saveDirectories()
    {
         //   print_r($this->directories);
        foreach($this->directories as $d)
        {
            $site = \Site::firstOrCreate(['title' => $this->guessTitle($d), 'filepath' => $d]);
        }
    }

    /**
     * Attempt to give the site a decent title
     */
    
    protected function guessTitle($dir){

        $parts = explode('/', $dir);
        $raw_title = end($parts);
        return ucwords(str_replace(['-','_'], ' ', $raw_title));

    }

    /**
     * Detect whether it is a WordPress directory
     * @param  $dir is a directory without trailing slash
     * @return bool true if it's a WP directory
     */
    
    protected function isWordPress($dir)
    {

        return file_exists($dir . '/wp-config.php');
        
    }

} 