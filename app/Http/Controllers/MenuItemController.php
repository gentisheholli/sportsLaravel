<?php

namespace App\Http\Controllers;

use Response;
use Exception;
use \Cache;
use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use App\Http\Requests\MenuItemRequest;
use App\Http\Controllers\APIBaseController as APIBaseController;

class MenuItemController extends Controller
{
    /**
     * Display a listing of Menu Items.
     *
     * @return \Illuminate\Http\Response
     */
	public function index()
	{
		$menu_item = MenuItem::orderBy('order','asc')->get();
		if ($menu_item->isNotEmpty()) {
			return response()->json(["data" => $menu_item, "message" => "Menu items retrived successfully."]);
		}
		else{
			return $this->sendError('No Menu item found.');
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
	public function store(MenuItemRequest $request)
	{
		$menu_item = MenuItem::create($request->all());
		return response()->json(["data" => $menu_item]);
	}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function show($id)
	{
		$menu_item = MenuItem::findOrFail($id);

		if (is_null($menu_item)) {
			return $this->sendError('Menu item not found.');
		}
		return response()->json(["data" => $menu_item]);
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
		$menu_item = MenuItem::findOrFail($id);
		$validatedData = $request->validate([
			'menu_id' => 'required',
			'name' => 'required',
			'order' => 'required|unique:menu_item,order,'.$menu_item->id,
			'status' => 'required',

		]);
        
		$input = $request->all();
		$menu_item->fill($input)->save();
        
		return response()->json(["data" => $menu_item->toArray(),"message" => "Menu item was updated successfully."]);
	}

    /**
     * Remove the specified Menu item from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function destroy($id)
	{
		$menu_item = MenuItem::find($id);

		if (is_null($menu_item)) {
			return response()->json(["message" => "Menu item was not found."]);
		}

		$menu_item->delete();
		return response()->json(["message" => "Menu item was deleted successfully."]);
	}
	
}