<?php

/**
 * Each "site" is a WordPress instance
 */

class Site extends \Eloquent {

	protected $table = 'sites';
	protected $fillable = ['title', 'filepath'];
	
}