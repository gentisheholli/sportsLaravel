<?php

namespace App\Repositories;

use App\Models\Menu;
use App\Repositories\Interfaces\MenuRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Log;

class MenuRepository implements MenuRepositoryInterface
{
    public function all()
    {

        Log::info('Get all Menu!');
        return Menu::orderBy('order')->get();

    }

    public function detail($id)
    {
        Log::info('Get Menu with id '.$id);

        return Menu::findOrFail($id);

    }


    public function create(array $data)
    {
        Log::info('Create new menu');
        return Menu::create($data);
       
    }

    public function update(array $data, $id)
    { 

        $menu = Menu::findOrFail($id);

 
        $menu->name = $data['name'];
        $menu->order = $data['order'];
        $menu->status = $data['status'];

     
        $menu->save();
     
        return $menu;


    }

}
