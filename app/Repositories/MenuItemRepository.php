<?php

namespace App\Repositories;

use App\Models\MenuItem;
use App\Repositories\Interfaces\MenuItemRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Log;

class MenuItemRepository implements MenuItemRepositoryInterface
{
    public function all()
    {

        Log::info('Get all MenuItem!');
        return MenuItem::orderBy('order')->get();

    }

    public function detail($id)
    {
        Log::info('Get MenuItem with id '.$id);

        return MenuItem::findOrFail($id);

    }


    public function create(array $data)
    {
        Log::info('Create menu item!');
        return MenuItem::create($data);
       
    }

    public function update(array $data, $id)
    { 

        $menuItem = MenuItem::findOrFail($id);

        $menuItem->menu_id = $data['menu_id'];
        $menuItem->name = $data['name'];
        $menuItem->order = $data['order'];
        $menuItem->status = $data['status'];


        $menuItem->save();
     
        return $menuItem;
    
    }

    public function showFullMenu(){

		Log::info('Get all menus will their menu items!');
		return Menu::with('menu_item')->where('status','1')->orderBy('order','asc')->get();
   
	}



}

