<?php

namespace App\Http\Controllers;

use App\Models\League;
use Illuminate\Http\Request;
use App\Http\Requests\LeagueRequest;
use App\Repositories\Interfaces\LeagueRepositoryInterface;


class LeagueController extends Controller
{
    private $leagueRepository;
    
    public function __construct(LeagueRepositoryInterface $leagueRepository)
    {
        $this->leagueRepository = $leagueRepository;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $league = $this->leagueRepository->all();

        if (is_null($league)) {
            return response()->json(["message" => "No league found"]);
        }

        return response()->json(["data" => $league, "message" => "League list retrived successfully."]);
    }

    public function topLeagues()
	{

        $league = League::orderBy('points','desc')->take(5)->get();
        

		if ($league) {
			return response()->json(["data" => $league, "message" => "Top 5 leagues retrived successfully."]);
		}
		else{
			return $this->sendError('No League found.');
		}
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LeagueRequest $request)
    {
        //Create league
        $league = $this->leagueRepository->create($request->all());

        return response()->json(["data" => $league, "message" => "League retrived successfully."]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $league = $this->leagueRepository->detail($id);

        if (is_null($league)) {
            return response()->json(["message" => "League not found."]);
        }

        return response()->json(["data" => $league]);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function update(Request $request, $id)
	{
		$league = League::findOrFail($id);

		$request->validate([
			'name' => 'required',
			'points' => 'required',
            'order' => 'required|unique:league,order,'.$league->id,
            'status' => 'required',
		]);
        
		$league = $request->all();
		$league->fill($input)->save();
        
		return response()->json(["data" => $league->toArray(),"message" => "League was updated successfully."]);
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $league = $this->leagueRepository->detail($id);

        if (is_null($league)) {
            return response()->json(["message" => "League was not found."]);
            }

        $league->delete();
        return response()->json(["message" => "League was deleted successfully."]);
    }

        /**
     * Displays all menus with their menu items defined by parent id. Parent id defines the level of the item.
     * 
     */
	public function showCompleteLeagues(){
		// $completeMenu = array();
		$fullLeagues = League::with('teams')->where('status','1')->orderBy('order','asc')->get();
		
        return $fullLeagues;
	}
}
