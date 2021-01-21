<?php

namespace App\Repositories\Interfaces;

interface MenuItemRepositoryInterface
{
    public function all();

    public function detail($id);

    public function create(array $data);

    public function update(array $data, $id);

}
