<?php

class Theme extends \Eloquent {
	protected $fillable = ['name', 'download_url', 'home_url', 'version'];
	
	private $rules = [
		'name' => 'max:200',
		'download_url' => 'url',
		'home_url' => 'url',
		'version' => ''
	];

	public function validate($data)
	{
		$validate = Validator::make($data, $this->rules);

		return $validate->passes();
	}

}