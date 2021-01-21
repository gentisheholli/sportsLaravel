<?php

namespace App\Http\Controllers;

use Response;
use Exception;
use \Cache;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Requests\TeamRequest;

class TeamController extends Controller
{
    /**
     * Display a listing of Menu Items.
     *
     * @return \Illuminate\Http\Response
     */
	public function index()
	{
		$team = Team::orderBy('order','asc')->get();
		if ($team->isNotEmpty()) {
			return response()->json(["data" => $team, "message" => "Teams retrived successfully."]);
		}
		else{
			return $this->sendError('No team found.');
		}
	}

	public function top10Teams()
	{

        $team = Team::orderBy('points','desc')->take(10)->get();

		if ($team->isNotEmpty()) {
			return response()->json(["data" => $team, "message" => "Top 10 teams retrived successfully."]);
		}
		else{
			return $this->sendError('No Team found.');
		}
	}

    /**
     * Show the form for creating a new Menu item.
     *
     * @return \Illuminate\Http\Response
     */
	public function create()
	{
        //
	}

    /**
     * Store a newly created Menu item in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
	public function store(TeamRequest $request)
	{
		$team = Team::create($request->all());
		return response()->json(["data" => $team]);
	}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function show($id)
	{
		$team = Team::findOrFail($id);

		if (is_null($team)) {
			return $this->sendError('Team not found.');
		}
		return response()->json(["data" => $team]);
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function edit($id)
	{
        //
	}

    /**
     * Update the specified Menu item by id .
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function update(Request $request, $id)
	{
        
		$team = Team::findOrFail($id);
		$validatedData = $request->validate([
			'league_id' => 'required',
            'name' => 'required',
            //'nickname' => 'nickname',
            'ground' => 'required',
            'website' => 'required',
            'points' => 'required',
			'order' => 'required|unique:team,order,'.$team->id,
			'status' => 'required',

		]);
        
		$input = $request->all();
		$team->fill($input)->save();
        
		return response()->json(["data" => $team->toArray(),"message" => "Team was updated successfully."]);
	}

    /**
     * Remove the specified Menu item from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function destroy($id)
	{
		$team = Team::find($id);

		if (is_null($team)) {
			return response()->json(["message" => "Team was not found."]);
		}

		$team->delete();
		return response()->json(["message" => "Team was deleted successfully."]);
	}
	
}