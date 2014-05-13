<?php namespace Epiclabs\Presscontrol;

use Exception;

class PressControlNode {

    function __construct(\Illuminate\Filesystem\Filesystem $file)
    {

    	$this->file = $file;
        
    }

} 