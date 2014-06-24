<?php

class SiteController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		echo 'hurr';
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function postCreate()
	{
		
		$input = Input::only('url','title');
		
		$site = new Site();

		if($site->validate($input))
		{
			$site->url = $input['url'];
			$site->title = $input['title'];
			$site->save();

			return Response::json(['site_id' => $site->id], 201);
		}
		else
		{
			return Response::json(['error' => 'validation failed'], 400);	
		}

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postStore()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function anyShow($id)
	{
		$site = Site::find($id);

		if($site)
		{
			return Response::json($site, 200);	
		}
		else
		{
			return Response::make('resource not found', 404);
		}
		
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postEdit($id)
	{
		$site = Site::find($id);

		if($site)
		{
			$input = Input::only('url','title');

			if($site->validate($input))
			{
				$site->url = $input['url'] ?: $site->url;
				$site->title = $input['title'] ?: $site->title;
				$site->save();

				return Response::json(['site_id' => $site->id], 204);
			}
			else
			{
				return Response::json(['error' => 'validation failed'], 400);
			}

		}
		else
		{
			return Response::make('resource not found', 404);
		}

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postUpdate($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postDestroy($id)
	{
		//
	}


}
