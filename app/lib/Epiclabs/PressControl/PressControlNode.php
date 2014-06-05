<?php namespace Epiclabs\Presscontrol;

use Exception;

class PressControlNode {

	protected $file;
	protected $directories;

    function __construct(\Illuminate\Filesystem\Filesystem $file)
    {

    	$this->file = $file;
        
    }

    function getDirectories()
    {

    	$this->directories = $this->file->glob('/var/');
    	dd($this->directories);

    }

} 