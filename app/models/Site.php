<?php

/**
 * Each "site" is a WordPress instance
 */

class Site extends \Eloquent {

	protected $table = 'sites';
	protected $fillable = ['title', 'url'];

	private $rules = [
		'title' => 'max:200',
		'url' => 'url',
	];

	public function validate($data)
	{
		$validate = Validator::make($data, $this->rules);

		return $validate->passes();
	}
	
}