<?php

class ThemeController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function postCreate()
	{
		
		$input = Input::only('name', 'download_url', 'home_url', 'version');
		
		$theme = new Theme();

		if($theme->validate($input))
		{
			$theme->name = $input['name'];
			$theme->download_url = $input['download_url'];
			$theme->home_url = $input['home_url'];
			$theme->version = $input['version'];
			$theme->save();

			return Response::json(['theme_id' => $theme->id], 201);
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
		$theme = Theme::find($id);

		if($theme)
		{
			return Response::json($theme, 200);	
		}
		else
		{
			return Response::json(['message' => 'resource not found'], 404);
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
		
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postUpdate($id)
	{
		$theme = Theme::find($id);

		if($theme)
		{
			$input = Input::only('name', 'download_url', 'home_url', 'version');

			if($theme->validate($input))
			{
				$theme->name = $input['name'];
				$theme->download_url = $input['download_url'];
				$theme->home_url = $input['home_url'];
				$theme->version = $input['version'];
				$theme->save();

				return Response::json(['message' => 'updated'], 204);
			}
			else
			{
				return Response::json(['error' => 'validation failed'], 400);
			}

		}
		else
		{
			return Response::json(['message' => 'resource not found'], 404);
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postDelete($id)
	{
		$theme = Theme::find($id);

		if($theme)
		{
			$theme->delete();

			return Response::json(['message' => 'deleted'], 204);
		}
		else
		{
			return Response::json(['message' => 'resource not found'], 404);	
		}


	}

}
