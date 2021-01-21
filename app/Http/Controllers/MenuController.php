<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Requests\MenuRequest;
use App\Repositories\Interfaces\MenuRepositoryInterface;


class MenuController extends Controller
{
    private $menuRepository;
    
    public function __construct(MenuRepositoryInterface $menuRepository)
    {
        $this->menuRepository = $menuRepository;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = $this->menuRepository->all();

        if (is_null($menu)) {
            return response()->json(["message" => "No menu found"]);
        }

        return response()->json(["data" => $menu, "message" => "Menu list retrived successfully."]);
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
    public function store(MenuRequest $request)
    {
        //Create menu
        $cupon = $this->menuRepository->create($request->all());

        return response()->json(["data" => $cupon, "message" => "Menu retrived successfully."]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu = $this->menuRepository->detail($id);

        if (is_null($menu)) {
            return response()->json(["message" => "Menu not found."]);
        }

        return response()->json(["data" => $menu]);
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

        $menu = $this->menuRepository->update($request->all(), $id);

        return response()->json(["data" => $menu,"message" => "Menu was updated successfully."]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = $this->menuRepository->detail($id);

        if (is_null($menu)) {
            return response()->json(["message" => "Menu was not found."]);
            }

        $menu->delete();
        return response()->json(["message" => "Menu was deleted successfully."]);
    }

        /**
     * Displays all menus with their menu items defined by parent id. Parent id defines the level of the item.
     * 
     */
	public function showFullMenu(){
		// $completeMenu = array();
		$fullMenu = Menu::with('menu_item')->where('status','1')->orderBy('order','asc')->get();
		
        return $fullMenu;
	}
}
