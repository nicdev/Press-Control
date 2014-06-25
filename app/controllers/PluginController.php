<?php

class PluginController extends \BaseController {

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
		
		$plugin = new Plugin();

		if($plugin->validate($input))
		{
			$plugin->name = $input['name'];
			$plugin->download_url = $input['download_url'];
			$plugin->home_url = $input['home_url'];
			$plugin->version = $input['version'];
			$plugin->save();

			return Response::json(['plugin_id' => $plugin->id], 201);
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
		$plugin = Plugin::find($id);

		if($plugin)
		{
			return Response::json($plugin, 200);	
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
		$plugin = Plugin::find($id);

		if($plugin)
		{
			$input = Input::only('name', 'download_url', 'home_url', 'version');

			if($plugin->validate($input))
			{
				$plugin->name = $input['name'];
				$plugin->download_url = $input['download_url'];
				$plugin->home_url = $input['home_url'];
				$plugin->version = $input['version'];
				$plugin->save();

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
		$plugin = Plugin::find($id);

		if($plugin)
		{
			$plugin->delete();

			return Response::json(['message' => 'deleted'], 204);
		}
		else
		{
			return Response::json(['message' => 'resource not found'], 404);	
		}


	}

}
